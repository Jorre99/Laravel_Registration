<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Price extends Model
{
    public function swimming_lessons()
    {
        return $this->hasMany('App\Swimming_lesson');
    }
    public function pool_parties()
    {
        return $this->hasMany('App\Pool_party');
    }
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'price',
    ];

}
