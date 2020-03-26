<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = [
        'name', 'username', 'password','role_id', 'email', 'phone','address','avatar','facebook'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $guard = "admins";
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function hasPermission(Permission $permission)
    {
        return !! optional(optional($this->role)->permissions)->contains($permission);
    }
}
