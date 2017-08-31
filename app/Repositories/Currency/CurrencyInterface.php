<?php

namespace App\Repositories\Currency;

interface CurrencyInterface
{
    public function find($id);

    public function findBy($att, $column);

    public function all();
}