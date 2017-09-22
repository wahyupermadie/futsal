<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Futsal extends Model
{
    protected $fillable = [
        'name','phone','address','picture','lat', 'lng',
    ];

    public function field()
    {
        return $this->hasMany('App\Field');
    }
}

