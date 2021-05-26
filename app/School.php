<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class School extends Model
{
    public function receipts()
    {
        return $this->hasMany('App\Receipt');
    }
    public function school_classes()
    {
        return $this->hasMany('App\School_class');
    }

    use Notifiable;

    protected $fillable = [
        'id',
        'name',
        'email',
        'telephone',
        'street',
        'house_nr',
        'box_nr',
        'postal_code',
        'city'
    ];
}
