<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Contact;
use App\Payment;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class PayedThreeDaysChartController extends ChartController
{
    private const DAYS = 3;

    public function setup()
    {
        $data = collect([]);
        $days = collect([]);

        for ($i = 1; $i <= self::DAYS; $i++) {
            $data->push(Payment::whereBetween('created_at', [
                Carbon::now()->subDays(self::DAYS - $i)->startOfDay(),
                Carbon::now()->subDays(self::DAYS - $i)->endOfDay(),
            ])
                ->where('success', true)
                ->sum('amount'));
            $days->push(Carbon::now()->subDays(self::DAYS - $i)->format('d.m.y'));
        }

        $this->chart = new Chart();
        $this->chart->labels($days);
        $this->chart->dataset('Получено', 'line', $data)
            ->color('rgb(77, 189, 116)')
            ->backgroundColor('rgba(77, 189, 116, 0.4)');
    }
}
