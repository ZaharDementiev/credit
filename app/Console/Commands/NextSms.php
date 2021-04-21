<?php

namespace App\Console\Commands;

use App\Contact;
use App\Services\SmsService;
use App\Text;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class NextSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $contacts = Contact::where('id', '>', 198)->where('phone', '!=', null)->orWhere('next_sms_at', null)->orWhere('next_sms_at', '<', Carbon::now())->get();
        $smsService = new SmsService();
        foreach ($contacts as $contact) {
            if (!$contact->sms_checked && $contact->token == null) {
                $smsService->send($contact, Text::FIRST_SMS_TEXT);
            } elseif ($contact->sms_checked && $contact->token == null) {
                $smsService->send($contact, Text::NON_CONNECTED_NOT_FIRST);
            } elseif ($contact->token != null) {
                $smsService->send($contact, Text::FOR_PAID);
            }
        }
    }
}
