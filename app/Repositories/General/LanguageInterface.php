<?php

namespace App\Repositories\General;

interface LanguageInterface
{
    public function find($id);

    public function findBy($att, $column);

    public function all();
}