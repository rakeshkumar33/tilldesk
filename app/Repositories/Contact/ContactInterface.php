<?php

namespace App\Repositories\Contact;

interface ContactInterface
{
    public function find($id);

    public function findBy($att, $column);

    public function all();
}