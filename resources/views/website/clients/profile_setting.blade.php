.<!doctype html>
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
            padding-left: 20%;
            padding-right: 20%;
            margin-bottom: 50px;
        }

    </style>
    @include('website.clients.partials.header')
    <div class="container-small">
          <div class="row">
              @include("website.partials.routes")
              <div class="card col-lg-8">
            <div class="container-fluid d-flex align-items-center">
                <main class="col-lg-12">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">{{ __('welcome.menu.profil') }}</h1>
                    </div>
                    <div class="job_container">
                        <div>
                            <div class="row job_main">
                                <!---Side menu  -->

                                <!---/ Side menu -->
                                <div class=" job_main_right">
                                    <div class="row job_section">
                                        <div class="col-sm-12">
                                            <div class="jm_headings">
                                                <h5>{{ __('welcome.menu.profil') }}</h5>
                                            </div>
                                            <div class="section-divider">
                                            </div>
                                            @include('website.inc.messages')
                                            <form method="POST" action="{{ route('client.post_setting') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="big_form_group">
                                                     @php
                                            use Monarobase\CountryList\CountryListFacade;
                                            $countries = CountryListFacade::getList('en');
                                             
                                        @endphp
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.names') }} <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="last_name"
                                                                    name="last_name" placeholder=""
                                                                    value="{{ $client->last_name }}" required>
                                                            </div>
                                                        </div>
                                                        @if ($client->personne_type == 'particulier')
                                                            <div class="col-md-6">
                                                                <div class="form-group ">
                                                                    <label>{{ __('welcome.form.firstname') }} <span class="text-danger">*</span> </label>
                                                                    <input type="text" class="form-control"
                                                                        id="first_name" name="first_name" placeholder=""
                                                                        value="{{ $client->first_name }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($client->personne_type == 'entreprise')
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>{{ __('welcome.form.director') }}
                                                                            <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        name="contact_name" id="contact_name"
                                                                        value="{{ $client->contact_name }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($client->personne_type == 'entreprise')
                                                            <div class="col-12 col-sm-6" id="nif_section">
                                                                <div class="form-group">
                                                                    <label>{{ __('welcome.form.rc') }} <span class="text-danger">*</span></label>
                                                                    <input class="form-control" id="nif" name="nif"
                                                                        value="{{ $client->nif }}" type="number">
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($client->personne_type == 'particulier')
                                                            <div class="col-12 col-sm-6" id="gender_section">
                                                                <div class="form-group">
                                                                    <label>{{ __('welcome.form.civility') }} 
                                                                    <span class="text-danger">*</span></label>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="inlineRadio1" value="M"
                                                                            {{ $client->gender == 'M' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio1">{{ __('welcome.form.mr') }}</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="inlineRadio2" value="F"
                                                                            {{ $client->gender == 'F' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2">{{ __('welcome.form.mrs') }}</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="inlineRadio3" value="L"
                                                                            {{ $client->gender == 'L' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio3">{{ __('welcome.form.miss') }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.email') }} <span class="text-danger">*</span> </label>
                                                                <input type="email" class="form-control" placeholder=""
                                                                    name="email" value="{{ $client->email }}"
                                                                    readonly>
                                                            </div>
                                                        </div>

                                                       
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>{{ __('welcome.form.city') }}<span class="text-danger">*</span> </label>
                                                                        
            
                                                                <input type="text"  name="city" class="form-control"
                                                                    value="{{ $client->city }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Office adress <span class="text-danger">*</span> </label>
                                                                        
            
                                                                <input type="text"  name="address" class="form-control" value="{{ $client->address }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Type of activity <span class="text-danger">*</span> </label>
                                                                        
            
                                                                <input type="text"  name="activity" class="form-control" value="{{ $client->activity }}">
                                                            </div>
                                                        </div>
                                                        
                                                         <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Main market <span class="text-danger">*</span> </label>
                                                                        
            
                                                                <input type="text"  name="market" class="form-control" value="{{ $client->market }}">
                                                            </div>
                                                        </div>
                                                        
                                                          <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>Tax ID <span class="text-danger">*</span> </label>
                                                                        
            
                                                                <input type="text"  name="tax_id" class="form-control" value="{{ $client->tax_id_in_country }}">
                                                            </div>
                                                        </div>
                                                        
                                                          <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label>URL Company <span class="text-danger">*</span> </label>
                        
                                                                <input type="text"  name="url_comp" class="form-control" value="{{ $client->url_comp }}">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            
                                                
                                                <div class="col-md-12 mb-4">
                                        <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect01" name="country" required>
                                                <option selected>{{ __('welcome.menu.country') }} <span class="text-danger">*</span> </option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country }}" @if ($country == $client->country) selected='selected' @endif> {{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                                <div class="big_form_group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="change-avatar">
                                                                    <div class="profile-img">
                                                                        @if ($client->profile_picture == null)
                                                                            <img src="{{ asset('images/avatar.jpg') }}"
                                                                                alt="" id="blah">
                                                                        @else
                                                                            <img src="{{ asset('public/profil/' . $client->profile_picture) }}"
                                                                                alt="" id="blah">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.logo') }} (pdf / jpg / jpeg / png) <span class="text-danger">*</span> </label>
                                                                <input type="file" class="form-control" placeholder="" value="{{ old('profile_picture') }}" name="profile_picture" min="0" oninput="validity.valid||(value='');">
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.biogr') }} <span class="text-danger">*</span>  </label>
                                                                <textarea class="form-control" name="biography">{{ $client->biography }} </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-9 ">
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ __('welcome.form.add') }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </main>
            </div>
        </div>
          </div>
        
    </div>
    @include('website.partials.footer')


    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
</body>

</html>
 