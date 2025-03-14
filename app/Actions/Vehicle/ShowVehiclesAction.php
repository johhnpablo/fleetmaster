<?php

namespace App\Actions\Vehicle;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ShowVehiclesAction
{
    public function __invoke(Request $request): Collection
    {
        $user = $request->user();
        return $user->vehicles;
    }
}