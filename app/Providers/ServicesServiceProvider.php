<?php

namespace App\Providers;

use App\Interfaces\Model\ICRUD;
use App\Repositories\VehicleRepository;
use App\Services\VehicleService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app
            ->when(VehicleService::class)
            ->needs(ICRUD::class)
            ->give(VehicleRepository::class);
    }
}
