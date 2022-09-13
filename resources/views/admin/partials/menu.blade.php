<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>{{ __('messages.menu.dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" class=" waves-effect">
                        <i class="ti-arrow-left"></i>
                        <span>{{ __('messages.menu.backweb') }}</span>
                    </a>
                </li>
                @can('Lister prestataires')
                    <li>
                        <a href="{{ route('admin.prestataires.index') }}" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span> {{ __('messages.menu.jobseeker') }} </span>
                        </a>
                    </li>
                @endcan
                @can('Lister clients')
                    <li>
                        <a href="{{ route('admin.clients.index') }}" class="waves-effect">
                            <i class="fas fa-users"></i>
                            <span> {{ __('messages.menu.clients') }} </span>
                        </a>
                    </li>
                @endcan
                @can('Lister reservations')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-book"></i>
                            <span>{{ __('messages.menu.res') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.reservations.index') }}">{{ __('messages.menu.pending') }}</a>
                            </li>
                            <li><a
                                    href="{{ route('admin.reservation.archived') }}">{{ __('messages.menu.archived') }}</a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('Lister candidatures')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-book"></i>
                            <span>{{ __('messages.menu.jobappl') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.applies.index') }}">{{ __('messages.menu.pending') }}</a>
                            </li>
                            <li><a href="{{ route('admin.apply.archived') }}">{{ __('messages.menu.processed') }}</a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('Lister annonces')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-book"></i>
                            <span>{{ __('messages.menu.announce') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.offer.pending') }}">{{ __('messages.menu.pending') }}</a>
                            </li>
                            <li><a href="{{ route('admin.offers.index') }}">{{ __('messages.menu.activated') }}</a>
                            </li>
                            <li><a href="{{ route('admin.offer.archived') }}">{{ __('messages.menu.archived') }}</a>
                            </li>
                            <li><a href="{{ route('admin.offers.create') }}">{{ __('messages.menu.new') }}</a></li>
                        </ul>
                    </li>
                @endcan
                @can('Lister contrats')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-book"></i>
                            <span>{{ __('messages.menu.emp') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.contrats.index') }}">{{ __('messages.menu.progress') }}</a>
                            </li>
                            <li><a href="{{ route('admin.contrat.archived') }}">{{ __('messages.menu.archived') }}</a>
                            </li>
                            <li><a href="{{ route('admin.contrats.create') }}">{{ __('messages.menu.new') }}</a></li>
                        </ul>
                    </li>
                @endcan
                @canany([
                    'Lister types contrats',
                    'Lister types formations',
                    'Lister types
                    emplois',
                    ])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-graduation-cap"></i>
                            <span>{{ __('messages.menu.settings') }} </span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.typecontrats.index') }}">{{ __('messages.menu.typeofcontract') }}
                                </a></li>
                            <li><a href="{{ route('admin.jobtypes.index') }}">{{ __('messages.menu.typeofjob') }}</a>
                            </li>
                        </ul>
                    </li>
                @endcanany
                @can('Lister villes')
                    <li>
                        <a href="{{ route('admin.villes.index') }}" class="waves-effect">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ __('messages.menu.city') }} </span>
                        </a>
                    </li>
                @endcan
                @can('Lister regions')
                    <li>
                        <a href="{{ route('admin.regions.index') }}" class="waves-effect">
                            <i class="fas fa-globe"></i>
                            <span>{{ __('messages.menu.region') }}</span>
                        </a>
                    </li>
                @endcan
                @can('Lister secteurs')
                    <li>
                        <a href="{{ route('admin.secteurs.index') }}" class="waves-effect">
                            <i class="ti-bookmark-alt"></i>
                            <span>{{ __('messages.menu.area') }}</span>
                        </a>
                    </li>
                @endcan
                @can('Lister categories FAQ')
                    <li>
                        <a href="{{ route('admin.faqcategories.index') }}" class="waves-effect">
                            <i class="ti-bookmark-alt"></i>
                            <span>{{ __('messages.menu.faqscateg') }}</span>
                        </a>
                    </li>
                @endcan
                @can('Lister FAQs')
                    <li>
                        <a href="{{ route('admin.faqs.index') }}" class="waves-effect">
                            <i class="ion ion-md-help"></i>
                            <span>{{ __('messages.menu.faqs') }}</span>
                        </a>
                    </li>
                @endcan
                @can('Lister categories')
                    <li>
                        <a href="{{ route('admin.categories.index') }}" class="waves-effect">
                            <i class="ti-bookmark-alt"></i>
                            <span>{{ __('messages.menu.category') }}</span>
                        </a>
                    </li>
                @endcan
                @can('Lister posts')
                    <li>
                        <a href="{{ route('admin.posts.index') }}" class="waves-effect">
                            <i class="ti-receipt"></i>
                            <span>{{ __('messages.menu.posts') }}</span>
                        </a>
                    </li>
                @endcan
             
                @can('Lister rappels')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-phone"></i>
                            <span>{{ __('messages.menu.becalled') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.rappels.index') }}">{{ __('messages.menu.pending') }}</a>
                            </li>
                            <li><a href="{{ route('admin.rappel.archived') }}">{{ __('messages.menu.archived') }}</a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('Annonce historique')
                    <li>
                        <a href="{{ route('admin.offreHistoriques.index') }}" class="has-effect">
                            <i class="ti-bookmark-alt"></i>
                            <span>{{ __('messages.menu.adhistory') }}</span>
                        </a>
                    </li>
                @endcan
                @can('Comptable')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-book"></i>
                            <span>{{ __('messages.menu.accountabilty') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('afficher') }}"> {{ __('messages.menu.nonpaid') }}</a></li>
                            <li><a href="{{ route('affichers') }}"> {{ __('messages.menu.paidbills') }} </a></li>

                        </ul>
                    </li>
                @endcan
                @canany(['Lister permissions', 'Lister roles', 'Lister utilisateurs'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-book"></i>
                            <span>{{ __('messages.menu.administration') }}</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a
                                    href="{{ route('admin.permissions.index') }}">{{ __('messages.menu.permissions') }}</a>
                            </li>
                            <li><a href="{{ route('admin.roles.index') }}">{{ __('messages.menu.roles') }}</a></li>
                            <li><a href="{{ route('admin.admins.index') }}">{{ __('messages.menu.user') }}</a></li>
                            <li><a href="{{ route('admin.historiques.index') }}">{{ __('messages.menu.history') }}</a>
                            </li>
                            <li><a href="{{ url('admin/nombre-jours-offer') }}">{{ __('messages.menu.datepost') }}</a>
                            </li>
                        </ul>
                    </li>
                @endcanany
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
