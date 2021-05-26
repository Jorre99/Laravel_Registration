<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Json;

class Swimming_lesson extends Model
{


    public function user()

    {
        return $this->belongsTo('App\User');
    }
    public function price()
    {
        return $this->belongsTo('App\Price')->withDefault();
    }
    public function customer_swimming_lessons()
    {
        return $this->hasMany('App\Customer_swimming_lesson');
    }
}
