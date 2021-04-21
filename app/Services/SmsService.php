<?php


namespace App\Services;


use App\Bank;
use App\PersonalLink;
use App\Text;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class SmsService
{
    public function send($contact, $reason)
    {
        if ($contact->phone[1] == '7') {
            $client = new Client();
            if ($reason == Text::FIRST_SMS_TEXT) {
                $txt = Text::where('slug', Text::FIRST_SMS_TEXT)->first()->text;
                $txt .= PersonalLink::where('sms_link', true)->first()->link . '/' . $contact->id;
                $contact->next_sms_at = Carbon::now()->addDay();
            } elseif ($reason == Text::NON_CONNECTED_NOT_FIRST) {
                $txt = Text::where('slug', Text::NON_CONNECTED_NOT_FIRST)->first()->text;
                $txt .= PersonalLink::where('sms_link', true)->first()->link;
                $contact->next_sms_at = Carbon::now()->addDay();
            } elseif ($reason == Text::FOR_PAID) {
                if (Bank::count() > 0) {
                    $txt = Text::where('slug', Text::FOR_PAID)->first()->text;

                    if (Bank::skip($contact->next_bank)->first() == null) {
                        $contact->next_bank = 0;
                    }
                    $bank = Bank::skip($contact->next_bank)->first();

                    $contact->next_bank++;
                    $contact->next_sms_at = Carbon::now()->addDays(3);

                    $txt .= $bank->name . ': ' . $bank->link;
                } else {
                    $txt = 'В данное время, доступных банков нет';
                }
            }
            $contact->save();

            Log::info($contact->id);

            $client->request('POST', 'https://api3.greensms.ru/sms/send', ['form_params' => [
                'user' => env('GREEN_SMS_USER'),
                'pass' => env('GREEN_SMS_PASS'),
                'to' => $contact->phone,
                'txt' => $txt,
            ]]);
        }
    }
}
