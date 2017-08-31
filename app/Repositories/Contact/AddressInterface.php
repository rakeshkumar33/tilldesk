<?php

namespace App\Repositories\Contact;

interface AddressInterface
{
    public function find($id);

    public function findBy($att, $column);

    public function all();
}