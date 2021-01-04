<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Kenvel\Tinkoff;

class PaymentController extends Controller
{
    private $tinkoff;

    public function __construct()
    {
        $api_url    = 'https://securepay.tinkoff.ru/v2/';
        $terminal   = '1605106848048DEMO';
        $secret_key = 'ja6zmn0qsmfofjpj';

        $this->tinkoff = new Tinkoff($api_url, $terminal, $secret_key);
    }

    public function firstPaid()
    {

    }

    ///////////////////////////////////////////////////////////////
    public function payment(Request $request, User $user)
    {
        return view('payment', compact('user'));
    }

    public function link()
    {
//        $model = new Payment;

        $payment = [
            'OrderId'       => 33,        //Ваш идентификатор платежа
            'Amount'        => 349,           //сумма всего платежа в рублях
            'Language'      => 'ru',            //язык - используется для локализации страницы оплаты
            'Description'   => 'Оплата',   //описание платежа
            'Email'         => 'maxxxx@gmail.com',//email покупателя
            'Taxation'      => 'usn_income',     //Налогооблажение
            'Phone'         => '89099998877',   //телефон покупателя
            'Name'          => 'Customer name', //Имя покупателя
            'Recurrent'     => 'Y',
            'CustomerKey'   => '',
        ];

        $items[] = [
            'Name'  => 'Подписка',
            'Price' => 349,    //цена товара в рублях
            'NDS'   => 'vat20',  //НДС
        ];

//Получение url для оплаты
        $paymentURL = $this->tinkoff->paymentURL($payment, $items);

//Контроль ошибок
        if (!$paymentURL) {
            echo($this->tinkoff->error);
        } else {
            $payment_id = $this->tinkoff->payment_id;
//            $model->uuid = $payment_id;
//            $model->save();
            file_put_contents(storage_path("payment_test.txt"), $payment_id);
            return redirect($paymentURL);
        }
    }

    public function confirm(Payment $payment)
    {
        $status = $this->tinkoff->confirmPayment($payment->uuid);

        //Контроль ошибок
        if(!$status){
            echo($this->tinkoff->error);
        } else {
            echo($status);
        }
    }

    public function cancel($id)
    {
        $status = $this->tinkoff->cencelPayment($id);
        //Контроль ошибок
        if(!$status){
            echo($this->tinkoff->error);
        } else {
            echo($status);
        }
    }

    public function status(Request $request)
    {
        if ($request->Success) {
            echo 'OK';
            die;
        } elseif ($request->status == 'REJECTED') {
            echo 'OK';
            die;
        }
        file_put_contents(storage_path('1.txt'), json_encode($request->all()));
        echo 'OK';
    }
}
