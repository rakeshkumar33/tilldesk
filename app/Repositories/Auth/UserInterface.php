<?php

namespace App\Repositories\Auth;

interface UserInterface
{
    public function find($id);

    public function findBy($att, $column);

}