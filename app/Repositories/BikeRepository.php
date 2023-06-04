<?php

namespace App\Repositories;

use App\Models\Bike;

class BikeRepository extends VehicleRepository
{
    public function __construct(Bike $model)
    {
        parent::__construct($model);
    }
}
