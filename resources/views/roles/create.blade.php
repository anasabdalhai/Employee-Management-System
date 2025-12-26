
@vite('resources/css/FrontEnd/Dashboard/role/create.css')
@extends('layouts.dashboard')

@section('title')
Roles
@endsection

@section('page_title') 
  <h1> Create Role</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
<li class="breadcrumb-item active">Create Role</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create <small>Form</small></h3>
            </div>

            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                @include('roles._form')

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection
