<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index() {
    // جلب جميع الأقسام مع عدد الموظفين لكل قسم
    $departments = Department::withCount('employees')->get();

    return view('departments.index', compact('departments'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = new Department();
        return view('departments.create', compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:departments,name',
            'manager_id' => 'nullable|integer|exists:employees,id',
        ]);

        $department = new Department();
        $department->name = $validated['name'];
        $department->manager_id = $validated['manager_id'] ?? null;
        $department->save();

        return redirect()->route('departments.index')
                         ->with('success', 'Department created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:departments,name,' . $id,
            'manager_id' => 'nullable|integer|exists:employees,id',
        ]);

        $department = Department::findOrFail($id);
        $department->update($validated);

        return redirect()->route('departments.index')
                         ->with('update', 'Department updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')
                         ->with('delete', 'Department deleted successfully!');
    }
}
