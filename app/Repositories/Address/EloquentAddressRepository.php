<?php

namespace App\Repositories\Address;

use App\Entities\Address;

class EloquentAddressRepository implements AddressInterface
{
    protected $user;

    public function __construct(Address $user)
    {
        $this->user = $user;
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function findBy($att, $column)
    {
        return $this->user->where($att, $column);
    }

    public function all() {
        return $this->user->all();
    }

    public function create(array $data) {

    }

    public function update($id, array $data) {

    }
}