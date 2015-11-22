<?php

namespace App\Infrastructure\Repositories;

use App\Eloquents\OauthClient;
use App\Repositories\OauthClientRepository as Contract;

class OauthClientEloquentRepository implements Contract
{
    use GenericEloquentRepository;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @param OauthClient       $model
     */
    public function __construct(OauthClient $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve user by id
     * @param  mixed $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->find($id);
    }
}