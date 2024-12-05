<?php


namespace App\Repositories;

use App\Interfaces\DivisionInterface;
use App\Models\Division;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class DivisionRepository implements DivisionInterface
{
    public function getAll(string $search = null, int $perPage = 10): Collection|LengthAwarePaginator
    {
        try {
            $division = Division::latest();

            if ($search) {
                $division->when($search, function ($query, $search) {
                    return $query->where('name', 'like', '%' . $search . '%');
                });
            }
            if ($perPage > 0) {
                return $division->paginate($perPage);
            } else {
                return $division->get();
            }
        } catch (Exception $e) {
            logger($e->getMessage());
            throw $e;
        }
    }
    public function getById(string $id): Division
    {
        return Division::findOrFail($id);
    }

    public function store(array $data): Division
    {
        DB::beginTransaction();
        try {
            $division = Division::create(attributes: $data);
            DB::commit();
            return $division;
        } catch(Exception $e) {
            DB::rollBack();
            logger($e->getMessage());
            throw $e;
        }
    }

    public function update(array $data, Division $division): Division
    {
        DB::beginTransaction();
        try {
            $division->update($data);
            DB::commit();
            return $division;
        } catch(Exception $e) {
            DB::rollBack();
            logger($e->getMessage());
            throw $e;
        }
    }

    public function delete(Division $division): Division
    {
        DB::beginTransaction();
        try {
            $division->delete();
            DB::commit();
            return $division;
        } catch(Exception $e) {
            DB::rollBack();
            logger($e->getMessage());
            throw new \RuntimeException('Failed to delete Division');
        }
    }
}
