
@vite('resources/css/FrontEnd/Dashboard/task/index.css')
@extends('layouts.dashboard')

@section('title')
Tasks
@endsection

@section('page_title') 
  <h1>Tasks</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Tasks</li>
@endsection

@section('content')

{{-- عرض الاشعارات --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('update'))
    <div class="alert alert-info alert-dismissible fade show custom-alert" role="alert">
        {{ session('update') }}
    </div>
@endif

@if (session('delete'))
    <div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
        {{ session('delete') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
        {{ session('error') }}
    </div>
@endif


{{-- زر الإنشاء --}}
<div class="row mb-3">
    <div class="col text-right">
        <a href="{{ route('tasks.create') }}" class="btn btn-glass">
            + Create Task
        </a>
    </div>
</div>


{{-- الجدول --}}
<div class="row">
    <div class="col-12">
        <div class="card glass-card">

            <div class="card-header">
                <h3 class="card-title">Tasks Table</h3>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap modern-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Employee</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ Str::limit($task->description, 40) }}</td>
                            <td>{{ $task->employee?->first_name }} {{ $task->employee?->last_name }}</td>
                            <td>{{ $task->department?->name }}</td>

                            <td>
                                @if($task->status === 'completed')
                                    <span class="badge-soft-success">Completed</span>
                                @elseif($task->status === 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @else
                                    <span class="badge bg-secondary">{{ $task->status }}</span>
                                @endif
                            </td>

                            <td>{{ $task->created_at->format('Y-m-d') }}</td>

                            <td>
                                <a href="{{ route('tasks.edit', $task->id) }}" 
                                   class="btn btn-icon-edit btn-sm">
                                    ✎
                                </a>

                                <form action="{{ route('tasks.destroy', $task->id) }}" 
                                      method="POST" 
                                      style="display:inline-block;">
                                    
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-icon-delete btn-sm"
                                            onclick="return confirm('Are you sure?')">
                                        🗑
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
