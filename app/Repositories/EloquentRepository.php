<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $this->model = $this->show($id);
        return $this->model->update($data);
    }

    public function delete($id)
    {
        return $this->model->delete($id);
    }

    public function show($id)
    {
        return $this->model->find($id);
    }
}
