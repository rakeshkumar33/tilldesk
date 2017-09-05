<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $guarded = [];

    protected $casts = [
        'preference' => 'array'
    ];


    protected static function boot()
    {
        parent::boot();
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['is_owner', 'role'])->withTimestamps();
    }



    public function contactInfo()
    {
        return $this->morphOne(Contact::class, 'contactable')->where('is_primary', true);

    }


    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }
}
