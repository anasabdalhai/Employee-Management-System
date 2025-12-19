<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $employees = Employee::with('department')->get();
    return view('employees.index', compact('employees'));
}



    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $departments = Department::all();
    $employee = new Employee(); // إنشاء كائن فارغ
    return view('employees.create', compact('departments', 'employee'));
}

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    // التحقق من البيانات
    $validated = $request->validate([
        'first_name'      => 'required|string|max:50',
        'last_name'       => 'required|string|max:50',
        'gender'          => 'nullable|string|max:10',
        'email'           => 'required|email|max:100|unique:employees,email',
        'phone'           => 'nullable|string|max:20',
        'department_id'   => 'nullable|exists:departments,id',
        'salary'          => 'nullable|numeric',
        'hire_date'       => 'nullable|date',
        'status'          => 'required|string|max:20',
    ]);

    // إنشاء الموظف
    $employee = new Employee();
    $employee->first_name     = $validated['first_name'];
    $employee->last_name      = $validated['last_name'];
    $employee->gender         = $validated['gender'] ?? null;
    $employee->email          = $validated['email'];
    $employee->phone          = $validated['phone'] ?? null;
    $employee->department_id  = $validated['department_id'] ?? null;
    $employee->salary         = $validated['salary'] ?? null;
    $employee->hire_date      = $validated['hire_date'] ?? null;
    $employee->status         = $validated['status'];
    $employee->save();

    // إعادة التوجيه بعد الحفظ
    return redirect()->route('employees.index')
                     ->with('success', 'Employee created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   

public function edit($id)
{
    $employee = Employee::findOrFail($id);
    $departments = Department::all(); // جلب كل الأقسام

    return view('employees.edit', compact('employee', 'departments'));
}


    /**
     * Update the specified resource in storage.
     */
   
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'first_name' => 'required|max:50',
        'last_name'  => 'required|max:50',
        'gender'     => 'required|in:male,female',
        'email'      => 'required|email',
        'phone'      => 'nullable|max:20',
        'department_id' => 'nullable|exists:departments,id',
        'salary'     => 'nullable|numeric',
        'hire_date'  => 'nullable|date',
        'status'     => 'required|in:active,inactive',
    ]);

    $employee = Employee::findOrFail($id);
    $employee->update($validated);

    return redirect()->route('employees.index')
                     ->with('update', 'Employee updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy($id)
{
    $employee = Employee::findOrFail($id);
    $employee->delete();

    return redirect()->route('employees.index')
                     ->with('delete',' Employee delete successfully!');
}

}
