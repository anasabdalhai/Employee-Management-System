@vite('resources/css/FrontEnd/Dashboard/dashboard.css')
@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')



<!-- Page Header -->
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Dashboard</h1>

        <ol class="breadcrumb bg-transparent p-0 mb-0">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>

    <!-- Small Boxes -->
    <div class="row">
        @php
            $boxes = [
                ['count' => \App\Models\User::count(), 'label' => 'Users', 'icon' => 'user', 'color' => 'bg-info', 'route' => route('members.index')],
                ['count' => \App\Models\Employee::count(), 'label' => 'Employees', 'icon' => 'users', 'color' => 'bg-success', 'route' => route('employees.index')],
                ['count' => \App\Models\Department::count(), 'label' => 'Departments', 'icon' => 'clipboard', 'color' => 'bg-warning', 'route' => route('departments.index')],
                ['count' => \App\Models\Task::count(), 'label' => 'Tasks', 'icon' => 'check-circle', 'color' => 'bg-danger', 'route' => route('tasks.index')],
                ['count' => \App\Models\Report::count(), 'label' => 'Reports', 'icon' => 'file-alt', 'color' => 'bg-primary', 'route' => route('reports.index')],
                ['count' => \App\Models\Role::count(), 'label' => 'Roles', 'icon' => 'lock', 'color' => 'bg-secondary', 'route' => route('roles.index')],
            ];
        @endphp

        @foreach ($boxes as $box)
            <div class="col-lg-4 col-md-6 mb-4 fade-in-up">
                <div class="small-box {{ $box['color'] }} custom-small-box position-relative">
                    <div class="inner">
                        <h3>{{ $box['count'] }}</h3>
                        <p>{{ $box['label'] }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-{{ $box['icon'] }}"></i>
                    </div>
                    <a href="{{ $box['route'] }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Charts -->
    <div class="row mt-4">
        <div class="col-lg-6 mb-4 fade-in-up">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Tasks Status Overview</h3>
                </div>
                <div class="card-body">
                    <canvas id="tasksChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4 fade-in-up">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Employees per Department</h3>
                </div>
                <div class="card-body">
                    <canvas id="departmentsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('tasksChart'), {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'In Progress', 'Completed'],
        datasets: [{
            data: [
                {{ \App\Models\Task::where('status','pending')->count() }},
                {{ \App\Models\Task::where('status','in_progress')->count() }},
                {{ \App\Models\Task::where('status','completed')->count() }}
            ],
            backgroundColor: ['#f39c12','#00c0ef','#00a65a']
        }]
    },
    options: { plugins: { legend: { position: 'bottom' } } }
});

new Chart(document.getElementById('departmentsChart'), {
    type: 'bar',
    data: {
        labels: [
            @foreach(\App\Models\Department::all() as $dept)
                "{{ $dept->name }}",
            @endforeach
        ],
        datasets: [{
            data: [
                @foreach(\App\Models\Department::all() as $dept)
                    {{ $dept->employees()->count() }},
                @endforeach
            ],
            backgroundColor: '#007bff'
        }]
    },
    options: { scales: { y: { beginAtZero: true } }, plugins: { legend: { display: false } } }
});
</script>

@endsection
