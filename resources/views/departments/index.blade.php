@vite('resources/css/FrontEnd/Dashboard/department/index.css')


    

@extends('layouts.dashboard')

@section('title')
Departments
@endsection

@section('page_title') 
  <h1>Departments</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Departments</li>
@endsection



@section('content')

{{-- عرض الاشعارات --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('update'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('update') }}
    </div>
@endif

@if (session('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('delete') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
    </div>
@endif

{{-- زر الإنشاء --}}
<div class="row mb-3">
    <div class="col text-right">
        <a href="{{ route('departments.create') }}" class="btn btn-glass">
            Create Department
        </a>
    </div>
</div>

<!-- جدول عرض الأقسام -->
<div class="row ">
    <div class="col-12">
        <div class="card glass-card">

            <div class="card-header">
                <h3 class="card-title">Departments Table</h3>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover modern-table text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Manager ID</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($departments as $dept)
                        <tr>
                            <td>{{ $dept->id }}</td>
                            <td>{{ $dept->name }}</td>
                            <td>{{ $dept->manager_id }}</td>
                            <td>{{ $dept->created_at }}</td>
                            <td>{{ $dept->updated_at }}</td>

                            <td>
                                <a href="{{ route('departments.edit', $dept->id) }}" 
                                   class="btn btn-icon-edit btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                               

                                <form action="{{ route('departments.destroy', $dept->id) }}" 
                                      method="POST"
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-icon-delete btn-sm"
                                            onclick="return confirm('Are you sure?')">
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

@endsection

