<?php

namespace App\Interfaces;

use App\Models\DivisionLead;

interface DivisionLeadInterface
{
    public function getAll(string $search = " ", int $perPage = 10);

    public function getById(string $id);

    public function store(array $data);

    public function update(array $data, DivisionLead $divisionLead);

    public function delete(DivisionLead $divisionLead);

}
