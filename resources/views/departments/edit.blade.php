@extends('layouts.dashboard')

@section('title')
Departments
@endsection

@section('page_title') 
  <h1>Edit Department</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Edit Department</li>
@endsection

@section('content')
<div class="row">

    <!-- left column -->
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit <small>Department</small></h3>
            </div>

            <!-- form start -->
            <form action="{{ route('departments.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('departments._form')

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
            </form>
        </div>

    </div>
    <!--/.col (left) -->

    <!-- right column -->
    <div class="col-md-6">
    </div>
    <!--/.col (right) -->
</div>
@endsection
