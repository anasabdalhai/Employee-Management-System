@extends('layout.app')

@section('title', 'Profile')

@section('content')

<div class="container py-5">

    <!-- Page Title -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">My Profile</h1>
        <p class="text-muted">
            Manage your personal information, password, and account settings.
        </p>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8 col-md-10">

            <!-- Update Profile Info -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        <i class="fas fa-user text-primary mr-2"></i>
                        Profile Information
                    </h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">
                        <i class="fas fa-lock text-success mr-2"></i>
                        Update Password
                    </h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="card shadow-sm border-danger">
                <div class="card-header bg-white">
                    <h5 class="mb-0 text-danger">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Account
                    </h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
