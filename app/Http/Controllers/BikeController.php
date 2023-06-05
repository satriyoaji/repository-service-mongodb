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
        return $this->jsonResponse($bikes, 200, "successfully get all Bikes");
    }

    public function find($id): \Illuminate\Http\JsonResponse
    {
        $bike = $this->service->getById($id);
        return $this->jsonResponse($bike, 200, "successfully get detail Bike");
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $validationData = $this->validateGeneral($request->all(), [
            'name' => 'required|string',
            'color' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'machine' => 'required|string',
            'suspension_type' => 'required|string',
            'transmission_type' => 'required|string',
        ]);

        $bike = $this->service->store($validationData);

        return $this->jsonResponse($bike, 201, "successfully add new Bike");
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $validationData = $this->validateGeneral($request->all(), [
            'name' => 'required|string',
            'color' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'machine' => 'required|string',
            'suspension_type' => 'required|string',
            'transmission_type' => 'required|string',
        ]);

        $update = $this->service->update($id, $validationData);
        if ($update === null)
            return $this->jsonResponse(null, 404, "Bike data not found");

        return $this->jsonResponse($validationData, 200, "successfully update Bike");
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $delete = $this->service->delete($id);
        if ($delete === null)
            return $this->jsonResponse(null, 404, "Bike data not found");

        return $this->jsonResponse(null, 204, "successfully delete Bike");
    }

    public function addSale(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $validationData = $this->validateGeneral($request->all(), [
            'quantity' => 'required|integer',
        ]);

        $sale = $this->service->addSale($id, $request->quantity);
        if ($sale === null) {
            return response()->json(['message' => 'Bike not found'], 404);
        }
        if ($sale === "INVALID_QUANTITY") {
            return response()->json(['message' => 'Bike stock is out of bond'], 400);
        }

        return $this->jsonResponse($sale, 201, "successfully create new Bike sales");
    }

    public function getDetailSales($id): \Illuminate\Http\JsonResponse
    {
        $bike = $this->service->getSalesById($id);
        return $this->jsonResponse($bike, 200, "successfully get detail sales of Bike");
    }

}

