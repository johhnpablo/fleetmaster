<?php

namespace App\Actions\Vehicle;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class ShowVehicleAction
{
    public function __invoke(Request $request): Vehicle
    {
        return Vehicle::query()->where('id', $request->id)->first();
    }
}