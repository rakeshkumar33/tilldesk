<?php

namespace App\Repositories\Contact;

interface PersonInterface
{
    public function find($id);

    public function findBy($att, $column);

    public function all();
}