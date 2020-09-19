<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastName', 'email', 'password','id_institute','status','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that are guarded
     *
     * @var array
     */
    protected $guarded = [
        'role',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //this relations is for the tstudent model, it's fine
    public function tstudent(){
        return $this->hasOne('App\Tstudent','id_student');
    }

    //relations for retrieve the insitute
    public function institute()
    {
        return $this->hasOne('App\Institute','id')->select('id','id_campus','carrera');
    }

    public function hasStatus($status)
    {
        if(Auth::user()->status == $status)
            return 1;
        else
            return 0;
    }

}
