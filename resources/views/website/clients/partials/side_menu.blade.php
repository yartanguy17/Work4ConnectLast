<div id="left-sidebar" class="sidebar" style="margin-top:13%;">
    <h5 class="brand-name">{{ Auth()->user()->last_name }} {{ Auth()->user()->first_name }}</h5>
    <nav id="left-sidebar-nav" class="sidebar-nav">
        <ul class="metismenu">
            <li>
                <a href="{{ route('client.offers.create') }}"> <span
                        style="color:#e11f2c;font-weight: bold">{{ __('welcome.menu.announce_create') }}</span> </a>
            </li>

            <li>
                <a href="{{ route('client.offers.index') }}"> <span
                        style="color:#e11f2c;font-weight: bold">{{ __('welcome.menu.myannounce') }}</span> </a>
            </li>
            <li>
                <a href="{{ route('client.contrat.pending') }}"> <span
                        style="color:#e11f2c;font-weight: bold">{{ __('welcome.form.current') }}</span> </a>
            </li>

            <li>
                <a href="{{ route('client.contrat.facture') }}"> <span
                        style="color:#e11f2c;font-weight: bold">{{ __('welcome.form.invoice') }}</span> </a>
            </li>

            <li>
                <a href="{{ route('client.contrat.archived') }}"> <span style="color:#e11f2c;font-weight: bold">
                        {{ __('welcome.form.expired') }}</span></a>
            </li>

            <li class="nav-item mb-3 dropdown">
                <a class="nav-link active bg-danger" href="{{ route('client.profile_setting') }}">
                    <i class="fa fa-user"></i>
                    {{ __('welcome.menu.profil') }}
                </a>
            </li>

            <li class="nav-item mb-3 dropdown">
                <a class="nav-link link-dark" href="{{ route('client.change_password') }}">
                    <i class="fa fa-edit"></i>
                    {{ __('welcome.footer.password') }}
                </a>
            </li>
            <li>
                <a href=""><i class="fa fa-gear"></i><span>{{ __('welcome.form.myaccount') }}</span></a>
                <ul>
                    <li><a href="{{ route('client.profile_setting') }}"> <span
                                style="color:#e11f2c;font-weight: bold"> {{ __('welcome.menu.profil') }}</span></a>
                    </li>
                    <li><a href="{{ route('client.change_password') }}"> <span
                                style="color:#e11f2c;font-weight: bold">{{ __('welcome.footer.password') }}</span></a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('messages.login.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</div>
