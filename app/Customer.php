<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    public function pool_parties()
    {
        return $this->hasMany('App\Pool_party');
    }
    public function customer_swimming_lessons()
    {
        return $this->hasMany('App\Customer_swimming_lesson');
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'first_name',
        'telephone_nr',
        'street',
        'house_nr',
        'box_nr',
        'postal_code',
        'city',
        'email',
        'birth_date',
        'note',
    ];
}
