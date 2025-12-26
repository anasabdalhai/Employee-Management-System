
@vite('resources/css/FrontEnd/layouts/sections/header.css')
<nav class="main-header navbar navbar-expand navbar-light navbar-glass">

    <!-- LEFT NAVBAR -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('layout.contact') }}" class="nav-link">Contact</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('layout.about') }}" class="nav-link">About Us</a>
        </li>
    </ul>

    <!-- RIGHT NAVBAR -->
    <ul class="navbar-nav ms-auto">

        @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>
        @endguest

        @auth
            <li class="nav-item me-3">
                <a href="{{ route('profile.edit') }}" class="nav-link">
                    My Profile
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('logout') }}"
                   class="nav-link"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        @endauth

    </ul>
</nav>
