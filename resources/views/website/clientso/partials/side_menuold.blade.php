<div class="sidebar">
    <ul class="user_navigation">
        <li class="{{ Request::routeIs('client.dashboard') ? 'is-active' : '' }}">
            <a href="{{ route('client.dashboard') }}">
                <i class="fas fa-border-all"></i> Mon Tableau de bord </a>
        </li>
    </ul>
    <h5>Organisation</h5>
    <ul class="user_navigation">
        <li>
            <a href="{{ route('client.offers.create') }}"><i class="fas fa-paper-plane"></i> Faire une annonce </a>
        </li>

        <li>
            <a href="{{ route('client.offers.index') }}"><i class="fas fa-border-all"></i> Mes annonces</a>
        </li>


        <li>
            <a href="{{ route('client.contrat.pending') }}"><i class="fas fa-star"></i> Mes contrats en cours</a>
        </li>

        <li>
            <a href="{{ route('client.contrat.facture') }}"><i class="fas fa-star"></i> Mes factures</a>
        </li>

        <li>
            <a href="{{ route('client.contrat.archived') }}"><i class="fas fa-star"></i> Mes contrats expirés</a>
        </li>

        <li>
            <a href="{{ route('client.signalerabsences.create') }}"><i class="fas fa-star"></i>
                Signaler une absence
            </a>
        </li>
        <li>
            <a href="{{ route('client.signalerabsences.index') }}"><i class="fas fa-star"></i>
                Absences
            </a>
        </li>

        <li>
            <a href="{{ route('client.absences.index') }}"><i class="fas fa-star"></i>
                Les demande absence prestataires
            </a>
        </li>
        <li>
            <a href="{{ route('demande.list') }}"><i class="fas fa-star"></i>
                Valider une demande d'absence
            </a>
        </li>
        <li>
            <a href="{{ route('demande.conge.list') }}"><i class="fas fa-star"></i>
                Valider une demande de congés
            </a>
        </li>
        <li>
            <a href="{{ route('demande.list') }}"><i class="fas fa-star"></i>
                Valider une demande de formation
            </a>
        </li>
    </ul>
    <h5>Mon compte</h5>
    <ul class="user_navigation">
        <li>

            <button type="button" class="btn btn-primary" style="margin-left:10%;">
                <i class="fas fa-bell"></i> <span class="badge badge-light">0</span>
            </button>
        </li>

        @auth
        @if (auth()->user()->cni_num == null || auth()->user()->passport_num == null)
        <li class="{{ Request::routeIs('client.profile_setting') ? 'is-active' : '' }}">
            <a href="{{ route('client.profile_setting') }}" style="color: #e9212e"><i class="fas fa-user"></i>Profil client</a>
        </li>

        @else

        <li class="{{ Request::routeIs('client.profile_setting') ? 'is-active' : '' }}">
            <a href="{{ route('client.profile_setting') }}"><i class="fas fa-user"></i>Profil client</a>
        </li>
        @endif
    @endauth
        <li class="{{ Request::routeIs('client.change_password') ? 'is-active' : '' }}">
            <a href="{{ route('client.change_password') }}"><i class="fas fa-key"></i>Changer mot de passe</a>
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
