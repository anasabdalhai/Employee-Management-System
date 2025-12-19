@extends('layouts.dashboard')

@section('title')
Reports
@endsection

@section('page_title') 
<h1>Edit Report</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('reports.index') }}">Reports</a></li>
<li class="breadcrumb-item active">Edit Report</li>
@endsection

@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit <small>Form</small></h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('reports.update', $report->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('reports._form')
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
    {{-- يمكن إضافة معلومات جانبية أو تعليمات هنا --}}
  </div>
  <!--/.col (right) -->
</div>
@endsection
