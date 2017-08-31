<?php

namespace App\Repositories\User;

interface UserInterface
{
    public function find($id);

    public function findBy($att, $column);

}