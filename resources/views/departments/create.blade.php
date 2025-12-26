@vite('resources/css/FrontEnd/Dashboard/department/create.css')

@extends('layouts.dashboard')
@section('title')
Depatments
@endsection
@section('page_title') 
  <h1> Create Depatments</h1>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('departments.index') }}">Depatments</a></li>
<li class="breadcrumb-item active">Create Depatments</li>
@endsection

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create <small>Department</small></h3>
            </div>

            <!-- form start -->
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                
                @include('departments._form')

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save Department</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>

    <!-- right column -->
    <div class="col-md-6">
    </div>
    <!--/.col (right) -->
</div>
@endsection
