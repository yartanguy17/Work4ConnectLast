<!doctype html>
<html lang="fr">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>Réinitiaiser mot de passe |Work4connect</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/front/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/front/images/favicon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('assets/front/images/favicon/favicon-16x16.png') }}" sizes="16x16">

    <!-- CSS
================================================== -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&amp;display=swap&amp;subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/website/css/all.min.css') }}">
    <link href="{{ asset('assets/website/css/aos.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/website/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/website/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/color-1.css') }}">
</head>

<body>

    <!-- Header 01
================================================== -->
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->

 <section class="breadcrumb-area style2" style="background-image: url({{ asset('assets/front/images/services/44.jpg') }});">
            <div class="container">
                <div class="row">
                    <H2 style="text-align:center;font-size:100px;color:#FFF">Reset password</H2>
                </div>
            </div>
        </section>
            <div class="header_btm">
                <h2 style="text-align:center">Reset password</h2>
            </div>
        </div>
    </header>
    <!-- Main
================================================== -->
    <main>
        <div class="only-form-pages">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="only-form-box">

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

 <div class="row card-body">
     
     <div class=" container container-small">
          <div class="card justify-content-center d-flex">
              <div class="shop-page-title card-header">
                        
                    </div>
                     <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="com_class_form">
                                    <div class="form-group">
                                        

                                            
                                             <div class="input-group mb-4">
                                        <input type="email" class="form-control"
                                            placeholder="{{ __('messages.login.email') }}" aria-label="email"
                                            aria-describedby="basic-addon1" name="email">
                                    </div>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group" style="text-align:center">
                                        <input class="btn btn-danger" type="submit"
                                            value="Send reset link">
                                    </div>
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
    </main>

    <!-- Footer Container
================================================== -->

    @include('website.partials.footer')

    <!-- End Footer Container
================================================== -->

    <!-- Scripts
================================================== -->
    <script src="{{ asset('assets/website/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/aos.js') }}"></script>
    <script src="{{ asset('assets/website/js/custom.js') }}"></script>
</body>

</html>
