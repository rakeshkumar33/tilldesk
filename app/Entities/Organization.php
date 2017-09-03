<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $guarded = [];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }



    public function primaryContact()
    {
        return $this->morphOne(Contact::class, 'contactable');

    }


    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }
}
