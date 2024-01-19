<?php

namespace App\Providers;

use App\Http\Controllers\VehicleController;
use App\Interfaces\Model\ICRUD;
use App\Services\VehicleService;
use Illuminate\Support\ServiceProvider;

class ControllersServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app
            ->when(VehicleController::class)
            ->needs(ICRUD::class)
            ->give(VehicleService::class);
    }
}
