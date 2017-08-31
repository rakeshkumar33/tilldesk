<?php

namespace App\Repositories\General;

interface CurrencyInterface
{
    public function find($id);

    public function findBy($att, $column);

    public function all();
}