<!DOCTYPE html>
<html lang="en">


<!-- account 07:01:11 GMT -->
@include('website.partials.header')

<body>

    <div class="boxed_wrapper">

        <div class="preloader"></div>

        @include('website.partials.menu')
        <!--End Main Header-->

        <style>
            @media screen and (min-device-width: 920px) {
                .container-small{
                    width: 50%;
                }
            }

        </style>
        <!--Start login register area-->
        <section class="login-register-area">
            <div class="container container-small">
                <div class="row card">
                    <div class="shop-page-title card-header d-flex justify-content-center">
                        <div class="title"><span>{{ __('welcome.menu.jobseeker') }}</span></div>
                    </div>
                    <div class="card-body">
                        <div class="form register">
                            @include('website.inc.messages')

                            <div class="row">

                                <form method="POST" action="{{ route('register_prestataire_save') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-md-12">
                                         @php
                                            use Monarobase\CountryList\CountryListFacade;
                                            $countries = CountryListFacade::getList('en');
                                             $secteurs = DB::table('secteur_activites')->get();
                                        @endphp
                                        <div class="input-field">
                                            <label class="user_type" for="usertype-1">
                                                <input type="radio" checked name="personne_type" id="usertype-1"
                                                    value="particulier"
                                                    {{ old('personne_type') == 'particulier' ? 'checked' : '' }}>
                                                <span><i class="far fa-user"></i>
                                                    {{ __('messages.form.indiviual') }}</span>
                                            </label>
                                            <label class="user_type" for="usertype-2">
                                                <input type="radio" name="personne_type" id="usertype-2"
                                                    value="entreprise"
                                                    {{ old('personne_type') == 'entreprise' ? 'checked' : '' }}>
                                                <span><i class="fas fa-landmark"></i>
                                                    {{ __('messages.form.company') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                     
                                    <div class="input-group col-md-12 mb-4">
                                       
                                        <input type="text" placeholder="{{ __('messages.form.names') }}"
                                            class="form-control" name="first_name" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                    </div>
                                    <p id="message" style="font-style: italic; font-size: 12px; color:red;"></p>
                                     <div class="col-md-12 mb-4">
                                        <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect01" name="country" required>
                                                <option selected>{{ __('welcome.menu.country') }}</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-12 mb-4">
                                        <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect01" name="secteur_activite_id" required>
                                                <option selected>{{ __('welcome.form.selectArea') }}</option>
                                                @foreach ($secteurs as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->title_secteur }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                                    
                                                        
                                                        
                                    <div class="input-group col-md-12 mb-4">
                                       
                                        <input type="email" placeholder="{{ __('messages.login.email') }}"
                                            class="form-control" name="email" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                        </div>
                                    </div>
                                    
                                    


                                    <div class="input-group col-md-12 mb-4">
                                       
                                        <input type="password" placeholder="{{ __('messages.login.password') }}"
                                            class="form-control" name="password" id="passwordE"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                                        </div>
                                        <div class="input-group ">
                                            <small class="text-danger" id="msg"></small>
                                            <small class="text-success" id="msg3"></small>
                                        </div>
                                    </div>

                                    <div class="input-group col-md-12 mb-4">
                                        
                                        <input type="password" placeholder="{{ __('messages.form.passwordconfir') }}"
                                            class="form-control" name="password_confirmation"id="password_confirmation"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                                        </div>
                                        <div class="input-group ">
                                            <small class="text-danger" id="msg2"></small>
                                            <small class="text-success" id="msg4"></small>
                                        </div>
                                    </div>
                                   
                                    <div class="input-group col-md-12 mb-4">
                                        
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox"
                                                onchange="checkValidate(this)" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                {{ __('welcome.form.termes') }} <a href="{{ route('terms') }}"
                                                    target="_blank">
                                                    {{ __('welcome.form.termes1') }}</a>
                                                {{ __('welcome.form.termes2') }}
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="input-group col-md-12 mb-4">
                                        
                                        <div class="d-flex justify-content-start">
                                            <div class="input-field row">
                                                {!! app('captcha')->display() !!}
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <span class="help-block text-danger">
                                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5 col-sm-12">
                                                <button class="btn-danger btn" id="insc_btn" type="submit"
                                                    disabled="true">{{ __('welcome.menu.register') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            msg = document.getElementById("msg");
            msg2 = document.getElementById("msg2");
            msg3 = document.getElementById("msg3");

            pwd = document.getElementById("passwordE");
            pwd_confirm = document.getElementById("password_confirmation")
            pwd.addEventListener("input", ()=>{
                console.log(pwd.value)
                if(pwd.value.length > 6){
                    msg3.innerHTML = "{{ __('welcome.menu.good') }}";
                    msg.innerHTML = ""

                } else {
                    msg.innerHTML = "{{ __('welcome.menu.text1') }}"
                    msg3.innerHTML = ""
                }
                // else if(pwd_confirm != pwd) {
                //     msg2.innerHTML = "Les deux mots de passe ne se correspondent pas."
                // }

            })

            pwd_confirm.addEventListener("input", ()=>{
                if(pwd_confirm.value === pwd.value){
                    msg4.innerHTML = "{{ __('welcome.menu.text2') }}";
                    msg2.innerHTML = "";
                } else {
                    msg2.innerHTML = "{{ __('welcome.menu.text3') }}";
                    msg4.innerHTML = "";

                }
            })

            var insc_btn = document.getElementById("insc_btn")

            function checkValidate(checkbox) {
                if (checkbox.checked && pwd_confirm.value === pwd.value) {
                    document.getElementById("insc_btn").disabled = false;
                } else {
                    document.getElementById("insc_btn").disabled = true;
                }
            }
        </script>
        <!--End login register area-->

        <!--Start footer area Style4-->
        @include('website.partials.footer')

    </div>

    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

    @include('website.partials.js')


</body>
<!-- account 07:01:11 GMT -->

</html>
