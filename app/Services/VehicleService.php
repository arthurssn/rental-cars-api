<?php

namespace App\Services;

use App\Interfaces\Model\ICRUD;

class VehicleService extends CRUDService
{
    public function __construct(ICRUD $repository)
    {
        parent::__construct($repository);
    }
}
