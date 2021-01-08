<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use CrudTrait;
}
