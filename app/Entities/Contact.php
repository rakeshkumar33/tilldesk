<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasHashIds;

class Contact extends Model
{
    use Notifiable;

    protected $guarded = [];



    /**
     * Get all of the owning contactable models.
     */
    public function contactable()
    {
        return $this->morphTo();
    }


    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }


    public function people()
    {
        return $this->morphMany(Person::class, 'personable');
    }
}
