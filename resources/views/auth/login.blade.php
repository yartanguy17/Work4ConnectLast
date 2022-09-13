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
                @include('website.inc.messages')
                <div class="card justify-content-center d-flex">
                    <div class="shop-page-title card-header">
                        <div class="title text-center">{{ __('messages.login.sign') }}</div>
                    </div>
                    <div class="row card-body">
                        <div class="form">
                            <div class="row container">
                                <form method="POST" action="{{ route('login') }}">

                                    @csrf

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control"
                                            placeholder="{{ __('messages.login.email') }}" aria-label="Username"
                                            aria-describedby="basic-addon1" name="email">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="password"
                                            placeholder="{{ __('messages.login.password') }}" id="show_hide_password"
                                            name="password" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-eye-slash"
                                                    onclick="showing(this)"></i> </span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <input name="remember" type="checkbox">
                                            <span>{{ __('messages.login.remember') }}</span>
                                        </div>
                                        <a href="{{ route('password.request') }}" class="danger">{{ __('messages.login.forgot') }}</a>
                                        <style>
                                            .danger:hover {
                                                color: red;
                                            }

                                            .danger {
                                                text-decoration: none;
                                            }

                                        </style>
                                        <script>
                                            var elt = document.getElementById('show_hide_password')

                                            function showing(icon) {
                                                if (elt.type === "password") {
                                                    elt.type = "text";
                                                    icon.classList.remove("fa-eye-slash");
                                                    icon.classList.add("fa-eye");

                                                } else {
                                                    elt.type = "password";
                                                    icon.classList.remove("fa-eye");
                                                    icon.classList.add("fa-eye-slash");
                                                }
                                            }
                                        </script>
                                    </div>
                                    <br />

                                    <div>

                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="row">
                                            <button type="submit" class="btn btn-danger"
                                                    type="submit">{{ __('messages.login.sign') }}</button>
                                        </div>
                                    </div>
                                </form>
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
