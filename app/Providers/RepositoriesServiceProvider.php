<?php

namespace App\Providers;

use App\Repositories\VehicleRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->when(VehicleRepository::class)->needs('$model')->give('App\Vehicle');
    }
}
