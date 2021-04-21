<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    use CrudTrait;

    protected $guarded = ['id'];

    const FIRST_SMS_TEXT = 'first';
    const NON_CONNECTED_NOT_FIRST = 'non_connected';
    const FOR_PAID = 'for_paid';
}
