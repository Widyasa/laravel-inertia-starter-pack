<?php


namespace App\Repositories;

use App\Interfaces\DivisionLeadInterface;
use App\Models\DivisionLead;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class DivisionLeadRepository implements DivisionLeadInterface
{
    public function getAll(string $search = null, int $perPage = 10): Collection|LengthAwarePaginator
    {
        try {
            $divisionLead = DivisionLead::latest();

            if ($search) {
                $divisionLead->when($search, function ($query, $search) {
                    return $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('phone', 'like', '%' . $search . '%')
                        ->orWhere('address', 'like', '%' . $search . '%');
                });
            }
            if ($perPage > 0) {
                return $divisionLead->paginate($perPage);
            } else {
                return $divisionLead->get();
            }
        } catch (Exception $e) {
            logger($e->getMessage());
            throw $e;
        }
    }
    public function getById(string $id): DivisionLead
    {
        return DivisionLead::findOrFail($id);
    }

    public function store(array $data): DivisionLead
    {
        DB::beginTransaction();
        try {
            $divisionLead = DivisionLead::create(attributes: $data);
            DB::commit();
            return $divisionLead;
        } catch(Exception $e) {
            DB::rollBack();
            logger($e->getMessage());
            throw $e;
        }
    }

    public function update(array $data, DivisionLead $divisionLead): DivisionLead
    {
        DB::beginTransaction();
        try {
            $divisionLead->update($data);
            DB::commit();
            return $divisionLead;
        } catch(Exception $e) {
            DB::rollBack();
            logger($e->getMessage());
            throw $e;
        }
    }

    public function delete(DivisionLead $divisionLead): DivisionLead
    {
        DB::beginTransaction();
        try {
            $divisionLead->delete();
            DB::commit();
            return $divisionLead;
        } catch(Exception $e) {
            DB::rollBack();
            logger($e->getMessage());
            throw new \RuntimeException('Failed to delete division lead');
        }
    }
}
