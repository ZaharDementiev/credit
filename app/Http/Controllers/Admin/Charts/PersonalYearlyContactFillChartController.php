<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Contact;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Http\Request;

class PersonalYearlyContactFillChartController extends ChartController
{
    private const YEAR = 12;

    public function setup()
    {
        $dataSimple = collect([]);
        $dataFull = collect([]);
        $days = collect([]);
        $id = Request::capture()->segment(count(request()->segments()));

        for ($days_backwards = self::YEAR - 1; $days_backwards >= 0; $days_backwards--) {
            $dataSimple->push(Contact::whereBetween('created_at', [Carbon::now()->subMonths($days_backwards)->startOfMonth(),
                Carbon::now()->subMonths($days_backwards)->endOfMonth()])
                ->where('link_id', $id)
                ->where('full_info', false)
                ->where('token', '!=', null)
                ->count());
            $days->push(Carbon::today()->subMonths($days_backwards)->format('m.y'));
        }

        for ($days_backwards = self::YEAR - 1; $days_backwards >= 0; $days_backwards--) {
            $dataFull->push(Contact::whereBetween('created_at', [Carbon::now()->subMonths($days_backwards)->startOfMonth(),
                Carbon::now()->subMonths($days_backwards)->endOfMonth()])
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
