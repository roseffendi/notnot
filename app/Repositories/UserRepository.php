<?php

namespace App\Repositories;

interface UserRepository
{
    /**
     * Retrieve user by id
     * @param  mixed $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Retrieve user by username
     * @param  string $username
     * @return mixed
     */
    public function findByUsername($username);

    /**
     * Retrieve user by email
     * @param  string $email
     * @return mixed
     */
    public function findByEmail($email);
}