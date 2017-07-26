<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = ['name', 'customer_id', 'picture', 'category_id'];

    function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function schedule(){
    	return $this->hasMany('App\Schedule');
    }
}
