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

    public function index(): \Illuminate\Http\JsonResponse
    {
        $bikes = $this->service->getAll();
        return response()->json($bikes);
    }

    public function find($id): \Illuminate\Http\JsonResponse
    {
        $bike = $this->service->getById($id);
        return response()->json($bike);
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'color' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'machine' => 'required|string',
            'suspension_type' => 'required|string',
            'transmission_type' => 'required|string',
        ]);

        $bike = $this->service->store($validatedData);

        return response()->json($bike, 201);
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'color' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'machine' => 'required|string',
            'suspension_type' => 'required|string',
            'transmission_type' => 'required|string',
        ]);

        $bike = $this->service->update($id, $validatedData);

        return response()->json($bike, 200);
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
            return response()->json(['message' => 'Bike not found'], 404);
        }

        return response()->json($sale, 201);
    }

}

