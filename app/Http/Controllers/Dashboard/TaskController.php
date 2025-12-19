<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Employee;
use App\Models\Department;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // جلب كل المهام مع معلومات الموظف والقسم المرتبط
        $tasks = Task::with(['employee', 'department'])->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $departments = Department::all();
        $task = new Task(); // إنشاء كائن فارغ
        return view('tasks.create', compact('employees', 'departments', 'task'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:150',
            'description'   => 'nullable|string',
            'employee_id'   => 'required|exists:employees,id',
            'department_id' => 'required|exists:departments,id',
            'status'        => 'nullable|string|max:20',
        ]);

        $task = new Task();
        $task->title = $validated['title'];
        $task->description = $validated['description'] ?? null;
        $task->employee_id = $validated['employee_id'];
        $task->department_id = $validated['department_id'];
        $task->status = $validated['status'] ?? 'pending';
        $task->save();

        return redirect()->route('tasks.index')
                         ->with('success', 'Task created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $employees = Employee::all();
        $departments = Department::all();
        return view('tasks.edit', compact('task', 'employees', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:150',
            'description'   => 'nullable|string',
            'employee_id'   => 'required|exists:employees,id',
            'department_id' => 'required|exists:departments,id',
            'status'        => 'required|string|max:20|in:pending,in_progress,completed',
        ]);

        $task = Task::findOrFail($id);
        $task->update($validated);

        return redirect()->route('tasks.index')
                         ->with('update', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')
                         ->with('delete','Task deleted successfully!');
    }
}
