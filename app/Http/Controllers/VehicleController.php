<?php

namespace App\Http\Controllers;

use App\Actions\Vehicle\ShowVehicleAction;
use App\Actions\Vehicle\ShowVehiclesAction;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class VehicleController extends Controller
{
    public function index(Request $request, ShowVehiclesAction $vehiclesAction) : Response
    {
        $vehicles = $vehiclesAction($request);
        return Inertia::render('vehicles/Vehicles', ['vehicles' => $vehicles]);
    }

    public function edit(Request $request, ShowVehicleAction $vehicleAction) : Response
    {
        $vehicle = $vehicleAction($request);
        return Inertia::render('vehicles/Edit', ['vehicle' => $vehicle]);
    }

    public function create() : Response
    {
        return Inertia::render('vehicles/Create');
    }
}
