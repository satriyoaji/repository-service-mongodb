<?php


namespace App\Services;

use App\Repositories\VehicleRepository;
use Carbon\Carbon;

class VehicleService
{
    protected $repository;

    public function __construct(VehicleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function getTotalStock()
    {
        return $this->repository->getTotalStock();
    }

    public function getById($id)
    {
        return $this->repository->find($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        $foundData = $this->repository->find($id);
        if (!$foundData)
            return null;

        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function addSale($vehicleId, $quantity)
    {
        $vehicle = $this->repository->find($vehicleId);
        if (!$vehicle) {
            return null;
        }

        if ($vehicle->stock < $quantity)
            return "INVALID_QUANTITY";

        $soldDate = Carbon::now();
        return $this->repository->addSale($vehicle, $quantity, $soldDate);
    }

}

