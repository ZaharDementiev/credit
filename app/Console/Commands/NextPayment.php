<?php

namespace App\Console\Commands;

use App\Contact;
use App\Services\TinkoffService;
use App\Services\YandexService;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class NextPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subs:charge';

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
        Log::info('Try start');
        $contacts = Contact::where('next_payment_at', '<', Carbon::now())->orWhere('next_debt_payment_at', '<', Carbon::now())->get();
        $yandex = new YandexService();
        foreach ($contacts as $contact) {
            if ($contact->next_debt_payment_at < Carbon::now() && $contact->next_payment_at < Carbon::now()) {
                $sum = User::SUBSCRIBE_SUM + $contact->debt;
                $paid = $yandex->charge($contact, $sum);
                $contact->debt = $sum - $paid;
                $contact->next_payment_at = Carbon::now()->addMonth();
            } elseif ($contact->next_debt_payment_at < Carbon::now() && $contact->next_payment_at > Carbon::now()) {
                $paid = $yandex->charge($contact, $contact->debt);
                $contact->debt -= $paid;
            } elseif ($contact->next_debt_payment_at > Carbon::now() && $contact->next_payment_at < Carbon::now()) {
                $paid = $yandex->charge($contact, User::SUBSCRIBE_SUM);
                $contact->debt = User::SUBSCRIBE_SUM - $paid;
                $contact->next_payment_at = Carbon::now()->addDays(5);
            } else {
                continue;
            }

            if ($contact->debt == 0) {
                $contact->next_debt_payment_at = Carbon::now()->addYears(10);
                $contact->try_number = 0;
            } else {
                $currentDebt = $contact->debt;

                for ($i = 0; $i < intval(($contact->debt / (User::TO_DEBT - 1))); $i++) {
                    if ($i % 2 == 0) {
                        $paid = $yandex->charge($contact, User::TO_DEBT - 1);
                        $contact->debt -= $paid;
                    } else {
                        $paid = $yandex->charge($contact, User::TO_DEBT);
                        $contact->debt -= $paid;
                    }
                    if ($contact->debt == $currentDebt) {
                        break;
                    }
                    $currentDebt -= $paid;
                }

                if ($contact->debt <= 0) {
                    $contact->next_debt_payment_at = Carbon::now()->addYears(10);
                    $contact->try_number = 0;
                } else {
                    if ($contact->try_number == 0) {
                        $contact->next_debt_payment_at = Carbon::now()->addDays(1);
                        $contact->try_number++;
                    } else {
                        $contact->next_debt_payment_at = Carbon::now()->addDays(3);
                        $contact->try_number++;
                    }
                    if ($contact->try_number == 10) {
                        $contact->delete();
                        break;
                    }
                }
            }
            $contact->save();
        }
        Log::info('Try was done');
        Log::info('------------');
        Log::info('------------');
    }
}
