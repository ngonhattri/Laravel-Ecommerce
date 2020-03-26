<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RulesCategory extends Model
{
    protected $guarded = [];
    public function rules()
    {
        return $this->hasMany('App\Models\Rules','id_category','id');
    }
}
