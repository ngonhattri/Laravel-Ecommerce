<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];
    public function permission_category()
    {
        return $this->belongsTo('App\Model\PermissionCategory');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','role_permissions');
    }
}
