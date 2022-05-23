<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column nav-pills mb-auto">
            <li class="nav-item mb-3">
                <a class="nav-link active bg-danger" aria-current="page" href="{{ route('dashboard') }}">
                    <i class="fa fa-home"></i>
                    {{ __('welcome.menu.dashboard') }}
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link link-dark" aria-current="page" href="{{ route('client.offers.create') }}">
                    <i class="fa fa-bullhorn"></i>
                    {{ __('welcome.menu.announce') }}
                </a>
            </li>

            <li class="nav-item mb-3">
                <a href="{{ route('client.offers.index') }}" class="nav-link link-dark">
                    <i class="fa fa-bullhorn" width="16" height="16"></i>
                    {{ __('welcome.menu.myannounce') }}
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link link-dark" href="{{ route('client.contrat.pending') }}">
                    <i class="fa fa-file"></i>
                    {{ __('welcome.form.current') }}
                </a>
            </li>

            <li class="nav-item mb-3">
                <a class="nav-link link-dark" href="{{ route('client.contrat.facture') }}">
                    <i class="fa fa-list"></i>
                    {{ __('welcome.form.invoice') }}
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link link-dark" href="{{ route('client.contrat.archived') }}">
                    <i class="fa fa-file"></i>
                    {{ __('welcome.form.expired') }}
                </a>
            </li>
            


            <li class="nav-item mb-3"><a class="nav-link link-dark" href="{{ route('client.profile_setting') }}">
                    <i class="fa fa-user"></i>
                    {{ __('welcome.menu.profil') }}</a></li>
            <li class="nav-item mb-3"><a class="nav-link link-dark" href="{{ route('client.change_password') }}">
                    <i class="fa fa-user"></i>
                    {{ __('welcome.footer.password') }}</a></li>
            <li class="nav-item mb-3">
                <a class="nav-link link-dark" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>
                    {{ __('messages.login.logout') }}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>
    </div>
</nav>
