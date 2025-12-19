<div>
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column"
        data-widget="treeview"
        role="menu"
        data-accordion="false">

      @foreach($items as $item)
        <li class="nav-item">
          <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}"
             class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}">

            <!-- ✅ الأيقونة من config -->
            <i class="nav-icon {{ $item['icon'] }}"></i>

            <!-- ✅ الاسم -->
            <p>
              {{ $item['title'] }}
            </p>

          </a>
        </li>
      @endforeach

    </ul>
  </nav>
</div>
