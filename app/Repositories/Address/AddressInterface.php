<?php

namespace App\Repositories\Address;

interface AddressInterface
{
    public function find($id);

    public function findBy($att, $column);

    public function all();
}