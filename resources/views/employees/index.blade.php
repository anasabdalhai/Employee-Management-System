@vite('resources/css/FrontEnd/Dashboard/employees/index.css')


@extends('layouts.dashboard')
@section('title')
Employees
@endsection
@section('page_title') 
  <h1>Employees</h1>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active">Employees</li>
@endsection
@section('content')
<div class="page-container">


{{-- عرض الاشعارات --}}
@if (session('success'))
    <div class="alert alert-success custom-alert">
        ✅ {{ session('success') }}
    </div>
@endif

@if (session('update'))
    <div class="alert alert-info custom-alert">
        ✏️ {{ session('update') }}
    </div>
@endif

@if (session('delete'))
    <div class="alert alert-danger custom-alert">
        🗑️ {{ session('delete') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger custom-alert">
        ❌ {{ session('error') }}
    </div>
@endif

<div class="row mb-3">
  <div class="col text-right">
    <a href="employees/create" class="btn btn-glass">
      <i class="fas fa-user-plus"></i> Create Employee
    </a>
  </div>
</div>

<div class="row ">
  <div class="col-12">
    <div class="card glass-card">
      <div class="card-header table-header border-0 d-flex justify-content-between align-items-center">

        <h3 class="card-title text-white mb-0">
          <i class="fas fa-users"></i> Employee Table
        </h3>
      </div>

      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap modern-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Department</th>
              <th>Salary</th>
              <th>Hire Date</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>

          <tbody>
            @foreach($employees as $employee)
              <tr>
                <td>#{{ $employee->id }}</td>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ ucfirst($employee->gender) }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->department?->name }}</td>
                <td>${{ $employee->salary }}</td>
                <td>{{ $employee->hire_date }}</td>
                <td>
                  @if($employee->status === 'active')
                    <span class="badge badge-soft-success">Active</span>
                  @else
                    <span class="badge badge-soft-danger">Inactive</span>
                  @endif
                </td>
                <td class="text-center">
                  <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-icon-edit">
                    <i class="fas fa-edit"></i>
                  </a>

                  <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-icon-delete" onclick="return confirm('Are you sure?')">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

