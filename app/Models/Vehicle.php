<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * @property string $name
 * @property string $color
 * @property int $price
 * @property int $stock
 * @property string $machine
 * @property int $created_by
 * @property int $updated_by
 */

class Vehicle extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'vehicles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    /**
    protected $fillable = [
        'name',
        'color',
        'price',
        'stock',
        'machine',
    ];
    */
}
