<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use CrudTrait;

    protected $guarded = ['id'];
}
