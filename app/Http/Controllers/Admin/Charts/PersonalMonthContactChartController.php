<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Contact;
use App\Payment;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Http\Request;

class PersonalMonthContactChartController extends ChartController
{
    private const MONTH = 30;

    public function setup()
    {
        $dataSimple = collect([]);
        $dataFull = collect([]);
        $days = collect([]);
        $id = Request::capture()->segment(count(request()->segments()));

        for ($i = 1; $i <= self::MONTH; $i++) {
            $dataSimple->push(Contact::whereBetween('created_at', [
                Carbon::now()->subDays(self::MONTH - $i)->startOfDay(),
                Carbon::now()->subDays(self::MONTH - $i)->endOfDay(),
            ])
                ->where('link_id', $id)
                ->where('full_info', false)
                ->where('token', '!=', null)
                ->count());
            $days->push(Carbon::now()->subDays(self::MONTH - $i)->format('d.m.y'));
        }
        for ($i = 1; $i <= self::MONTH; $i++) {
            $dataFull->push(Contact::whereBetween('created_at', [
                Carbon::now()->subDays(self::MONTH - $i)->startOfDay(),
                Carbon::now()->subDays(self::MONTH - $i)->endOfDay(),
            ])
                ->where('link_id', $id)
                ->where('full_info', true)
                ->where('token', '!=', null)
                ->count());
        }

        $this->chart = new Chart();
        $this->chart->labels($days);
        $this->chart->dataset('Простые', 'line', $dataSimple)
            ->color('rgb(77, 189, 116)')
            ->backgroundColor('rgba(77, 189, 116, 0.4)');
        $this->chart->dataset('Полные', 'line', $dataFull)
            ->color('rgb(96, 92, 168)')
            ->backgroundColor('rgba(96, 92, 168, 0.4)');
    }
}
