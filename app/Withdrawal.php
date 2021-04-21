<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use CrudTrait;

    protected $guarded = ['id'];
}
