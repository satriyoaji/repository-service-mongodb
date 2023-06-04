<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BikeService;

class BikeController extends Controller
{
    protected $service;

    public function __construct(BikeService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $cars = $this->service->getAll();
        return response()->json($cars);
    }

    public function show($id)
    {
        $car = $this->service->getById($id);
        return response()->json($car);
    }

    public function store(Request $request)
    {
        $carData = $request->all();
        $car = $this->service->create($carData);
        return response()->json($car, 201);
    }

    public function update(Request $request, $id)
    {
        $carData = $request->all();
        $car = $this->service->update($id, $carData);
        return response()->json($car);
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return response()->json(null, 204);
    }
}

