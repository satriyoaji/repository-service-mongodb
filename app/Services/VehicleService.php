<?php


namespace App\Services;

use App\Repositories\VehicleRepository;

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
        return $this->repository->create($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function addSale($vehicleId, $quantity, $soldDate)
    {
        return $this->repository->addSale($vehicleId, $quantity, $soldDate);
    }

}

