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
    $department = Department::create([
        'name' => $request->name,
        'code' => strtoupper($request->code),
        'description' => $request->description,
        'status' => true,
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Department created successfully.',
        'department' => $department,
    ]);
}

    public function show(Department $department)
    {
        //
    }

   public function edit(Department $department)
{
    return response()->json($department);
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
