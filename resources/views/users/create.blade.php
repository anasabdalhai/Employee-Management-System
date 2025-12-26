
@vite('resources/css/FrontEnd/Dashboard/users/create.css')
@extends('layouts.dashboard')
@section('title')
Members
@endsection
@section('page_title') 
  <h1>Create Member</h1>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('members.index') }}">Members</a></li>
<li class="breadcrumb-item active">Create Member</li>
@endsection

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create <small>Form</small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('members.store') }}" method="POST">
                @csrf
                @include('users._form')
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
        {{-- يمكن تركها فارغة أو إضافة معلومات مساعدة --}}
    </div>
    <!--/.col (right) -->
</div>
@endsection
