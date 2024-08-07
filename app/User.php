<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $connection = "mysql_base";

    protected $fillable = [
        'name', 'email', 'password',"phone","company_name", "role_id", "biller_id", "warehouse_id", "is_active", "is_deleted"
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function companies()
    {
        return $this->belongsToMany('App\Company', 'users_companies', 'user_id', 'company_id');
    }

    public function isActive()
    {
        return $this->is_active;
    }

    public function holiday() {
        return $this->hasMany('App\Holiday');
    }
}