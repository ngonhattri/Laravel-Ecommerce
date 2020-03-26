<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public function categories()
    {
        return $this->belongsTo('App\Models\Category','id_category','id');
    }
    public function users()
    {
        return $this->belongsTo('App\Models\User','id_user','id');
    }
}
