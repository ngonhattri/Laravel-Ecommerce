<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $guarded = [];
    public function users()
    {
        return $this->hasMany('App\Models\User','id_school','id'); 
    }
}
