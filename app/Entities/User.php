<?php

namespace App\Entities;

use Faker\Provider\Company;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'timezone', 'first_day', 'current_org_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'preference' => 'array'
    ];


    public $weekDays = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ];

    public function orgs()
    {
        return $this->belongsToMany(Organization::class)->withPivot(['is_owner', 'role'])->withTimestamps();
    }



    public function ownedOrgs()
    {
        return $this->orgs()->wherePivot( "is_owner", "=", true );
    }


    public function currentOrg()
    {
        return $this->hasOne( Organization::class, 'id' , 'current_org_id'  );
    }


    public function primaryPerson()
    {
        return $this->morphOne(Person::class, 'personable');

    }
}
