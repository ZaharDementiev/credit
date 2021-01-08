<?php


namespace App\Http\Controllers;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Payment;
use App\PersonalLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use YooKassa\Client;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\NotificationEventType;

class YandexController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setAuth(env('YANDEX_KASSA_ID'), env('YANDEX_KASSA_SECRET'));
    }

    public function firstPayment($id)
    {
        $amount = 1;
        $desc = 'Привязка карты к сервису zaemnakarty';
        $meta = [
            'set_up_payment' => true,
            'contact_id' => $id,
        ];
        $payment = $this->setupPayment($meta, $amount, $desc);

        if (!isset($_COOKIE["TestCookie1"])) {
            $link = PersonalLink::where('id', $_COOKIE["TestCookie1"])->first();
            $link->unique_openings++;
            $link->save();
            setcookie("TestCookie1", 0, time(), (route('index') . '/'));
        }

        return redirect()->to($payment->getConfirmation()->getConfirmationUrl());
    }

    public function paymentNotification(Request $request)
    {
        $requestBody = $request->all();
        try {
            $notification = ($requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
                ? new NotificationSucceeded($requestBody)
                : new NotificationWaitingForCapture($requestBody);
        } catch (\Exception $e) {
            return response()->json([], 200);
            // Обработка ошибок при неверных данных
        }
        $payment = $notification->getObject();

        if (!$payment->payment_method->saved) {
            return response()->json([], 200);
        }

        $contact = Contact::find($payment->metadata->contact_id);

        $paymentModel = new Payment();
        $paymentModel->type = Payment::FIRST;
        $paymentModel->contact_id = $contact->id;
        $paymentModel->save();

        $contact->token = $payment->payment_method->getId();
        $contact->save();

        return response()->json([], 200);
    }

    private function setupPayment(array $meta, $amount, $desc = 'Привязка карты к сервису zaemnakarty', $route = 'https://zaemnakarty.ru/offers')
    {
        try {
            return $this->client->createPayment(
                array(
                    'amount' => array(
                        'value' => $amount,
                        'currency' => 'RUB',
                    ),
                    'payment_method_data' => array(
                        'type' => 'bank_card',
                    ),
                    'confirmation' => array(
                        'type' => 'redirect',
                        'return_url' => $route,
                    ),
                    'description' => $desc,
                    'capture' => true,
                    'save_payment_method' => true,
                    'metadata' => $meta
                ),
                uniqid('', true)
            );
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }
}
