<div id="left-sidebar" class="sidebar" style="margin-top:13%;">
    <h5 class="brand-name">{{ Auth()->user()->last_name }} {{ Auth()->user()->first_name }}</h5>
    <nav id="left-sidebar-nav" class="sidebar-nav">
        <ul class="metismenu">
            <li><a href="{{ route('prestataire.applies.index') }}"><span
                        style="color:#e11f2c;font-weight: bold">{{ __('welcome.form.myapp') }}</span></a></li>
            <li><a href="{{ route('prestataire.contrat.pending') }}"><span
                        style="color:#e11f2c;font-weight: bold">{{ __('welcome.form.current') }}</span></a></li>
            <li><a href="{{ route('prestataire.contrat.archived') }}"><span style="color:#e11f2c;font-weight: bold">
                        {{ __('welcome.form.expired') }}</span></a></li>
            <li>
                <a href=""><i class="fa fa-gear"></i><span
                        style="color:#e11f2c;font-weight: bold">{{ __('welcome.form.myaccount') }}</span></a>
                <ul>
                    <li><a href="{{ route('prestataire.profile_setting') }}"> <span
                                style="color:#e11f2c;font-weight: bold">{{ __('welcome.menu.profil') }}</span></a>
                    </li>
                    <li><a href="{{ route('prestataire.change_password') }}"> <span
                                style="color:#e11f2c;font-weight: bold">{{ __('welcome.footer.password') }}</span>
                        </a></li>
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
