<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'field_id','day_id','start_at','pelajar','umum',
    ];

    public function transaction(){
    	return $this->hasOne('App\Transaction');
    }
}
