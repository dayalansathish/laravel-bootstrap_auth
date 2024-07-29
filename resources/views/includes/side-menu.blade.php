<div
  class="hover-scroll-overlay-y mx-3 my-5 my-lg-5"
  id="kt_aside_menu_wrapper"
  data-kt-scroll="true"
  data-kt-scroll-height="auto"
  data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
  data-kt-scroll-wrappers="#kt_aside_menu"
  data-kt-scroll-offset="5px"
>
  <div
    class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
    id="#kt_aside_menu"
    data-kt-menu="true"
  >
    <div class="menu-item ">
      <a class="menu-link @if (request()->is('dashboard')) active @endif m-2 " href="/dashboard">
        <span class="menu-icon">
          <i class="ki-duotone ki-element-11 fs-1">
            <span class="path1"></span><span class="path2"></span>
            <span class="path3"></span><span class="path4"></span>
          </i>
        </span>
        <span class="menu-title">Dashboards</span>
      </a>
    </div>
    <div class="menu-item">
      <a class="menu-link  @if (request()->is('customer-details')) active @endif m-2" href="/customer-details">
        <span class="menu-icon">
          <i class="ki-duotone ki-chart-line fs-1">
            <span class="path1"></span><span class="path2"></span>
            <span class="path3"></span><span class="path4"></span>
          </i>
        </span>
        <span class="menu-title">Customers Dashboard</span>
      </a>
    </div>

    <div class="menu-item ">
      <a class="menu-link @if (request()->is('user-list')) active @endif m-2" href="/user-list">
        <span class="menu-icon">
          <i class="ki-duotone ki-shop fs-1">
            <span class="path1"></span><span class="path2"></span>
            <span class="path3"></span><span class4></span>
          </i>
        </span>
        <span class="menu-title">User-List</span>
      </a>
    </div>
    <div class="menu-item">
      <a class="menu-link  @if (request()->is('marketing')) active @endif m-2" href="/marketing">
        <span class="menu-icon">
          <i class="ki-duotone ki-chart-line fs-1">
            <span class="path1"></span><span class="path2"></span>
            <span class="path3"></span><span class="path4"></span>
          </i>
        </span>
        <span class="menu-title">Marketing</span>
      </a>
    </div>
    <div class="menu-item">
      <a class="menu-link  @if (request()->is('create-customer')) active @endif m-2" href="/create-customer">
        <span class="menu-icon">
          <i class="ki-duotone ki-chart-line fs-1">
            <span class="path1"></span><span class="path2"></span>
            <span class="path3"></span><span class="path4"></span>
          </i>
        </span>
        <span class="menu-title">create-customer</span>
      </a>
    </div>
    <div class="menu-item">
      <a class="menu-link  @if (request()->is('login')) active @endif m-2" href="{{route('login')}}">
        <span class="menu-icon">
          <i class="ki-duotone ki-chart-line fs-1">
            <span class="path1"></span><span class="path2"></span>
            <span class="path3"></span><span class="path4"></span>
          </i>
        </span>
        <span class="menu-title">Sign In</span>
      </a>
    </div>
    <div class="menu-item">
      <a class="menu-link  @if (request()->is('register')) active @endif m-2" href="{{route('register')}}">
        <span class="menu-icon">
          <i class="ki-duotone ki-chart-line fs-1">
            <span class="path1"></span><span class="path2"></span>
            <span class="path3"></span><span class="path4"></span>
          </i>
        </span>
        <span class="menu-title">Sign Up</span>
      </a>
    </div>
  </div>
</div>
