<?php


namespace App\Service;


use App\Bank;
use GuzzleHttp\Client;

class SmsService
{
    public function sendSms($contact)
    {
        $bank = Bank::where('id', $contact->next_bank)->first();
        $client = new Client();

        $client->request('POST', 'https://api3.greensms.ru/sms/send', [ 'form_params' => [
            'user' => env('GREEN_SMS_USER'),
            'pass' => env('GREEN_SMS_PASS'),
            'to' => $contact->phone,
            'txt' => "Мы подобрали банк для Вас: " . $bank->name ."\n"
            //. " Ссылка: " . $bank->link,
        ]]);

        $contact->next_bank++;
        if ($contact->next_bank == Bank::latest()->first()->id) {
            $contact->next_bank = 0;
        }
        $contact->save();
    }
}
