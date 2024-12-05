<?php

namespace App\Http\Controllers;

use App\Http\Requests\Division\StoreDivisionRequest;
use App\Http\Requests\Division\UpdateDivisionRequest;
use App\Interfaces\DivisionInterface;
use App\Models\Division;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DivisionController extends Controller
{
    public function __construct(
        private readonly DivisionInterface $divisionInterface
    )
    {}

    public function index(Request $request)
    {
        $division = $this->divisionInterface->getAll($request->search, 10);
        return Inertia::render('Dashboard/Division/Index', compact('division'));
    }

    public function store(StoreDivisionRequest $request)
    {
        try {
            $division = $this->divisionInterface->store($request->validated());
            return redirect(route('division.index'))->with('success', 'Create Division Seccess');
        } catch(Exception $e) {
            logger($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Division $division)
    {
        return $division;
    }

    public function update(UpdateDivisionRequest $request, Division $division)
    {
        try {
            $update = $this->divisionInterface->update($request->validated(), $division);
            return redirect(route('division.index'))->with('success', 'Update Division Success');
        } catch(Exception $e) {
            logger($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Division $division)
    {
        try {
        $delete = $this->divisionInterface->delete($division);
        return redirect(route('division.index'))->with('success', 'Delete Division Success');
        } catch(Exception $e) {
            logger($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }
}
