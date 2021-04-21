<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Contact;
use App\Payment;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Http\Request;

class PersonalThreeDaysChartController extends ChartController
{
    private const DAYS = 3;

    public function setup()
    {
        $dataTrue = collect([]);
        $dataFalse = collect([]);
        $days = collect([]);

        $id = Request::capture()->segment(count(request()->segments()));
        $c = \App\Contact::where('link_id', $id)->where('token', '!=', null)->pluck('id');

        if (count($c) == 0) {
            for ($i = 0; $i < self::DAYS; $i++) {
                $dataTrue->push(0);
                $dataFalse->push(0);
                $days->push(Carbon::now()->subDays(self::DAYS - $i)->format('d.m.y'));
            }
        } elseif (count($c) == 1) {
            for ($i = 1; $i <= self::DAYS; $i++) {
                $dataFalse->push(Payment::whereBetween('created_at', [
                    Carbon::now()->subDays(self::DAYS - $i)->startOfDay(),
                    Carbon::now()->subDays(self::DAYS - $i)->endOfDay(),
                ])
                    ->where('contact_id', [$c[0]])
                    ->where('success', false)
                    ->sum('amount'));
                $days->push(Carbon::now()->subDays(self::DAYS - $i)->format('d.m.y'));
            }

            for ($i = 1; $i <= self::DAYS; $i++) {
                $dataTrue->push(Payment::whereBetween('created_at', [
                    Carbon::now()->subDays(self::DAYS - $i)->startOfDay(),
                    Carbon::now()->subDays(self::DAYS - $i)->endOfDay(),
                ])
                    ->where('contact_id', [$c[0]])
                    ->where('success', true)
                    ->sum('amount'));
            }
        } else {
            for ($i = 1; $i <= self::DAYS; $i++) {
                $dataTrue->push(Payment::whereBetween('created_at', [
                    Carbon::now()->subDays(self::DAYS - $i)->startOfDay(),
                    Carbon::now()->subDays(self::DAYS - $i)->endOfDay(),
                ])
                    ->whereIn('contact_id', $c)
                    ->where('success', true)
                    ->sum('amount'));
                $days->push(Carbon::now()->subDays(self::DAYS - $i)->format('d.m.y'));
            }

            for ($i = 1; $i <= self::DAYS; $i++) {
                $dataFalse->push(Payment::whereBetween('created_at', [
                    Carbon::now()->subDays(self::DAYS - $i)->startOfDay(),
                    Carbon::now()->subDays(self::DAYS - $i)->endOfDay(),
                ])
                    ->whereIn('contact_id', $c)
                    ->where('success', false)
                    ->sum('amount'));
            }
        }

        $this->chart = new Chart();
        $this->chart->labels($days);
        $this->chart->dataset('Получено', 'line', $dataTrue)
            ->color('rgb(77, 189, 116)')
            ->backgroundColor('rgba(77, 189, 116, 0.4)');
        $this->chart->dataset('Не получено', 'line', $dataFalse)
            ->color('rgb(96, 92, 168)')
            ->backgroundColor('rgba(96, 92, 168, 0.4)');
    }
}
