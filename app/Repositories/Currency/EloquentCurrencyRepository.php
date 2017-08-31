<?php

namespace App\Repositories\Currency;

use App\Entities\Person;

class EloquentCurrencyRepository implements CurrencyInterface
{
    protected $user;

    public function __construct(Person $user)
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