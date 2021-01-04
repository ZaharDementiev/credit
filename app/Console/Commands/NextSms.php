<?php

namespace App\Console\Commands;

use App\Contact;
use App\Setvice\SmsService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NextSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
        $contacts = Contact::where('next_sms_at', '<', Carbon::now())->get();
        $sms = new SmsService();
        foreach ($contacts as $contact) {
            $sms->sendSms($contact);
        }
    }
}
