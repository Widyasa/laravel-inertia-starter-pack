<?php

namespace App\Interfaces;

use App\Models\Division;

interface DivisionInterface
{
    public function getAll(string $search = " ", int $perPage = 10);

    public function getById(string $id);

    public function store(array $data);

    public function update(array $data, Division $division);

    public function delete(Division $division);

}
