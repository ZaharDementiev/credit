@extends(backpack_view('blank'))

@php
    $payed = \App\Payment::successSum($id);
    $nonPayed = \App\Payment::nonSuccessSum($id);

    $simpleMonthContact = \App\Contact::where('created_at', '>=', new DateTime('-1 years'))
        ->where('full_info', false)
        ->where('token', '!=', null)
        ->where('link_id', $id)
        ->count();
    $simpleYearContact = \App\Contact::where('created_at', '>=', new DateTime('-1 months'))
        ->where('full_info', false)
        ->where('token', '!=', null)
        ->where('link_id', $id)
        ->count();

    $fullMonthContact = \App\Contact::where('created_at', '>=', new DateTime('-1 years'))
        ->where('full_info', true)
        ->where('link_id', $id)
        ->where('token', '!=', null)
        ->count();
    $fullYearContact = \App\Contact::where('created_at', '>=', new DateTime('-1 months'))
        ->where('full_info', true)
        ->where('link_id', $id)
        ->where('token', '!=', null)
        ->count();

    $widgets['before_content'][] = [
            'type' => 'div',
            'class' => 'row',
            'content' => [ // widgets
                [
                    'type' => 'chart',
                    'wrapperClass' => 'col-md-6',
                    // 'class' => 'col-md-6',
                    'controller' => \App\Http\Controllers\Admin\Charts\PersonalThreeDaysChartController::class,
                    'content' => [
                        'header' => 'Успешных и не успешных платежей',
                        'body'   => 'За 3 дня успешных: ' . $payed. '<br><br>'. 'За 3 дня не успешных: ' . $nonPayed. '<br><br>',
                        ]
                ],
                [
                    'type' => 'chart',
                    'wrapperClass' => 'col-md-6',
                    // 'class' => 'col-md-6',
                    'controller' => \App\Http\Controllers\Admin\Charts\PersonalMonthContactChartController::class,
                    'content' => [
                        'header' => 'Новых контактов за месяц',
                        'body'   => 'Обычных: ' . $simpleMonthContact. '<br><br>'. 'Полных: ' . $fullMonthContact. '<br><br>',
                        ]
                ],
                [
                    'type' => 'chart',
                    'wrapperClass' => 'col-md-6',
                    // 'class' => 'col-md-6',
                    'controller' => \App\Http\Controllers\Admin\Charts\PersonalYearlyContactFillChartController::class,
                    'content' => [
                        'header' => 'Новых контактов за год',
                        'body'   => 'Обычных: ' . $simpleYearContact. '<br><br>'. 'Полных: ' . $fullYearContact. '<br><br>',
                        ]
                ],
            ]
        ];
@endphp

@section('content')
@endsection
