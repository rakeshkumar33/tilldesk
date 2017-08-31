<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use Notifiable;

    protected $guarded = [];



    public function addresses()
    {
        return $this->morphToMany(Address::class, 'addressable');
    }


    public function people()
    {
        return $this->morphToMany(Person::class, 'personable');
    }
}
