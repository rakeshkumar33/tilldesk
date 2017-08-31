<?php

namespace App\Repositories\User;

use App\Entities\User;
use App\Repositories\Base\EloquentRepository;
use Illuminate\Foundation\Application;


class EloquentUserRepository extends EloquentRepository
{
    protected $modelInstance;

    public function __construct(Application $app, User $modelInstance)
    {
        parent::__construct($app);
        $this->modelInstance = $modelInstance;
    }

    public function all(array $select = array('*'))
    {
        return parent::all($select);
    }

    public function create(array $data)
    {
        return parent::create($data);
    }


    public function update($id, array $data)
    {
        return parent::update($id, $data);
    }


    public function findBy($att, $column)
    {
        return $this->modelInstance->where($att, $column);
    }
}