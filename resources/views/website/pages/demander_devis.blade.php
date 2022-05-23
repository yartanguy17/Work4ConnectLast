<!DOCTYPE html>
<html lang="en">


<!-- account 07:01:11 GMT -->
@include('website.partials.header')

<body>
    <div class="boxed_wrapper">

        <div class="preloader"></div>

        @include('website.partials.menu')
        <!--End Main Header-->

        <!--Start breadcrumb area-->
        <section class="breadcrumb-area style2" style="background-image: url({{ asset('assets/front/images/resources/breadcrumb-bg-2.jpg') }});">
            <div class="container">
                <div class="row">
                    <H2 style="text-align:center;font-size:100px;color:#FFF">DEMANDER DEVIS</H2>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->

        <!--Start login register area-->
        <section class="login-register-area">
            <div class="container">
                <div class="row">

                <main>
        <div class="only-form-pages">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="only-form-box-2">
                            @include('website.inc.messages')
                            <form method="POST" action="{{ route('post_demander_devis') }}">
                                @csrf

                                <div class="welcome-text text-center mb-5">
                                    <h5 class="mb-0">Vos coordonnées</h5>
                                </div>
                                <div class="row form-row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Secteur d'activité</label>
                                            <select class="form-control select" name="secteur_activite_id" required>
                                                <option value="">--Selectionner secteur d'activité--</option>
                                                @foreach ($secteurs as $secteur)
                                                    <option value="{{ $secteur->id }}"
                                                        {{ old('secteur_activite_id') == $secteur->id ? 'selected' : '' }}>
                                                        {{ $secteur->title_secteur }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6" id="gender_section">
                                        <div class="form-group">
                                            <label>Civilité <span class="text-danger">*</span></label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="inlineRadio1" value="M" checked>
                                                <label class="form-check-label" for="inlineRadio1">Mr</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="inlineRadio2" value="F">
                                                <label class="form-check-label" for="inlineRadio2">Mme</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="inlineRadio2" value="L">
                                                <label class="form-check-label" for="inlineRadio2">Mlle</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Nom <span class="text-danger">*</span></label>
                                            <input class="form-control" name="last_name" id="last_name" value=""
                                                required autofocus type="text" size="40" placeholder="Nom *">

                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6" id="firstname_section">
                                        <div class="form-group">
                                            <label>Prénom(s)</label>
                                            <input class="form-control" name="first_name" id="first_name" value=""
                                                type="text" size="40" placeholder="Prénom(s) ">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Adresse e-mail <span class="text-danger">*</span></label>
                                            <input class="form-control" id="email" name="email" value="" size="40"
                                                placeholder="Email *">
                                        </div>
                                    </div>
                                </div>

                                <div class="welcome-text text-center mb-5">
                                    <h5 class="mb-0">Nous vous rappellerons</h5>
                                </div>

                                <div class="form-group user_type_cont">
                                    <label class="user_type" for="usertype-1">
                                        <input type="radio" checked name="type_id" id="usertype-1" value="1">
                                        <span><i class="far fa-check"></i> Immédiatement</span>
                                    </label>
                                    <label class="user_type" for="usertype-2">
                                        <input type="radio" name="type_id" id="usertype-2" value="2">
                                        <span><i class="fas fa-clock"></i> Sur le créneau de votre choix</span>
                                    </label>
                                </div>

                                <div class="row form-row">

                                    <div class="col-12 col-sm-6" id="date_section" style="display: none;">
                                        <div class="form-group">
                                            <label>Date <span class="text-danger">*</span></label>
                                            <input class="form-control" name="date" id="date"
                                                onchange="setCorrect(this,'date');" value="" type="date" size="40">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6" id="plage_horaire_section" style="display: none;">
                                        <div class="form-group">
                                            <label>Plage horaire<span class="text-danger">*</span></label>
                                            <select class="form-control select" name="range" id="plage_horaire">
                                                <option value="">--Sélectionner plage horaire--</option>
                                                <option value="8h-9h">8h-9h</option>
                                                <option value="9h-10h">9h-10h</option>
                                                <option value="10h-11h">10h-11h</option>
                                                <option value="11h-12h">11h-12h</option>
                                                <option value="12h-13h">12h-13h</option>
                                                <option value="13h-14h">13h-14h</option>
                                                <option value="14h-15h">14h-15h</option>
                                                <option value="15h-16h">15h-16h</option>
                                                <option value="16h-17h">16h-17h</option>
                                                <option value="17h-18h">17h-18h</option>
                                                <option value="18h-19h">18h-19h</option>
                                                <option value="19h-20h">19h-20h</option>
                                                <option value="20h-21h">20h-21h</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Téléphone <span class="text-danger">*</span></label>
                                            <input id="output" type="hidden" name="phone_number" value="" />
                                            <input type="tel" id="phone" name="" class="form-control" value=""
                                                required size="40">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Adresse/Quartier/Localisation <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                value="" required size="40" placeholder="Adresse/Quartier/Localisation">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        {!! app('captcha')->display() !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block text-danger">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Valider">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

                </div>
            </div>
        </section>
        <!--End login register area-->

        <!--Start footer area Style4-->
        @include('website.partials.footer')

    </div>

    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

    @include('website.partials.js')



</body>


<!-- account 07:01:11 GMT -->
</html>
