<?php

namespace App\Infrastructure\Repositories;

use App\Eloquents\Note;
use App\Repositories\NoteRepository as Contract;

class NoteEloquentRepository implements Contract
{
    use GenericEloquentRepository;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @param Note  $model
     */
    public function __construct(Note $model)
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