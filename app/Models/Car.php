<?php

namespace App\Models;

/**
 * additional properties:
 * @property string $machine
 * @property int $capacity_passenger
 * @property string $type
 */

class Car extends Vehicle
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'color',
        'price',
        'stock',
        'machine',
        'capacity_passenger',
        'type',
        'created_at',
        'updated_at',
    ];

//    protected $guarded = ['id'];
}
