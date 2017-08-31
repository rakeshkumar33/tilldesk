<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Person extends Model
{

    use Notifiable;

    protected $guarded = [];


    /**
     * Get all of the owning personable models.
     */
    public function personable()
    {
        return $this->morphTo();
    }
}
