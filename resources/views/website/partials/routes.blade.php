<div class="col-lg-3 mleft">
    @auth
        @if (auth()->user()->type_users == 'client')
            <ul class="list-group">
                <style>
                    a{
                        color:black;
                    }
                    a:hover{
                        color:red;
                    }
                </style>

                <li class="list-group-item text-center bg-danger"><a
                        href="{{ route('client.dashboard') }}" class="lie ">{{ __('welcome.menu.dashboard') }}</a>
                </li>
                <li class="list-group-item text-center"><a
                        href="{{ route('client.offers.create') }}" class="non-underlined active">{{ __('welcome.menu.announce_create') }}</a>
                </li>
                <li class="list-group-item text-center"><a
                        href="{{ route('client.offers.index') }}" class="non-underlined active">{{ __('welcome.menu.myannounce') }}</a>
                </li>
{{--                <li class="list-group-item text-center"><a--}}
{{--                        href="{{ route('client.contrat.pending') }}" class="non-underlined active">{{ __('welcome.form.current') }}</a>--}}
{{--                </li>--}}
                <li class="list-group-item text-center"><a
                        href="{{ route('client.contrat.facture') }}" class="non-underlined active">{{ __('welcome.form.invoice') }}</a>
                </li>
{{--                <li class="list-group-item text-center"><a--}}
{{--                        href="{{ route('client.contrat.archived') }}" class="non-underlined active">{{ __('welcome.form.expired') }}</a>--}}
{{--                </li>--}}
                <li class="list-group-item text-center"><a
                        href="{{ route('client.profile_setting') }}" class="non-underlined active">{{ __('welcome.menu.profil') }}</a>
                </li>
                <li class="list-group-item text-center"><a
                        href="{{ route('client.change_password') }}" class="non-underlined active">{{ __('welcome.footer.password') }}</a>
                </li>
                <li class="list-group-item text-center">
                    <a href="{{ route('logout') }}" class="non-underlined active"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                            class="fas fa-power-off"></i>
                        {{ __('messages.login.logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}"
                          method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        @elseif (auth()->user()->type_users == 'prestataire')
        <style>
                    a{
                        color:black;
                    }
                    a:hover{
                        color:red;
                    }
                </style>
            <ul class="list-group">
                <li class="list-group-item text-center bg-danger"><a
                        href="{{ route('prestataire.dashboard') }}" class="lie ">{{ __('welcome.menu.dashboard') }}</a>
                </li>

{{--                <li class="list-group-item text-center"><a--}}
{{--                        href="{{ route('prestataire.contrat.pending') }}" class="non-underlined active">{{ __('welcome.menu.contrats') }}</a>--}}
{{--                </li>--}}

                <li class="list-group-item text-center"><a
                        href="{{ route('prestataire.profile_setting') }}" class="non-underlined active">{{ __('welcome.menu.profil') }}</a>
                </li>

                <li class="list-group-item text-center"><a
                        href="{{ route('prestataire.change_password') }}" class="non-underlined active">{{ __('welcome.footer.password') }}</a>
                </li>

                <li class="list-group-item text-center">
                    <a href="{{ route('logout') }}" class="non-underlined active"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                            class="fas fa-power-off"></i>
                        {{ __('messages.login.logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}"
                          method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>


                <!--<li>-->
                <!--    <a href="{{ route('logout') }}"-->
                <!--       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i-->
                <!--            class="fas fa-power-off"></i>-->
                <!--        {{ __('messages.login.logout') }}</a>-->
                <!--    <form id="logout-form" action="{{ route('logout') }}"-->
                <!--          method="POST" style="display: none;">-->
                <!--        @csrf-->
                <!--    </form>-->
                <!--</li>-->
            </ul>
        @endif
    @endauth
</div>
