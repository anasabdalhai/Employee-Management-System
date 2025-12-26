
@vite('resources/css/FrontEnd/Dashboard/task/create.css')

@extends('layouts.dashboard')

@section('title')
Tasks
@endsection

@section('page_title') 
  <h1>Create Task</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">Tasks</a></li>
<li class="breadcrumb-item active">Create Task</li>
@endsection

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create <small>Task Form</small></h3>
            </div>

            <!-- form start -->
           @include('tasks._form')
            {{-- @include('task._form') --}}
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
