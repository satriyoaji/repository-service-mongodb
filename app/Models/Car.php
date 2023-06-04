<?php

namespace App\Models;

/**
 * @property string $capacity_passenger
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
        'capacity_passenger',
        'type',
    ];
//    protected $guarded = ['id'];
}
