<?php

namespace App\Repositories;

use \App\Models\Car;

class CarRepository extends VehicleRepository
{
    public function __construct(Car $model)
    {
        parent::__construct($model);
    }
}
