@extends('layouts.dashboard') <!-- تأكد من وجود layout -->

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <div class="row">
        {{-- Employees --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $employees_count }}</h3>
                    <p>Employees</p>
                </div>
                <div class="icon"><i class="fas fa-user-tie"></i></div>
            </div>
        </div>

        {{-- Departments --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $departments_count }}</h3>
                    <p>Departments</p>
                </div>
                <div class="icon"><i class="fas fa-building"></i></div>
            </div>
        </div>

        {{-- Tasks --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $tasks_count }}</h3>
                    <p>Tasks</p>
                </div>
                <div class="icon"><i class="fas fa-tasks"></i></div>
            </div>
        </div>

        {{-- Reports --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $reports_count }}</h3>
                    <p>Reports</p>
                </div>
                <div class="icon"><i class="fas fa-file-alt"></i></div>
            </div>
        </div>
    </div>

    {{-- آخر المهام --}}
    <h3>Latest Tasks</h3>
    <ul>
        @foreach($latest_tasks as $task)
            <li>{{ $task->title }} ({{ $task->status }})</li>
        @endforeach
    </ul>

    {{-- آخر التقارير --}}
    <h3>Latest Reports</h3>
    <ul>
        @foreach($latest_reports as $report)
            <li>{{ $report->title }} - {{ $report->created_at->format('Y-m-d') }}</li>
        @endforeach
    </ul>
</div>
@endsection
