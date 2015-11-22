<?php

namespace App\Repositories;

interface OauthClientRepository
{
    /**
     * Retrieve user by id
     * @param  mixed $id
     * @return mixed
     */
    public function findById($id);
}