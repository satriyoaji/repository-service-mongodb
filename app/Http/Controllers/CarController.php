<?php


namespace App\Http\Controllers;

use Carbon\Carbon;
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
        return $this->jsonResponse($cars, 200, "successfully get all Cars");
    }

    public function find($id): \Illuminate\Http\JsonResponse
    {
        $car = $this->service->getById($id);
        return $this->jsonResponse($car, 200, "successfully get detail Car");
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $validationData = $this->validateGeneral($request->all(), [
            'name' => 'required|string',
            'color' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'machine' => 'required|string',
            'capacity_passenger' => 'required|integer',
            'type' => 'required|string',
        ]);

        $car = $this->service->store($validationData);

        return $this->jsonResponse($car, 201, "successfully add new Car");
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $validationData = $this->validateGeneral($request->all(), [
            'name' => 'required|string',
            'color' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'machine' => 'required|string',
            'capacity_passenger' => 'required|integer',
            'type' => 'required|string',
        ]);

        $update = $this->service->update($id, $validationData);
        if ($update === null)
            return $this->jsonResponse(null, 404, "Car data not found");

        return $this->jsonResponse($validationData, 200, "successfully update Car");
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $this->service->delete($id);
        return $this->jsonResponse(null, 204, "successfully delete Car");
    }

    public function addSale(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $validationData = $this->validateGeneral($request->all(), [
            'quantity' => 'required|integer',
        ]);

        $sale = $this->service->addSale($id, $request->quantity);
        if ($sale === null) {
            return response()->json(['message' => 'Car not found'], 404);
        }
        if ($sale === "INVALID_QUANTITY") {
            return response()->json(['message' => 'Car stock is out of bond'], 400);
        }

        return $this->jsonResponse($sale, 201, "successfully create new Car sales");
    }

    public function getDetailSales($id): \Illuminate\Http\JsonResponse
    {
        $car = $this->service->getSalesById($id);
        return $this->jsonResponse($car, 200, "successfully get detail sales of Car");
    }
}

