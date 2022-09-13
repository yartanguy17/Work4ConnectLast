<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column nav-pills mb-auto">
            <li class="nav-item mb-3">
                <a class="nav-link  link-dark " aria-current="page" href="{{ route('dashboard') }}">
                    <i class="fa fa-home"></i>
                    {{ __('welcome.menu.dashboard') }}
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link link-dark" aria-current="page" href="{{ route('prestataire.applies.index') }}">
                    <i class="fa fa-bullhorn"></i>
                    {{ __('welcome.form.myapp') }}
                </a>
            </li>

            <li class="nav-item mb-3">
                <a href="{{ route('prestataire.contrat.pending') }}" class="nav-link link-dark">
                    <i class="fa fa-bullhorn" width="16" height="16"></i>
                    {{ __('welcome.form.current') }}
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link link-dark" href="{{ route('prestataire.contrat.archived') }}">
                    <i class="fa fa-file"></i>
                    {{ __('welcome.form.expired') }}
                </a>
            </li>

            <li class="nav-item mb-3 dropdown">
                <a class="nav-link active bg-danger" href="{{ route('prestataire.profile_setting') }}">
                    <i class="fa fa-user"></i>
                    {{ __('welcome.menu.profil') }}
                </a>
            </li>

            <li class="nav-item mb-3 dropdown">
                <a class="nav-link link-dark" href="{{ route('prestataire.change_password') }}">
                    <i class="fa fa-edit"></i>
                    {{ __('welcome.footer.password') }}
                </a>
            </li>

            <li class="nav-item mb-3">
                <a class="nav-link link-dark" href="{{ route('client.contrat.archived') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>
                    {{ __('messages.login.logout') }}
                </a>
            </li>

    </div>
</nav>
