<?php

namespace App\Repositories;

use App\Models\Vehicle;
use Carbon\Carbon;

class VehicleRepository implements IEntityRepository
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

    public function getTotalStock()
    {
        return $this->model->sum('stock');
    }

    public function addSale($vehicle, $quantity, $soldDate)
    {
        $vehicle->stock = $vehicle->stock - $quantity;
        $vehicle->save();

        $sale = $vehicle->sales()->create([
            'quantity' => $quantity,
            'sold_date' => $soldDate,
        ]);

        return $sale;
    }

    public function getSales($vehicleId)
    {
        return $this->model->where('_id', $vehicleId)->with('sales')->first();
    }

}
