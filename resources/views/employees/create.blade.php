@vite('resources/css/FrontEnd/Dashboard/employees/create.css')
@extends('layouts.dashboard')
@section('title')
Employees
@endsection
@section('page_title') 
  <h1> Create Employees</h1>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Employees</a></li>
<li class="breadcrumb-item active">Create Employees</li>
@endsection

@section('content')
  <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create <small>Form</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/employees/store" method="POST">
                @csrf
                @include('employees._form')
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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