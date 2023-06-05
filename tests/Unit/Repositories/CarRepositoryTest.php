<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;
use App\Models\Car;
use App\Repositories\CarRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateCar()
    {
        $carData = [
            "name" => "Honda Civic",
            "color"  => "blue",
            "price"  => 810220,
            "stock" => 3,
            "machine"  => "mesin utama",
            "capacity_passenger"  => 4,
            "type"  => "sedan"
        ];

        $carRepository = new CarRepository();
        $car = $carRepository->store($carData);

        $this->assertInstanceOf(Car::class, $car);
        $this->assertDatabaseHas('cars', $carData);
    }

    public function testUpdateCar()
    {
        $car = factory(Car::class)->create();

        $updatedData = [
            "name" => "Honda Civic",
            "color"  => "blue",
            "price"  => 810220,
            "stock" => 3,
            "machine"  => "mesin utama",
            "capacity_passenger"  => 4,
            "type"  => "sedan"
        ];

        $carRepository = new CarRepository();
        $updatedCar = $carRepository->update($car->id, $updatedData);

        $this->assertInstanceOf(Car::class, $updatedCar);
        $this->assertEquals($updatedData['name'], $updatedCar->name);
        $this->assertEquals($updatedData['stock'], $updatedCar->stock);
        $this->assertEquals($updatedData['capacity_passenger'], $updatedCar->capacity_passenger);
        $this->assertEquals($updatedData['type'], $updatedCar->type);
    }

}
