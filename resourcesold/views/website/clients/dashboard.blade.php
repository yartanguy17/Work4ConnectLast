<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Work4connect</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    @include('website.partials.header')

    <!-- Bootstrap core CSS -->

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>
<body class="bg-light">
    <style>
        .container-small{
            padding-left: 10%;
            padding-right: 10%;
            margin-bottom: 50px;
        }
        .mleft{
            margin-right: 35px;
        }
    </style>
    @include('website.clients.partials.header')
    <div class="container-small">
        <div class="row ">
            <div class="col-lg-3 mleft">

                    <ul class="list-group">

                        <li class="list-group-item text-center"><a href="{{ route('home') }}"
                            class="non-underlined active">
                            {{ __('welcome.menu.home') }}</a></li>
                        <li class="list-group-item text-center"><a href="{{ route('faq') }}"
                            class="non-underlined ">{{ __('welcome.menu.faqs') }}</a></li>
                        <li class="list-group-item text-center"><a href="{{ route('blog') }}"
                            class="non-underlined">{{ __('welcome.menu.blog') }}</a></li>
                        <li class="list-group-item text-center"><a href="{{ route('contact') }}"
                            class="non-underlined">{{ __('welcome.menu.contact') }}</a></li>
                        <li class="list-group-item text-center data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
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
                                                    href="{{ route('prestataire.contrat.pending') }}">{{ __('welcome.menu.contrats') }}</a>
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
                        </li>
                        <div class="collapse" id="collapseExample">
                            
                        </div>
                      </ul>

            </div>
            <div class="card col-lg-8">
                <div class="container-fluid d-flex align-items-center">

                    <main class="col-lg-12">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">{{ __('welcome.menu.dashboard') }}</h1>
                        </div>
                        <div class="row clearfix row-deck" style="margin-bottom: 25px;">
                            <div class="col-4">
                                <a class="card" href="{{ route('client.offers.index') }}">
                                    <div class="card-header bg-primary op">
                                        <h5 class="card-title d-flex justify-content-center text-light">{{ __('welcome.form.myadd') }}</h5>
                                    </div>
                                    <div class="card-body d-flex justify-content-center">
                                        <h5 class="number mb-0 font-32 counter">{{ $offers }}</h5>

                                    </div>
                                </a>
                            </div>
                            <div class="col-4">
                                <a class="card" href="{{ route('client.contrat.pending') }}">
                                    <div class="card-header bg-success op">
                                        <h5 class="card-title d-flex justify-content-center text-light">{{ __('welcome.form.currentcont') }}</h5>
                                    </div>
                                    <div class="card-body d-flex justify-content-center">
                                        <h5 class="number mb-0 font-32 counter">{{$contrats }}</h5>

                                    </div>
                                </a>
                            </div>
                            <style>
                                a {
                                    text-decoration: none;
                                }

                            </style>
                            <div class="col-4">
                                <a class="card" href="{{ route('client.contrat.archived') }}">
                                    <div class="card-header bg-warning op">
                                        <style>
                                            .op {
                                                opacity: 0.6;
                                            }

                                        </style>
                                        <h5 class="card-title text-center text-light">{{ __('welcome.form.expiredcontr') }}</h5>
                                    </div>
                                    <div class="card-body d-flex justify-content-center">
                                        <h5 class="number mb-0 font-32 counter">{{ $nbreExpire }}</h5>

                                    </div>
                                </a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </main>
                </div>
            </div>
        </div>

    </div>

    @include('website.clients.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>
</html>
