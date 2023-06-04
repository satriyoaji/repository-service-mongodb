<?php

namespace App\Repositories;

use App\Models\Vehicle;

class VehicleRepository implements \IEntityRepository
{
    protected $model;

    public function __construct(Vehicle $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        return $this->model->where('_id', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->where('_id', $id)->delete();
    }
}
