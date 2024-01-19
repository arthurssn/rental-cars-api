<?php

namespace App\Services;

use App\Interfaces\Model\ICRUD;
use Illuminate\Support\Facades\DB;

class CRUDService implements ICRUD
{

    public function __construct(private readonly ICRUD $repository)
    {
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function create(array $data)
    {
        DB::beginTransaction();
        try {
            return $this->repository->create($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function update($id, array $data)
    {
        DB::beginTransaction();
        try {
            $item = $this->repository->update($id, $data);
            DB::commit();
            return $item;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
