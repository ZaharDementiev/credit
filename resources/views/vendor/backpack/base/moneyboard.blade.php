@extends(backpack_view('blank'))

@php
    $payed = \App\Payment::whereBetween('created_at', [\Carbon\Carbon::now()->subDays(3)->startOfDay(), \Carbon\Carbon::now()->endOfDay()])
        ->where('success', true)
        ->sum('amount');
    $nonPayed = \App\Payment::whereBetween('created_at', [\Carbon\Carbon::now()->subDays(3)->startOfDay(), \Carbon\Carbon::now()->endOfDay()])
        ->where('success', false)
        ->sum('amount');
    $totalSum = \App\Payment::where('success', true)->sum('amount');
    $totalFailedSum = \App\Payment::where('success', false)->sum('amount');
    $totalWithdrawalSum = \App\Withdrawal::sum('amount');


    $widgets['before_content'][] = [
            'type' => 'div',
            'class' => 'row',
            'content' => [ // widgets
                [
                    'type' => 'chart',
                    'wrapperClass' => 'col-md-6',
                    // 'class' => 'col-md-6',
                    'controller' => \App\Http\Controllers\Admin\Charts\PayedThreeDaysChartController::class,
                    'content' => [
                        'header' => 'Успешных платежей',
                        'body'   => 'За 3 дня: ' . $payed. '<br><br>',
                        ]
                ],
                [
                    'type' => 'chart',
                    'wrapperClass' => 'col-md-6',
                    // 'class' => 'col-md-6',
                    'controller' => \App\Http\Controllers\Admin\Charts\NonPayedThreeDaysChartController::class,
                    'content' => [
                        'header' => 'Неуспешных платежей',
                        'body'   => 'За 3 дня: ' . $nonPayed. '<br><br>',
                        ]
                ],
                [
                    'type'          => 'progress_white',
                    'class'         => 'card mb-2',
                    'value'         => number_format($totalSum, 0, '.', '.') . '₽',
                    'description'   => 'Заработано всего',
                    'progress'      => 100, // integer
                    'progressClass' => 'progress-bar bg-primary',
                ],
                [
                    'type'          => 'progress_white',
                    'class'         => 'card mb-2',
                    'value'         => number_format($totalFailedSum, 0, '.', '.') . '₽',
                    'description'   => 'Сумма неудачных платежей',
                    'progress'      => 100, // integer
                    'progressClass' => 'progress-bar bg-primary',
                ],
                [
                    'type'          => 'progress_white',
                    'class'         => 'card mb-2',
                    'value'         => number_format($totalWithdrawalSum, 0, '.', '.') . '₽',
                    'description'   => 'Сумма выводов',
                    'progress'      => 100, // integer
                    'progressClass' => 'progress-bar bg-primary',
                ],
            ]
        ];
@endphp

@section('content')
@endsection
