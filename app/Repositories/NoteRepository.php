<?php

namespace App\Repositories;

interface NoteRepository
{
    /**
     * Retrieve all record
     * @param  array $columns
     * @return mixed
     */
    public function all($columns = ['*']);

    /**
     * Retrieve user by id
     * @param  mixed $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Create new record
     * @param  array  $data
     * @return mixed
     */
    public function create(array $data);

   /**
     * Update record
     * @param  array  $data
     * @param  mixed  $id
     * @param  string $attributes
     * @return mixed
     */
    public function update(array $data, $id, $attributes="id");

    /**
     * Delete records
     * @param  mixed $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Retrieve all records by given field
     * @param  string $field
     * @param  mixed $value
     * @param  array  $columns
     * @return mixed
     */
    public function findAllBy($field, $value, $columns = array('*'));
}