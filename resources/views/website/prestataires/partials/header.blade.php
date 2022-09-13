<header class="main-header header-style1">

    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
        rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <style>
        .non-underlined {
            text-decoration: none;
        }

        .non-underlined:active {
            text-decoration: none;
            color: red;
        }

    </style>
    {!! NoCaptcha::renderJs() !!}
    <div class="header-upper-style1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-container clearfix" style="margin-top: 1%">
                        <div class="logo-box-style1 float-left">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/front/images/resources/logo.png') }}" alt="Awesome Logo"
                                    class="logo-header">
                                <style>
                                    .logo-header {
                                        height: 45px;
                                    }

                                </style>
                            </a>
                        </div>
                        <div class="main-menu-box float-right">
                            <nav class="main-menu clearfix">
                                <div class="navbar-header clearfix">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                {{-- <style>
                                    a:active {
                                        color: red;
                                    }

                                </style> --}}
                                <div class="navbar-collapse collapse clearfix menuBar">
                                    <ul class="navigation clearfix non-underlined">
                                        <li class="dropdown">
                                            <a href="{{ route('home') }}"
                                                class="non-underlined active">
                                                {{ __('welcome.menu.home') }}</a>

                                        </li>
                                        <li class="dropdown"><a href="{{ route('faq') }}"
                                                class="non-underlined">{{ __('welcome.menu.faqs') }}</a>

                                        </li>
                                       
                                        <li class="dropdown"><a href="{{ route('blog') }}"
                                                class="non-underlined">{{ __('welcome.menu.blog') }}</a>


                                        <li><a href="{{ route('contact') }}"
                                                class="non-underlined">{{ __('welcome.menu.contact') }}</a>
                                        </li>


                                        @if (!auth()->user())
                                            <li class="dropdown"><a href=""
                                                    class="non-underlined">{{ __('welcome.menu.sign') }} |
                                                    {{ __('welcome.menu.register') }}</a>
                                                <ul>
                                                    <li><a href="{{ route('login') }}"
                                                            class="non-underlined">{{ __('welcome.menu.sign') }}</a>
                                                    </li>
                                                    <li><a href="{{ route('register_client') }}"
                                                            class="non-underlined"><span>{{ __('welcome.menu.company') }}</span>
                                                        </a></li>
                                                    <li><a href="{{ route('register_prestataire') }}"
                                                            class="non-underlined"><span>{{ __('welcome.menu.jobseeker') }}</span>

                                                        </a></li>

                                                </ul>
                                            </li>
                                        @endif

                                        @php $locale = session()->get('locale'); @endphp
                                        <li class="dropdown">
                                            <a>
                                                <span
                                                    class="flag-icon flag-icon-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }}"></span>
                                                {{ Config::get('languages')[App::getLocale()]['display'] }}
                                            </a>
                                            <ul>

                                                @foreach (Config::get('languages') as $lang => $language)
                                                    @if ($lang != App::getLocale())
                                                        <a class="dropdown-item"
                                                            href="{{ route('lang.switch', $lang) }}"><span
                                                                class="flag-icon flag-icon-{{ $language['flag-icon'] }}"></span>
                                                            {{ $language['display'] }}</a>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            <link rel="stylesheet"
                                                href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.2.0/css/flag-icons.min.css"
                                                integrity="sha512-uvXdJud8WaOlQFjlz9B15Yy2Au/bMAvz79F7Xa6OakCl2jvQPdHD0hb3dEqZRdSwG4/sknePXlE7GiarwA/9Wg=="
                                                crossorigin="anonymous" referrerpolicy="no-referrer" />
                                        </li>
                                        @auth
                                            @if (auth()->user()->type_users == 'prestataire')
                                                {{-- @dd(Auth()->user()) --}}
                                                <li
                                                    class="dropdown{{ Request::routeIs('prestataire/*') ? 'current_page' : '' }}">
                                                    <a href="#">{{ __('welcome.footer.jobseeker') }}</a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a
                                                                href="{{ route('prestataire.dashboard') }}">{{ __('welcome.menu.dashboard') }}</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ route('prestataire.applies.index') }}"> {{ __('welcome.form.myapp') }}</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ route('prestataire.contrat.pending') }}">{{ __('welcome.form.current') }}</a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="{{ route('prestataire.profile_setting') }}">{{ __('welcome.menu.profil') }}</a>
                                                        </li>

                                                        <li>
                                                            <a
                                                                href="{{ route('prestataire.change_password') }}">{{ __('welcome.footer.password') }}</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                                    class="fas fa-power-off"></i>
                                                                {{ __('messages.login.logout') }}</a>
                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @elseif(auth()->user()->type_users == 'client')
                                                <li
                                                    class="dropdown {{ Request::routeIs('client/*') ? 'current_page' : '' }}">
                                                    <a href="">{{ __('welcome.footer.customer') }}</a>
                                                    <ul>
                                                        <li><a
                                                                href="{{ route('client.dashboard') }}">{{ __('welcome.menu.dashboard') }}</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('client.offers.create') }}">{{ __('welcome.menu.announce') }}</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('client.offers.index') }}">{{ __('welcome.menu.myannounce') }}</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('client.contrat.pending') }}">{{ __('welcome.form.current') }}</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('client.contrat.facture') }}">{{ __('welcome.form.invoice') }}</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('client.contrat.archived') }}">{{ __('welcome.form.expired') }}</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('client.profile_setting') }}">{{ __('welcome.menu.profil') }}</a>
                                                        </li>
                                                        <li><a
                                                                href="{{ route('client.change_password') }}">{{ __('welcome.footer.password') }}</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                                    class="fas fa-power-off"></i>
                                                                {{ __('messages.login.logout') }}</a>
                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endif
                                        @endauth
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-lower-style1">
        <div class="container ">
            <style>
                .my-container {
                    padding-left: 25%;
                }

                .maright {
                    margin-left: 10%;
                }

            </style>
            <div class="row d-flex flex-row-reverse">
                <div class="col">
                    <div class="card ">
                        
                        <div class="card-body maright">
                            <form action="{{ route('search') }}" method="GET">
                                @php
                                    $secteurs = DB::table('secteur_activites')->get();
                                    $villes = DB::table('villes')->get();
                                    use Monarobase\CountryList\CountryListFacade;
                                    $countries = CountryListFacade::getList('en');
                                @endphp
                                <div class="row mr-4">
                                    <div class="col-3">
                                        <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect01">
                                                <option selected>{{ __('welcome.menu.area') }}</option>
                                                @foreach ($secteurs as $secteur)
                                                    <option value="{{ $secteur->id }}"
                                                        {{ old('secteur') == $secteur->id ? 'selected' : '' }}>
                                                        {{ $secteur->title_secteur }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                  
                                    <div class="col-3">
                                        <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect01">
                                                <option selected>{{ __('welcome.menu.country') }}</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                      <div class="col-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('welcome.menu.cities') }}"/>
                                          </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <button class="btn btn-danger"
                                                type="submit">{{ __('welcome.menu.search') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
