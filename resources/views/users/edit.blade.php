@extends('layouts.dashboard')

@section('title', 'Edit Member')

@section('page_title')
<h1>Edit Member</h1>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Edit Member</li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    Edit <small>Form</small>
                </h3>
            </div>

            <form action="{{ route('members.update', $member->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('users._form')

                <div class="card-footer">
                    <button class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>

    </div>
</div>

@endsection
