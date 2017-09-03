<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $guarded = [];



    /**
     * Get all of the owning contactable models.
     */
    public function memorandum()
    {
        return $this->morphTo();
    }
}
