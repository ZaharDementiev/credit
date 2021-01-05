<?php

namespace App\Console\Commands;

use App\Contact;
use App\Setvice\TinkoffService;
use App\Setvice\YandexService;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NextPayment extends Command
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
        $contacts = Contact::where('next_payment_at', '<', Carbon::now())->get();
        $yandex = new YandexService();
        foreach ($contacts as $contact) {
            if ($contact->next_debt_payment_at < Carbon::now() && $contact->next_payment_at < Carbon::now()) {
                $sum = User::SUBSCRIBE_SUM + $contact->debt;
                $paid = $yandex->charge($contact, $sum);
                $contact->debt = $sum - $paid;
            } elseif ($contact->next_debt_payment_at < Carbon::now() && $contact->next_payment_at > Carbon::now()) {
                $paid = $yandex->charge($contact, $contact->debt);
                $contact->debt -= $paid;
            } elseif ($contact->next_debt_payment_at > Carbon::now() && $contact->next_payment_at < Carbon::now()) {
                $paid = $yandex->charge($contact, User::SUBSCRIBE_SUM);
                $contact->debt = User::SUBSCRIBE_SUM - $paid;
            } else {
                continue;
            }
            if ($contact->debt == 0) {
                $contact->next_debt_payment_at = Carbon::now()->addYears(10);
            } else {
                $contact->next_debt_payment_at = Carbon::now()->addDay();
            }
            $contact->save();
        }
    }
}
