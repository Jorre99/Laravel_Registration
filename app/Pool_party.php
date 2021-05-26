<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pool_party extends Model
{
    public function price()
    {
        return $this->belongsTo('App\Price')->withDefault();
    }
    public function meal()
    {
        return $this->belongsTo('App\Meal')->withDefault();
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer')->withDefault();
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'date',
        'customer_id',
        'start_time',
        'end_time',
        'pupil_count',
        'price_id',
        'meal_id',
        'status_pool_party',

    ];
}
