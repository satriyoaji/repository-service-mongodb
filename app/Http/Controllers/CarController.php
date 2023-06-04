<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CarService;

class CarController extends Controller
{
    protected $service;

    public function __construct(CarService $service)
    {
        $this->service = $service;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $cars = $this->service->getAll();
        return response()->json($cars);
    }

    public function find($id): \Illuminate\Http\JsonResponse
    {
        $car = $this->service->getById($id);
        return response()->json($car);
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'color' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'machine' => 'required|integer',
            'capacity_passenger' => 'required|integer',
            'type' => 'required|string',
        ]);

        $car = $this->service->store($validatedData);

        return response()->json($car, 201);
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'color' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'machine' => 'required|integer',
            'capacity_passenger' => 'required|integer',
            'type' => 'required|string',
        ]);

        $car = $this->service->update($id, $validatedData);

        return response()->json($car, 200);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $this->service->delete($id);
        return response()->json(null, 204);
    }

    public function addSale(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $quantity = $request->input('quantity');
        $soldDate = $request->input('sold_date');

        $sale = $this->service->addSale($id, $quantity, $soldDate);

        if (!$sale) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        return response()->json($sale, 201);
    }

}

