<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_swimming_lesson extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer')->withDefault();   // a customer_swimming_lesson belongs to a customer
    }
    public function swimming_lesson()
    {
        return $this->belongsTo('App\Swimming_lesson')->withDefault();
    }
    protected $fillable = [
        'id',
        'customer_id',
        'swimming_lesson_id',
        'date',
        'status_customer_swimming_lesson',
    ];
}
