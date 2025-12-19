@extends('layouts.dashboard')

@section('title')
Roles
@endsection

@section('page_title') 
  <h1> Edit Role</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Edit Role</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit <small>Form</small></h3>
            </div>

            <form action="{{ route('roles.update', $role) }}" method="POST">

                @csrf
                @method('PUT')
                @include('roles._form')

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection
