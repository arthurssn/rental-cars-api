<?php

namespace App\Repositories;

use App\Interfaces\Model\ICRUD;

class CRUDRepository implements ICRUD
{

    public function __construct(private $model)
    {
    }

    public function getAll(): array
    {
        return $this->model->all()->toArray();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $vehicle = $this->model->find($id);
        $vehicle->update($data);
        return $vehicle;
    }

    public function delete($id)
    {
        $vehicle = $this->model->find($id);
        $vehicle->delete();
        return $vehicle;
    }
}
