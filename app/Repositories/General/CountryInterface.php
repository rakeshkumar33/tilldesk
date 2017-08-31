<?php

namespace App\Repositories\General;

interface CountryInterface
{
    public function find($id);

    public function findBy($att, $column);

    public function all();
}