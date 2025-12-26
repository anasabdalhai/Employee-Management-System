@extends('layout.app')

@section('title', 'Home')

@section('content')

<!-- Hero Section -->
<div class="container mt-3 mb-5">
    <div class="jumbotron text-center bg-light p-5 rounded shadow-sm">
        <h1 class="display-4 fw-bold">Employee Management System</h1>
        <p class="lead text-muted mt-3">
            Organize and manage your company's employees, departments, tasks, and reports efficiently.
        </p>
        <div class="mt-4">
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            @endguest

            @auth
                <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-lg me-2">
                    <i class="fas fa-user"></i> My Profile
                </a>

                <a href="{{ route('logout') }}"
                   class="btn btn-danger btn-lg"
                   onclick="event.preventDefault(); document.getElementById('logout-form-home').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>

                <form id="logout-form-home" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endauth

            <a href="{{ route('layout.contact') }}" class="btn btn-outline-secondary btn-lg">
                <i class="fas fa-envelope"></i> Contact Us
            </a>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="container mt-5">
    <div class="row text-center">
        <div class="col-lg-3 col-md-6 mb-4">
            <i class="fas fa-users fa-3x text-primary mb-3"></i>
            <h5 class="fw-bold">Centralized Employees</h5>
            <p class="text-muted">Manage all employee data in one centralized system.</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <i class="fas fa-tasks fa-3x text-success mb-3"></i>
            <h5 class="fw-bold">Task Management</h5>
            <p class="text-muted">Assign and track tasks efficiently across departments.</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <i class="fas fa-building fa-3x text-warning mb-3"></i>
            <h5 class="fw-bold">Department Organization</h5>
            <p class="text-muted">Manage departments and employees easily.</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <i class="fas fa-chart-bar fa-3x text-danger mb-3"></i>
            <h5 class="fw-bold">Reports & Analytics</h5>
            <p class="text-muted">Generate real-time reports to make informed decisions.</p>
        </div>
    </div>
</div>

<!-- Statistics Section -->
<div class="container mt-5">
    <div class="row text-center">

        @php
            $stats = [
                ['count' => \App\Models\User::count(), 'label' => 'Users', 'icon' => 'user', 'color' => 'bg-info'],
                ['count' => \App\Models\Employee::count(), 'label' => 'Employees', 'icon' => 'users', 'color' => 'bg-success'],
                ['count' => \App\Models\Department::count(), 'label' => 'Departments', 'icon' => 'building', 'color' => 'bg-warning'],
                ['count' => \App\Models\Task::count(), 'label' => 'Tasks', 'icon' => 'tasks', 'color' => 'bg-danger'],
            ];
        @endphp

        @foreach ($stats as $stat)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-white {{ $stat['color'] }} shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center flex-column">
                            <i class="fas fa-{{ $stat['icon'] }} fa-3x mb-2"></i>
                            <h3 class="fw-bold">{{ $stat['count'] }}</h3>
                            <p>{{ $stat['label'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

<!-- How It Works Section -->
<div class="container mt-5 mb-5">
    <h2 class="text-center fw-bold mb-5">How It Works</h2>
    <div class="row text-center">
        <div class="col-md-3 mb-4">
            <i class="fas fa-user-plus fa-2x text-primary mb-2"></i>
            <h6>Create Employees & Departments</h6>
        </div>
        <div class="col-md-3 mb-4">
            <i class="fas fa-tasks fa-2x text-success mb-2"></i>
            <h6>Assign Tasks</h6>
        </div>
        <div class="col-md-3 mb-4">
            <i class="fas fa-chart-line fa-2x text-warning mb-2"></i>
            <h6>Track Progress</h6>
        </div>
        <div class="col-md-3 mb-4">
            <i class="fas fa-file-alt fa-2x text-danger mb-2"></i>
            <h6>Generate Reports</h6>
        </div>
    </div>
</div>

<!-- Security Section -->
<div class="container mb-5">
    <div class="card shadow-sm">
        <div class="card-body text-center">
            <i class="fas fa-lock fa-3x text-primary mb-3"></i>
            <h4 class="fw-bold">Secure & Role-Based Access</h4>
            <p class="text-muted mt-2">
                Protect sensitive employee information with authentication and role-based permissions.
            </p>
        </div>
    </div>
</div>

<!-- Call To Action Section -->
<div class="container text-center mb-5">
    <h4 class="fw-bold mb-3">Get Started Today</h4>
    <p class="text-muted mb-4">
        Sign in now to manage your employees and departments efficiently.
    </p>

    @guest
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">
            <i class="fas fa-sign-in-alt"></i> Login
        </a>
    @endguest

    @auth
        <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-lg me-2">
            <i class="fas fa-user"></i> My Profile
        </a>

        <a href="{{ route('logout') }}"
           class="btn btn-danger btn-lg"
           onclick="event.preventDefault(); document.getElementById('logout-form-cta').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>

        <form id="logout-form-cta" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    @endauth
</div>

@endsection
