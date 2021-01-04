<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public const STATUS_CANCEL = 0;
    public const STATUS_OK = 1;

    public const FIRST = 0;
    public const CHARGE = 1;
}
