<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
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
        'suspension_type',
        'transmission_type',
    ];
//    protected $guarded = ['id'];
}
