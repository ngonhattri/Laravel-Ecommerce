<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    protected $guarded = [];
    public function rules_categories()
    {
        return $this->belongsTo('App\Models\RulesCategory','id_category','id');
    }
}
