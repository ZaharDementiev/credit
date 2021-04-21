<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Contact;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class YearlyFullContactFillChartController extends ChartController
{
    private const YEAR = 12;

    public function setup()
    {
        $data = collect([]);
        $days = collect([]);

        for ($days_backwards = self::YEAR - 1; $days_backwards >= 0; $days_backwards--) {
            $data->push(Contact::whereBetween('created_at', [Carbon::now()->subMonths($days_backwards)->startOfMonth(),
                Carbon::now()->subMonths($days_backwards)->endOfMonth()])
                ->where('full_info', true)
                ->where('token', '!=', null)
                ->count());
            $days->push(Carbon::today()->subMonths($days_backwards)->format('m.y'));
        }

        $this->chart = new Chart();
        $this->chart->labels($days);
        $this->chart->dataset('Зарегистрировано', 'line', $data)
            ->color('rgb(77, 189, 116)')
            ->backgroundColor('rgba(77, 189, 116, 0.4)');
    }
}
