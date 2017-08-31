<?php

namespace App\Repositories\Person;

interface LanguageInterface
{
    public function find($id);

    public function findBy($att, $column);

    public function all();
}