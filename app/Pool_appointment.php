<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pool_appointment extends Model
{
    public function receipt()
    {
        return $this->belongsTo('App\Receipt')->withDefault();
    }
    public function school_class()
    {
        return $this->belongsTo('App\School_class')->withDefault();
    }
}
