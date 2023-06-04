<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $vehicle_id
 * @property int $quantity
 * @property string $sold_date
 */
class Sale extends Model
{
    protected $fillable = ['vehicle_id', 'quantity', 'sold_date'];

    public function vehicle()
    {
//        return $this->belongsTo(Vehicle::class, 'vehicle_id', '_id');
        return $this->belongsTo(Vehicle::class);
    }
}

