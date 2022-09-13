<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | Work4connect</title>
    @include('admin.partials.meta')
    @include('admin.partials.css')
</head>

<body data-sidebar="dark">
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{ route('home') }}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/front/images/resources/logo.png') }}" alt="" height="30">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/front/images/resources/logo.png') }}" alt="" height="22">
                            </span>
                        </a>

                        <a href="{{ route('home') }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/front/images/resources/logo.png') }}" alt="" height="30">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/front/images/resources/logo.png') }}" alt="" height="22">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>


                    <div class="dropdown d-none d-md-block ms-2">
                        <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span
                                class="flag-icon flag-icon-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }}"></span>
                            {{ Config::get('languages')[App::getLocale()]['display'] }}

                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('admin.lang.switch', $lang) }}"><span
                                            class="flag-icon flag-icon-{{ $language['flag-icon'] }}"></span>
                                        {{ $language['display'] }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (auth('admin')->user()->profile_picture == null)
                            <img class="rounded-circle header-profile-user" src="{{ asset('images/avatar.jpg') }}"
                                alt="">
                        @else
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('profil/' . auth('admin')->user()->profile_picture) }}" alt="">
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class=" font-size-17 align-middle me-1 text-succes">
                            @auth
                                <?= auth()->user()->first_name . ' ' . auth()->user()->last_name ?>
                            @endauth
                        </a>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i>
                            {{ __('messages.login.logout') }}</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.partials.menu')

        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('admin.partials.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Paramètres</h5>
            </div>

            <!-- Settings -->
            <hr class="mt-0" />
            <h6 class="text-center">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="{{ asset('assets/admin/images/layouts/layout-1.jpg') }}"
                        class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                    <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('assets/admin/images/layouts/layout-2.jpg') }}"
                        class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                        data-bsStyle="{{ asset('assets/admin/css/bootstrap-dark.min.css') }}"
                        data-appStyle="{{ asset('assets/admin/css/app-dark.min.css') }}" />
                    <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('assets/admin/images/layouts/layout-3.jpg') }}"
                        class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="form-check form-switch mb-5">
                    <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch"
                        data-appStyle="{{ asset('assets/admin/css/app-rtl.min.css') }}" />
                    <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                </div>
                <div class="d-grid">
                    <a href="https://1.envato.market/grNDB" class="btn btn-primary mt-3" target="_blank"><i
                            class="mdi mdi-cart me-1"></i> Purchase Now</a>
                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    @include('admin.partials.js')
</body>

</html>
