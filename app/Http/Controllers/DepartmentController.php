<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->get();

        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

  public function store(StoreDepartmentRequest $request)
{
    $validated = $request->validated();

    Department::create([
        'name' => $validated['name'],
        'code' => strtoupper($validated['code']),
        'description' => $validated['description'],
        'status' => true,
    ]);

    return redirect()
        ->route('departments.index')
        ->with('success', 'Department created successfully.');
}

    public function show(Department $department)
    {
        //
    }

    public function edit(Department $department)
    {
        //
    }

    public function update(Request $request, Department $department)
    {
        //
    }

    public function destroy(Department $department)
    {
        //
    }
}
