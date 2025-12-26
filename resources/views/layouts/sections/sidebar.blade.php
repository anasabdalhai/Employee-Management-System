
@vite('resources/css/FrontEnd/layouts/sections/sidebar.css')

<aside class="main-sidebar sidebar-dark-primary elevation-4 shadow-lg">

  <!-- ✅ Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link text-center">
        <img src="/layout/logo.jpg" alt="Logo" class="logo">
       
    <span class="brand-text font-weight-bold ml-2">EMS System</span>
  </a>

  <!-- ✅ Sidebar -->
  <div class="sidebar">

    <!-- ✅ User Info -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
      <div class="image">
        <img src="{{ asset('assets/dashboard/dist/img/user2-160x160.jpg') }}"
             class="img-circle elevation-2"
             alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block font-weight-bold text-light">
          {{ auth()->user()->name ?? 'Administrator' }}
        </a>
        <small class="text-success">● Online</small>
      </div>
    </div>

    <!-- ✅ Search -->
    {{-- <div class="form-inline px-2 mb-3">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar"
               type="search"
               placeholder="Search..."
               aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> --}}

    <!-- ✅ Dynamic Navigation -->
    <x-nav/>

  </div>
</aside>
