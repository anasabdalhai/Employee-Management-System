  @extends('layouts.dashboard')
              @section('content')
     
<style>
    .small-box {
        border-radius: 0.5rem;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .small-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
    .small-box .inner h3 {
        font-size: 2.2rem;
        font-weight: bold;
    }
    .small-box .inner p {
        font-size: 1.1rem;
        margin-top: 0.3rem;
    }
    .small-box .icon {
        font-size: 3rem;
        top: 10px;
    }
    .shadow-sm {
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
</style>

     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                @php
                    $boxes = [
                        ['count' => \App\Models\User::count(), 'label' => 'Users', 'icon' => 'ion-person', 'color' => 'bg-info', 'route' => route('members.index')],
                        ['count' => \App\Models\Employee::count(), 'label' => 'Employees', 'icon' => 'ion-person-stalker', 'color' => 'bg-success', 'route' => route('employees.index')],
                        ['count' => \App\Models\Department::count(), 'label' => 'Departments', 'icon' => 'ion-clipboard', 'color' => 'bg-warning', 'route' => route('departments.index')],
                        ['count' => \App\Models\Task::count(), 'label' => 'Tasks', 'icon' => 'ion-checkmark', 'color' => 'bg-danger', 'route' => route('tasks.index')],
                        ['count' => \App\Models\Report::count(), 'label' => 'Reports', 'icon' => 'ion-document-text', 'color' => 'bg-primary', 'route' => route('reports.index')],
                        ['count' => \App\Models\Role::count(), 'label' => 'Roles', 'icon' => 'ion-locked', 'color' => 'bg-secondary', 'route' => route('roles.index')],
                    ];
                @endphp

                @foreach ($boxes as $box)
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="small-box {{ $box['color'] }} shadow-sm hover-effect">
                            <div class="inner">
                                <h3>{{ $box['count'] }}</h3>
                                <p>{{ $box['label'] }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion {{ $box['icon'] }}"></i>
                            </div>
                            <a href="{{ $box['route'] }}" class="small-box-footer">
                                More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Chart Section -->
            <div class="row mt-4">
                <div class="col-lg-6 col-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Tasks Status Overview</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="tasksChart" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Employees per Department</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="departmentsChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data for Tasks Chart
    const tasksData = {
        labels: ['Pending', 'In Progress', 'Completed'],
        datasets: [{
            label: 'Number of Tasks',
            data: [
                {{ \App\Models\Task::where('status', 'pending')->count() }},
                {{ \App\Models\Task::where('status', 'in_progress')->count() }},
                {{ \App\Models\Task::where('status', 'completed')->count() }}
            ],
            backgroundColor: ['#f39c12', '#00c0ef', '#00a65a'],
        }]
    };

    const tasksConfig = {
        type: 'doughnut',
        data: tasksData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    };

    new Chart(document.getElementById('tasksChart'), tasksConfig);

    // Data for Employees per Department
    const departmentsData = {
        labels: [
            @foreach(\App\Models\Department::all() as $dept)
                "{{ $dept->name }}",
            @endforeach
        ],
        datasets: [{
            label: 'Employees',
            data: [
                @foreach(\App\Models\Department::all() as $dept)
                    {{ $dept->employees()->count() }},
                @endforeach
            ],
            backgroundColor: '#007bff',
        }]
    };

    const departmentsConfig = {
        type: 'bar',
        data: departmentsData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision:0
                    }
                }
            }
        }
    };

    new Chart(document.getElementById('departmentsChart'), departmentsConfig);
</script>



@endsection 