<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
		'futsal_id','name','address','phone','picture','username','password'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function field(){
        return $this->hasMany('App\Futsal');
    }

    function privillege()
    {
        return $this->belongsTo('App\Privillege');
    }
}
