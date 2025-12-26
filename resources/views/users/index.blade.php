
@vite('resources/css/FrontEnd/Dashboard/users/index.css')
@extends('layouts.dashboard')
@section('title') Members @endsection
@section('page_title') <h1>Members</h1> @endsection
@section('breadcrumb')
<li class="breadcrumb-item active">Members</li>
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('update'))
<div class="alert alert-info">{{ session('update') }}</div>
@endif
@if(session('delete'))
<div class="alert alert-danger">{{ session('delete') }}</div>
@endif

<div class="row mb-2">
    <div class="col text-right">
        <a href="{{ route('members.create') }}" class="btn btn-primary">Create Member</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Member Table</h3></div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Employee</th>
                            <th>Roles</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->employee?->first_name }} {{ $member->employee?->last_name }}</td>
                            <td>
                                @foreach($member->roles as $role)
                                    <span class="badge bg-info">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-success btn-sm">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
