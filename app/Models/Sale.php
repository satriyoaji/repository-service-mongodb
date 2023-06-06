<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * @property int $vehicle_id
 * @property int $quantity
 * @property string $sold_date
 */
class Sale extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'sales';

    protected $fillable = ['vehicle_id', 'quantity', 'sold_date'];

    public function vehicle()
    {
//        return $this->belongsTo(Vehicle::class, 'vehicle_id', '_id');
        return $this->belongsTo(Vehicle::class);
    }
}

