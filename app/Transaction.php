<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'schedule_id', 'status',
    ];
    protected $dates = ['deleted_at'];

    public function schedule(){
    	return $this->belongsTo(Schedule::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
