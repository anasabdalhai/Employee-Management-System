

@vite('resources/css/FrontEnd/Dashboard/report/index.css')
@extends('layouts.dashboard')
@section('title')
Reports
@endsection

@section('page_title') 
  <h1>Reports</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Reports</li>
@endsection

@section('content')
{{-- عرض الاشعارات --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif
@if (session('update'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('update') }}
    </div>
@endif
@if (session('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('delete') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
    </div>
@endif

<div class="row mb-2">
  <div class="col text-right">
    <a href="{{ route('reports.create') }}" class="btn btn-primary">
        Create Report
    </a>
  </div>
</div>

<!-- /.row -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Reports Table</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Type</th>
                <th>Created By</th>
                <th>Employee</th>
                <th>Department</th>
                <th>Report Start</th>
                <th>Report End</th>
                <th>Content</th>
                <th colspan="2">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->title }}</td>
                <td>{{ $report->type }}</td>
                <td>{{ $report->creator?->name }}</td>
                <td>{{ $report->employee?->first_name }} {{ $report->employee?->last_name }}</td>
                <td>{{ $report->department?->name }}</td>
                <td>{{ $report->report_period_start?->format('Y-m-d') }}</td>
                <td>{{ $report->report_period_end?->format('Y-m-d') }}</td>
                <td>{{ Str::limit($report->content, 50) }}</td>
                <td>
                    <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-success btn-sm">Edit</a>
                </td>
                <td>
                    <form action="{{ route('reports.destroy', $report->id) }}" 
                          method="POST" 
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<!-- /.row -->
@endsection
