<?php

namespace App\Repositories;

class VehicleRepository extends CRUDRepository
{
    public function __construct($model)
    {
        parent::__construct($model);
    }
}
