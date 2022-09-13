<div class="sidebar">
    <ul class="user_navigation">
        <li class="{{ Request::routeIs('prestataire.dashboard') ? 'is-active' : '' }}">
            <a href="{{ route('prestataire.dashboard') }}">
                <i class="fas fa-border-all"></i> Mon Tableau de bord
            </a>
        </li>
    </ul>
    <h5>Organisation</h5>
    <ul class="user_navigation">
        <li>
            <a href="{{ route('prestataire.applies.index') }}"><i class="fas fa-star"></i> Mes candidatures
                postes</a>
        </li>

        <li>
            <a href="{{ route('prestataire.contrat.pending') }}"><i class="fas fa-star"></i> Mes contrats en
                cours</a>
        </li>

        <li>
            <a href="{{ route('prestataire.contrat.archived') }}"><i class="fas fa-star"></i> Mes contrats
                expirés</a>
        </li>

        <li>
            <a href="{{ route('prestataire.demandeformations.create') }}"><i class="fas fa-paper-plane"></i> Faire
                une
                demande de formation </a>
        </li>

        <li>
            <a href="{{ route('prestataire.demandeformations.index') }}"><i class="fas fa-star"></i> Mes demandes
                de
                formation en attente</a>
        </li>

        <li>
            <a href="{{ route('prestataire.formation.pending') }}"><i class="fas fa-star"></i> Mes formations à
                venir</a>
        </li>

        <li>
            <a href="{{ route('prestataire.formation.beginning') }}"><i class="fas fa-star"></i> Mes formations en cours
            </a>
        </li>
        <li>
            <a href="{{ route('prestataire.formation.archived') }}"><i class="fas fa-star"></i> Mes formations
                suivies</a>
        </li>

        <li>
            <a href="{{ route('prestataire.demandeabsences.create') }}"><i class="fas fa-star"></i> Demandes
                d'absences</a>
        </li>

        <li>
            <a href="{{ route('prestataire.demandeabsences.index') }}"><i class="fas fa-star"></i> Absences</a>
        </li>

        <li>
            <a href="{{ route('prestataire.demandeconges.create') }}"><i class="fas fa-star"></i> Demandes de
                congés</a>
        </li>

        <li>
            <a href="{{ route('prestataire.demandeconges.index') }}"><i class="fas fa-star"></i> Congés</a>
        </li>
    </ul>
    <h5>Mon compte</h5>
    <ul class="user_navigation">
        @auth
            @if (auth()->user()->cni_num == null || auth()->user()->passport_num == null)

                <li class="{{ Request::routeIs('prestataire.profile_setting') ? 'is-active' : '' }}">
                    <a href="{{ route('prestataire.profile_setting') }}" style="color: #FF6600"><i
                            class="fas fa-user"></i>Profil prestataire</a>
                </li>

            @else

                <li class="{{ Request::routeIs('prestataire.profile_setting') ? 'is-active' : '' }}">
                    <a href="{{ route('prestataire.profile_setting') }}"><i class="fas fa-user"></i>Profil
                        prestataire</a>
                </li>
            @endif
        @endauth

        <li class="{{ Request::routeIs('prestataire.change_password') ? 'is-active' : '' }}">
            <a href="{{ route('prestataire.change_password') }}"><i class="fas fa-key"></i>Changer mot de
                passe</a>
        </li>
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off"></i> Déconnexion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
