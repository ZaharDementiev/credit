@extends(backpack_view('blank'))

@php
    $simpleMonthContact = \App\Contact::where('created_at', '>=', new DateTime('-1 years'))->where('full_info', false)->count();
    $simpleYearContact = \App\Contact::where('created_at', '>=', new DateTime('-1 months'))->where('full_info', false)->count();

    $fullMonthContact = \App\Contact::where('created_at', '>=', new DateTime('-1 years'))->where('full_info', true)->count();
    $fullYearContact = \App\Contact::where('created_at', '>=', new DateTime('-1 months'))->where('full_info', true)->count();

    $widgets['before_content'][] = [
            'type' => 'div',
            'class' => 'row',
            'content' => [ // widgets
                [
                    'type' => 'chart',
                    'wrapperClass' => 'col-md-6',
                    // 'class' => 'col-md-6',
                    'controller' => \App\Http\Controllers\Admin\Charts\MonthlyContactFillChartController::class,
                    'content' => [
                        'header' => 'Новых контактов',
                        'body'   => 'За 30 дней: ' . $simpleMonthContact. '<br><br>',
                        ]
                ],
                [
                    'type' => 'chart',
                    'wrapperClass' => 'col-md-6',
                    // 'class' => 'col-md-6',
                    'controller' => \App\Http\Controllers\Admin\Charts\YearlyContactFillChartController::class,
                    'content' => [
                        'header' => 'Новых контактов',
                        'body'   => 'За год: ' . $simpleYearContact. '<br><br>',
                        ]
                ],
            ]
        ];
    $widgets['before_content'][] = [
            'type' => 'div',
            'class' => 'row',
            'content' => [ // widgets
                [
                    'type' => 'chart',
                    'wrapperClass' => 'col-md-6',
                    // 'class' => 'col-md-6',
                    'controller' => \App\Http\Controllers\Admin\Charts\MonthlyFullContactFillChartController::class,
                    'content' => [
                        'header' => 'Новых полных контактов',
                        'body'   => 'За 30 дней: ' . $fullMonthContact. '<br><br>',
                        ]
                ],
                [
                    'type' => 'chart',
                    'wrapperClass' => 'col-md-6',
                    // 'class' => 'col-md-6',
                    'controller' => \App\Http\Controllers\Admin\Charts\YearlyFullContactFillChartController::class,
                    'content' => [
                        'header' => 'Новых полных контактов',
                        'body'   => 'За год: ' . $fullYearContact. '<br><br>',
                        ]
                ],
            ]
        ];
@endphp

@section('content')
@endsection
