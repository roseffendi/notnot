<?php

namespace App\Infrastructure\Repositories;

use App\Eloquents\User;
use App\Repositories\UserRepository as Contract;

class UserEloquentRepository implements Contract
{
    use GenericEloquentRepository;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @param User              $model
     */
    public function __construct(User $model)
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

    /**
     * Retrieve user by username
     * @param  string $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return $this->findBy('username', $username);
    }

    /**
     * Retrieve user by email
     * @param  string $email
     * @return mixed
     */
    public function findByEmail($email)
    {
        return $this->findBy('email', $email);
    }
}