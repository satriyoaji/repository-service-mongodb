<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * additional properties:
 * @property string $machine
 * @property string $suspension_type
 * @property string $transmission_type
 */

class Bike extends Vehicle
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
        'suspension_type',
        'transmission_type',
        'created_at',
        'updated_at',
    ];
//    protected $guarded = ['id'];
}
