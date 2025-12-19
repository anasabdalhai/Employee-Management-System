<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use App\Models\Employee;
use App\Models\Department;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::with(['creator', 'employee', 'department'])->get();
        return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $employees = Employee::all();
        $departments = Department::all();
        $report = new Report(); // إنشاء كائن فارغ
        return view('reports.create', compact('users', 'employees', 'departments', 'report'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'type' => 'nullable|string|max:50',
            'created_by' => 'required|exists:users,id',
            'employee_id' => 'nullable|exists:employees,id',
            'department_id' => 'nullable|exists:departments,id',
            'report_period_start' => 'nullable|date',
            'report_period_end' => 'nullable|date',
            'content' => 'nullable|string',
        ]);

        $report = new Report();
        $report->title = $validated['title'];
        $report->type = $validated['type'] ?? null;
        $report->created_by = $validated['created_by'];
        $report->employee_id = $validated['employee_id'] ?? null;
        $report->department_id = $validated['department_id'] ?? null;
        $report->report_period_start = $validated['report_period_start'] ?? null;
        $report->report_period_end = $validated['report_period_end'] ?? null;
        $report->content = $validated['content'] ?? null;
        $report->save();

        return redirect()->route('reports.index')
                         ->with('success', 'Report created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        $users = User::all();
        $employees = Employee::all();
        $departments = Department::all();
        return view('reports.edit', compact('report', 'users', 'employees', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'type' => 'nullable|string|max:50',
            'created_by' => 'required|exists:users,id',
            'employee_id' => 'nullable|exists:employees,id',
            'department_id' => 'nullable|exists:departments,id',
            'report_period_start' => 'nullable|date',
            'report_period_end' => 'nullable|date',
            'content' => 'nullable|string',
        ]);

        $report = Report::findOrFail($id);
        $report->update($validated);

        return redirect()->route('reports.index')
                         ->with('update', 'Report updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('reports.index')
                         ->with('delete', 'Report deleted successfully!');
    }
}
