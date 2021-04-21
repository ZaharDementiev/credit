<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class PersonalLink extends Model
{
    use CrudTrait;

    protected $guarded = ['id'];

    public function linkOpenings()
    {
        return Contact::where('link_id', $this->id)->where('full_info', false)->where('token', '!=', null)->count();
    }

    public function linkUniqueOpenings()
    {
        return Contact::where('link_id', $this->id)->where('full_info', true)->where('token', '!=', null)->count();
    }

    public function statistic()
    {
        $link = '/admin/links/stat/' . $this->id;
        return "<a target='_blank' href=" . $link . ">Петейти</a>";
    }
}
