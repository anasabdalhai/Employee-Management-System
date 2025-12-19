@extends('layouts.dashboard')

@section('title')
Tasks
@endsection

@section('page_title') 
  <h1>Edit Task</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Edit Task</li>
@endsection

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit <small>Form</small></h3>
            </div>

            <!-- form start -->
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">

                    {{-- Title --}}
                    <div class="form-group">
                        <label for="title">Task Title</label>
                        <input type="text" 
                               name="title" 
                               class="form-control" 
                               value="{{ old('title', $task->title) }}">
                    </div>

                    {{-- Description --}}
                    <div class="form-group">
                        <label for="description">Task Description</label>
                        <textarea name="description" 
                                  class="form-control">{{ old('description', $task->description) }}</textarea>
                    </div>

                    {{-- Employee --}}
                    <div class="form-group">
                        <label for="employee_id">Assigned Employee</label>
                        <select name="employee_id" class="form-control">
                            <option value="">-- Select Employee --</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" 
                                        @if($employee->id == $task->employee_id) selected @endif>
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Department --}}
                    <div class="form-group">
                        <label for="department_id">Department</label>
                        <select name="department_id" class="form-control">
                            <option value="">-- Select Department --</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" 
                                        @if($department->id == $task->department_id) selected @endif>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status">Task Status</label>
                        <select name="status" class="form-control">
                            <option value="pending"      {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed"   {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
