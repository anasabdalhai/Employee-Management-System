<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Task;
use App\Models\Report;
use App\Models\Member;
use App\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            // Counts
            'employees_count' => Employee::count(),
            'departments_count' => Department::count(),
            'tasks_count' => Task::count(),
            'reports_count' => Report::count(),
            'users_count' => Member::count(),
            'roles_count' => Role::count(),

            // Pie Chart: Task Status
            'tasks_by_status' => Task::selectRaw('status, COUNT(*) as total')
                                    ->groupBy('status')
                                    ->pluck('total', 'status'),

            // Line Chart: Reports per Month
            'reports_monthly' => Report::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                                       ->groupBy('month')
                                       ->orderBy('month')
                                       ->pluck('total', 'month'),

            // Bar Chart: Employees by Department
            'employees_by_department' => Department::withCount('employees')->get(),

            // Last Records
            'latest_tasks' => Task::latest()->take(5)->get(),
            'latest_reports' => Report::latest()->take(5)->get(),
        ]);
    }
}
