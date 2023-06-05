<?php

namespace App\Services;

use App\Repositories\BikeRepository;

class BikeService extends VehicleService
{
    public function __construct(BikeRepository $repository)
    {
        parent::__construct($repository);
    }
}

