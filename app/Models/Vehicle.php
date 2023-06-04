<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * @property string $name
 * @property string $color
 * @property int $price
 * @property int $stock
 * @property string $created_at
 * @property string $updated_at
 * @property array $sales
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
//    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'color',
        'price',
        'stock',
        'created_at',
        'updated_at',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
