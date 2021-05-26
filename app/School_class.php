<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School_class extends Model
{
    public function pool_appointments()
    {
        return $this->hasMany('App\Pool_appointment');
    }
    public function school()
    {
        return $this->belongsTo('App\School')->withDefault();
    }
}
