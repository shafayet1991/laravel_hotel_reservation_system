<?php

namespace App\Models\System;

use App\Helpers\Helper;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $path = "admin/images/user";

    public function getFileAttribute()
    {
        if(Helper::custom_check_empty($this->photo) !== false){
            return $this->path . "/" . $this->id . "/" . $this->photo;
        }else{
            return $this->photo = "images/no-image.png";
        }
    }

    public function getFileDirectoryAttribute()
    {
        if(Helper::custom_check_empty($this->photo) !== false){
            return $this->path . "/" . $this->id;
        }else{
            return false;
        }
    }

//    public function setPasswordAttribute($pass)
//    {
//        $this->attributes['password'] = bcrypt($pass);
//    }
}
