<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function studentresultexam()
    {
      return $this->hasMany('App\studentresultexam');
    }
    public function subject()
    {
      return $this->hasMany('App\subject');
    }
    public function section()
    {
      return $this->hasMany('App\section');
    }
    public function imagepass()
    {
        return '/storage/user/'.$this->image ;
    }
    public function restuser()
    {
      return $this->hasOne('App\restuser');
    }
    public function exams()
    {
        return $this->hasMany('App\exam');
    }
    public function contents()
    {
        return $this->hasMany('App\content');
    }
    public function usersection()
    {
        return $this->hasOne('App\usersection');
    }
    public function group()
    {
        return $this->belongsTo('App\group');
    }
    public function sectiongroup()
    {
        return $this->belongsTo('App\sectiongroup');
    }

}
