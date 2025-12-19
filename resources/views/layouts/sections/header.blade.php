
<style>
  /* ===== Navbar Glass with Dark Blue Background ===== */
.navbar-glass {
  
   background: rgba(255, 255, 255, 0.06) !important;
    backdrop-filter: blur(2px); /* تأثير blur */
    border-bottom: 1px solid rgba(255,255,255,0.1); /* خط خفيف أسفل الهيدر */
    box-shadow: 0 5px 20px rgba(0,0,0,0.5); /* ظل خفيف */
    border-radius: 0 0 0px 0px; /* حواف دائرية أسفل الهيدر */
    padding: 0.5rem 1rem;
}

/* روابط الهيدر */
.navbar-glass .nav-link {
    color: #fff;
    font-weight: 500;
    transition: 0.3s;
}

.navbar-glass .nav-link:hover {
    color: #00c6ff; /* لون هلو عند الهفر */
    text-shadow: 0 0 5px rgba(0,198,255,0.7);
}

/* أيقونات البار */
.navbar-glass .nav-item .fas {
    color: #fff;
    transition: 0.3s;
}

.navbar-glass .nav-item .fas:hover {
    color: #00c6ff;
}

</style>
<nav class="main-header navbar navbar-expand navbar-light navbar-glass">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('index') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>
</nav>

