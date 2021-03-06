<?php

namespace App\Services;

use App\Contact;
use App\Payment;
use YooKassa\Client;
use YooKassa\Model\CancellationDetailsReasonCode;
use YooKassa\Model\PaymentStatus;

class YandexService
{
    public function charge(Contact $contact, $sum)
    {
        $client = new Client();
        $client->setAuth(env('YANDEX_KASSA_ID'), env('YANDEX_KASSA_SECRET'));
        try {
            $response = $client->createPayment(
                array(
                    'amount' => array(
                        'value' => $sum,
                        'currency' => 'RUB',
                    ),
                    'payment_method_id' => $contact->token,
                    'description' => 'Оплата услуг',
                    'capture' => true
                ),
                uniqid('', true)
            );

            if ($response->getStatus() === PaymentStatus::SUCCEEDED) {
                $paymentModel = new Payment();
                $paymentModel->type = Payment::CHARGE;
                $paymentModel->contact_id = $contact->id;
                $paymentModel->amount = $response->amount->value;
                $paymentModel->success = true;
                $paymentModel->save();

                return $paymentModel->amount;
            } else {
                $paymentModel = new Payment();
                $paymentModel->type = Payment::CHARGE;
                $paymentModel->contact_id = $contact->id;
                $paymentModel->amount = $response->amount->value;
                $paymentModel->success = false;
                $paymentModel->save();
            }

            if ($response->getStatus() === PaymentStatus::CANCELED &&
                $response->cancellation_details->getReason() == CancellationDetailsReasonCode::PERMISSION_REVOKED) {
                $contact->delete();
                return 0;
            }
        } catch (\Exception $e) {
            echo $e->getMessage()."\n";
            return 0;
        }
    }

    public function chargeTokenOnly($token, $sum)
    {
        $client = new Client();
        $client->setAuth(env('YANDEX_KASSA_ID'), env('YANDEX_KASSA_SECRET'));
        try {
            $response = $client->createPayment(
                array(
                    'amount' => array(
                        'value' => $sum,
                        'currency' => 'RUB',
                    ),
                    'payment_method_id' => $token,
                    'description' => 'Оплата услуг',
                    'capture' => true
                ),
                uniqid('', true)
            );
            if ($response->getStatus() === PaymentStatus::SUCCEEDED) {
                $paymentModel = new Payment();
                $paymentModel->type = Payment::CHARGE;
                $paymentModel->contact_id = 0;
                $paymentModel->amount = $response->amount->value;
                $paymentModel->success = true;
                $paymentModel->save();

                return $paymentModel->amount;
            } else {
                $paymentModel = new Payment();
                $paymentModel->type = Payment::CHARGE;
                $paymentModel->contact_id = 0;
                $paymentModel->amount = $response->amount->value;
                $paymentModel->success = false;
                $paymentModel->save();
                return 0;
            }
        } catch (\Exception $e) {
            echo $e->getMessage()."\n";
            return 0;
        }
    }
}
