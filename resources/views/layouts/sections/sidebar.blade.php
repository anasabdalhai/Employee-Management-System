
<style>/* ✅ حركة ناعمة للعناصر */


.content-wrapper {
    margin-left: 250px !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
}

.sidebar-collapse .content-wrapper {
    margin-left: 80px !important;
}

.nav-sidebar .nav-link {
  transition: all 0.3s ease-in-out;
  border-radius: 8px;
}
.main-sidebar {
  background: linear-gradient(180deg, #0f2027, #203a43, #2c5364) !important;
}
 /* .main-sidebar {
  background: linear-gradient(180deg, #41295a, #2f0743) !important;
} */
/* .main-sidebar {
  background: linear-gradient(180deg, #000000, #1c1c1c) !important;
} */



.nav-sidebar .nav-link:hover {
  background: linear-gradient(90deg, #007bff, #6610f2);
  transform: translateX(6px);
  color: #fff !important;
}

.nav-sidebar .nav-link.active {
  background: linear-gradient(90deg, #28a745, #20c997);
  color: #fff !important;
  font-weight: bold;
}

/* ✅ تكبير الأيقونة عند المرور */
.nav-sidebar .nav-link:hover .nav-icon {
  transform: scale(1.2);
}

.nav-sidebar .nav-icon {
  transition: all 0.3s ease-in-out;
}

/* ✅ تحسين شكل المستخدم */
.user-panel {
  border-bottom: 1px solid rgba(255,255,255,0.1);
}
</style>


<aside class="main-sidebar sidebar-dark-primary elevation-4 shadow-lg">

  <!-- ✅ Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link text-center">
    <img src="{{ asset('assets/dashboard/dist/img/AdminLTELogo.png') }}"
         class="brand-image img-circle elevation-3"
         style="opacity: .9">
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
    <div class="form-inline px-2 mb-3">
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
    </div>

    <!-- ✅ Dynamic Navigation -->
    <x-nav/>

  </div>
</aside>
