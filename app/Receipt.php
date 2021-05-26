<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
    public function school()
    {
        return $this->belongsTo('App\School')->withDefault();
    }
    public function pool_appointments()
    {
        return $this->hasMany('App\Pool_appointment');
    }
}
