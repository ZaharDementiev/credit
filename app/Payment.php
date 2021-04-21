<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public const STATUS_CANCEL = 0;
    public const STATUS_OK = 1;

    public const FIRST = 0;
    public const CHARGE = 1;

    public static function successSum($id)
    {
        $c = \App\Contact::where('link_id', $id)->where('token', '!=', null)->pluck('id');


        if (count($c) == 0) {
            return 0;
        } elseif (count($c) == 1) {
            return Payment::whereBetween('created_at', [\Carbon\Carbon::now()->subDays(3)->startOfDay(), \Carbon\Carbon::now()->endOfDay()])
                ->where('contact_id', [$c[0]])
                ->where('success', true)
                ->sum('amount');
        } else {
            return Payment::whereBetween('created_at', [\Carbon\Carbon::now()->subDays(3)->startOfDay(), \Carbon\Carbon::now()->endOfDay()])
                ->whereIn('contact_id', $c)
                ->where('success', true)
                ->sum('amount');
        }
    }

    public static function nonSuccessSum($id)
    {
        $c = \App\Contact::where('link_id', $id)->where('token', '!=', null)->pluck('id');

        if (count($c) == 0) {
            return 0;
        } elseif (count($c) == 1) {
            return Payment::whereBetween('created_at', [\Carbon\Carbon::now()->subDays(3)->startOfDay(), \Carbon\Carbon::now()->endOfDay()])
                ->where('contact_id', [$c[0]])
                ->where('success', false)
                ->sum('amount');
        } else {
            return Payment::whereBetween('created_at', [\Carbon\Carbon::now()->subDays(3)->startOfDay(), \Carbon\Carbon::now()->endOfDay()])
                ->whereIn('contact_id', $c)
                ->where('success', false)
                ->sum('amount');
        }
    }
}
