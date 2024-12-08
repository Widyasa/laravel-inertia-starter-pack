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
use Illuminate\Support\Facades\Auth;


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
        $role = Auth::user()->role;
        try {
            $division = $this->divisionInterface->store($request->validated());
            return redirect(route("$role.division.index"))->with('success', 'Create Division Seccess');
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
        $role = Auth::user()->role;
        try {
            $update = $this->divisionInterface->update($request->validated(), $division);
            return redirect(route("$role.division.index"))->with('success', 'Update Division Success');
        } catch(Exception $e) {
            logger($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Division $division)
    {
        $role = Auth::user()->role;
        try {
        $delete = $this->divisionInterface->delete($division);
        return redirect(route("$role.division.index"))->with('success', 'Delete Division Success');
        } catch(Exception $e) {
            logger($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }
}
