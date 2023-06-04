<?php

namespace App\Repositories;

use \App\Models\Car;

class CarRepository extends VehicleRepository
{
    public function __construct(Car $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return $this->model->whereNotNull('capacity_passenger')->whereNotNull('type')->get();
    }
}
