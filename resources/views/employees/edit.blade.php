@extends('layouts.dashboard')
@section('title')
Employees
@endsection
@section('page_title') 
  <h1> Edit Employees</h1>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active">Edit Employees</li>
@endsection

@section('content')
  <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit<small>Form</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/employees/{{$employee->id}}" method="POST">
                @csrf
                @method('PUT')
                @include('employees._form')
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
@endsection