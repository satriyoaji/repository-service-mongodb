<?php

namespace App\Services;

use App\Repositories\CarRepository;

class CarService extends VehicleService
{
    public function __construct(CarRepository $repository)
    {
        parent::__construct($repository);
    }
}

