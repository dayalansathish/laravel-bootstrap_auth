<div id="kt_header" class="header  align-items-stretch">

    <div class="header-brand">

        <a href="?page=index">
            <img alt="Logo" src="{{url('/')}}/assets/media/logos/default-dark.svg" class="h-25px h-lg-25px" />
        </a>

        <div id="kt_aside_toggle" class="
                    btn btn-icon w-auto px-0 btn-active-color-primary aside-minimize
                                    " data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <i class="ki-duotone ki-entrance-right fs-1 me-n1 minimize-default"><span class="path1"></span><span
                    class="path2"></span></i>
            <i class="ki-duotone ki-entrance-left fs-1 minimize-active"><span class="path1"></span><span
                    class="path2"></span></i>
        </div>

        <div class="d-flex align-items-center d-lg-none me-n2" title="Show aside menu">
            <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                <i class="ki-duotone ki-abstract-14 fs-1"><span class="path1"></span><span class="path2"></span></i>
            </div>
        </div>

    </div>

    <div class="toolbar d-flex align-items-stretch">

        <div
            class=" container-xxl  py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">

            <div class="page-title d-flex justify-content-center flex-column me-5">

                <h1 id="pageTitle" class="d-flex flex-column text-gray-900 fw-bold fs-3 mb-0">
                    @yield('title')</h1>

                <!-- <a class="m-2" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> -->
            </div>





        </div>

    </div>

</div>