<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Contact;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class MonthlyContactFillChartController extends ChartController
{
    private const MONTH = 30;

    public function setup()
    {
        $data = collect([]);
        $days = collect([]);

        for ($i = 1; $i <= self::MONTH; $i++) {
            $data->push(Contact::whereBetween('created_at', [
                Carbon::now()->subDays(self::MONTH - $i)->startOfDay(),
                Carbon::now()->subDays(self::MONTH - $i)->endOfDay(),
            ])
                ->where('full_info', false)
                ->where('token', '!=', null)
                ->count());
            $days->push(Carbon::now()->subDays(self::MONTH - $i)->format('d.m.y'));
        }

        $this->chart = new Chart();
        $this->chart->labels($days);
        $this->chart->dataset('Зарегистрировано', 'line', $data)
            ->color('rgb(77, 189, 116)')
            ->backgroundColor('rgba(77, 189, 116, 0.4)');
    }
}
