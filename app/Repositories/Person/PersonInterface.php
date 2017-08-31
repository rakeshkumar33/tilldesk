<?php

namespace App\Repositories\Person;

interface PersonInterface
{
    public function find($id);

    public function findBy($att, $column);

    public function all();
}