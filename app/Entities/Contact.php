<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasHashIds;

class Contact extends Model
{
    use Notifiable;

    protected $guarded = [];


    protected $casts = [
        'preference' => 'array'
    ];

    /**
     * Get all of the owning contactable models.
     */
    public function contactable()
    {
        return $this->morphTo();
    }


    /**
     * Returns primary address
     */
    public function primaryAddress()
    {
        return $this->morphOne(Address::class, 'addressable')->where('is_primary', true);

    }

    /**
     * Returns primary contact person
     */
    public function primaryContact()
    {
        return $this->morphOne(Person::class, 'personable')->where('is_primary', true);

    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function people()
    {
        return $this->morphMany(Person::class, 'personable');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function memorandum()
    {
        return $this->morphOne(Memo::class, 'memorandum');
    }
}
