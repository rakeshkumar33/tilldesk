<?php

namespace App\Repositories\Country;

interface CountryInterface
{
    public function find($id);

    public function findBy($att, $column);

    public function all();
}