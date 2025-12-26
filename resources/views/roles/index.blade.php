
@vite('resources/css/FrontEnd/Dashboard/role/index.css')
@extends('layouts.dashboard')

@section('title')
Roles
@endsection

@section('page_title') 
  <h1>Roles</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Roles</li>
@endsection

@section('content')

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

<div class="row mb-2">
  <div class="col text-right">
    <a href="{{ route('roles.create') }}" class="btn btn-primary">
        Create Role
    </a>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Roles Table</h3>
      </div>

      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
          
                <th colspan="2">Actions</th>
            </tr>
          </thead>

          <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
            

                <td>
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('roles.destroy', $role->id) }}" 
                          method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            Delete
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
