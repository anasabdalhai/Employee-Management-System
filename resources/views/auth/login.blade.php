@vite('resources/css/FrontEnd/Front_Pages/login.css')


@extends('layout.app')

@section('title', 'Login')

@section('content')


<div class="login-wrapper">
    <div class="login-card">
        <!-- Logo -->
        <img src="/layout/logo.jpg" alt="Logo" class="logo">

        <h1>Welcome Back</h1>
        <p>Login to your account</p>

        <!-- Session Status -->
        <x-auth-session-status :status="session('status')" class="mb-4" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="error-text" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required>
                <x-input-error :messages="$errors->get('password')" class="error-text" />
            </div>

            <!-- Remember Me -->
            <div class="form-group">
                <label>
                    <input type="checkbox" name="remember"> {{ __('Remember me') }}
                </label>
            </div>

            <div class="actions">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif
                <button type="submit">{{ __('Log in') }}</button>
            </div>
        </form>

        <div class="register-link">
            Don't have an account? <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</div>
@endsection
