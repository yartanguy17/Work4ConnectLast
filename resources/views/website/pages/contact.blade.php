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

        <!--End breadcrumb area-->

        <!--Start login register area-->
        <section class="login-register-area">
            <div class="container my-container">
                <style>
                    .my-container{
                        padding-left: 5%;
                        padding-right: 5%;
                    }
                    .adresse{
                        margin-bottom: 20px;
                    }
                </style>
                <div class="row">
                    <div class="col-12 adresse">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center bg-danger">
                                <h5 class="text-light">Adresse</h5>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li><i class="fa fa-location-dot text-danger"></i>    Keas 69 Str. 15234, Chalandri
                                        Lomé, Togo</li>
                                    <li><i class="fa fa-phone text-danger"></i> +30-2106019311 (Fixe)</li>
                                    <li><i class="fa fa-phone text-danger"></i> +30-6977664062 (Mobile)</li>
                                    <li><i class="fa fa-envelope text-danger"></i> contact@work4connect.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">


                            <div class="col-md-12 card-body">
                                <div class=" contact_us">
                                    <div class="row ">

                                        <div class="col-md-12 ">
                                            <div class="only-form-box">
                                                @include('website.inc.messages')
                                                <form action="{{ route('postcontact') }}" method="POST">
                                                    @csrf
                                                    <div class="com_class_form">
                                                        <div class="input-group col-md-12 mb-4">
                                                            <input type="text" placeholder="Nom" class="form-control" name="name"/>
                                                            <div class="input-group-append">
                                                              <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="input-group col-md-12 mb-4">
                                                            <input type="text" placeholder="Prénom(s)" class="form-control" name="firstname"/>
                                                            <div class="input-group-append">
                                                              <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="input-group col-md-12 mb-4">
                                                            <input type="email" placeholder="Email" class="form-control" name="email"/>
                                                            <div class="input-group-append">
                                                              <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="input-group col-md-12 mb-4">
                                                            <input type="text" placeholder="Téléphone" class="form-control" name="phone_number"/>
                                                            <div class="input-group-append">
                                                              <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="input-group col-md-12 mb-4">
                                                            <input type="text" placeholder="Sujet" class="form-control" name="subject"/>
                                                            <div class="input-group-append">
                                                              <span class="input-group-text"><i class="fa fa-message"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="input-group col-md-12 mb-4">
                                                            <textarea type="text" placeholder="Message" class="form-control" name="message"></textarea>

                                                        </div>
                                                        <div class="col-md-12 d-flex justify-content-center">
                                                            <div class="input-field row">
                                                                {!! app('captcha')->display() !!}
                                                                @if ($errors->has('g-recaptcha-response'))
                                                                    <span class="help-block text-danger">
                                                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-center mt-4">
                                                            <div class="row">
                                                                <div class="col-lg-5 col-md-5 col-sm-12">
                                                                    <button class="btn-danger btn" type="submit">Envoyer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br/>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
