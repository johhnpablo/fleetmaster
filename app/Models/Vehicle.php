<?php

namespace App\Models;

use App\Enums\VehicleStatus;
use Database\Factories\VehicleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    /**
     * @use HasFactory<VehicleFactory>
     */
    use HasFactory;
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
