<?php


namespace App\Setvice;


use App\Payment;
use GuzzleHttp\Client;

class TinkoffService
{

    public function charge($contact, $amount)
    {
        $payment = new Payment();
        $payment->type = Payment::CHARGE;
        $payment->contact_id = $contact->id;
        $payment->save();

        $params = [
            'TerminalKey'   => env('TERMINAL_KEY'),
            'OrderId'       => $payment->id, // Модель->id
            'Amount'        => $amount,
            'Language'      => 'ru',
            'Description'   => 'Оплата',
            'Email'         => $contact->email,
            'Taxation'      => 'usn_income',
            'Phone'         => $contact->phone,
            'Name'          => 'Customer name',
        ];

        $params['Token'] = $this->generateToken($params);

        $client = new Client();
        $response = $client->request('POST', 'https://securepay.tinkoff.ru/v2/Init', $params);
        $paymentId = $response['PaymentID'];

        $params = [
            'TerminalKey'   => env('TERMINAL_KEY'),
            'PaymentId'     => $paymentId,
            'RebillId'      => $contact->RebillID,
        ];
        $params['Token'] = $this->generateToken($params);
        $charge = $client->request('POST', 'https://securepay.tinkoff.ru/v2/Charge', $params);

        if (!$charge['Success']) {
            if ($amount < 100) {
                $payment->status = Payment::STATUS_CANCEL;
                $payment->save();
                return false;
            }
            $payment->status = Payment::STATUS_CANCEL;
            $payment->save();
            return $this->charge($contact, $amount - 100);
        }

        $payment->status = Payment::STATUS_OK;
        $payment->amount = $amount;
        $payment->save();
        return $amount;
    }

    private function generateToken(array $args) {
        $token = '';
        $args['Password']    = env('TINKOFF_PASS');
        $args['TerminalKey'] = env('TERMINAL_KEY');
        ksort($args);

        foreach ($args as $arg) {
            if (!is_array($arg)) {
                $token .= $arg;
            }
        }

        return hash('sha256', $token);
    }
}
