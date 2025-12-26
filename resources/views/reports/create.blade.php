@vite('resources/css/FrontEnd/Dashboard/report/create.css')
@extends('layouts.dashboard')

@section('title')
Reports
@endsection

@section('page_title') 
<h1>Create Report</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('reports.index') }}">Reports</a></li>
<li class="breadcrumb-item active">Create Report</li>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Create New Report</h3>
      </div>
      <!-- /.card-header -->
      <form action="{{ route('reports.store') }}" method="POST">
        @csrf
        @include('reports._form')
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Save Report</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection
