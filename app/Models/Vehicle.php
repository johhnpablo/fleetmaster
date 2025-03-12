<?php

namespace App\Models;

use App\Enums\VehicleStatus;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

    protected $fillable = [
        'model',
        'brand',
        'status',
        'year',
        'color',
        'price',
        'maintenance_last_6_months',
    ];

    protected $casts = [
        'status' => VehicleStatus::class,
        'maintenance_last_6_months' => 'boolean',
        'year' => 'integer',
        'price' => 'decimal:2',

    ];

}
