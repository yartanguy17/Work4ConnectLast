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
            padding-left: 20%;
            padding-right: 20%;
            margin-bottom: 50px;
        }

    </style>
    @include('website.clients.partials.header')
    <div class="container-small">
        <div class="card">
            <div class="container-fluid d-flex align-items-center">
                <main class="col-lg-12">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">{{ __('welcome.menu.announce') }}</h1>
                    </div>
                    <div>
                        <div class="row job_main">
                            <!---/ Side menu -->
                            <div class=" job_main_right">
                                <div class="row job_section">
                                    <div class="col-sm-12">

                                        <div class="section-divider">
                                        </div>
                                        @include('website.inc.messages')
                                        <form action="{{ route('client.offers.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="big_form_group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label> {{ __('welcome.form.title') }} <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                value="{{ old('title_offer') }}" name="title_offer">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label
                                                                class="form-label">{{ __('welcome.form.typeofcontract') }}<span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-control select" name="type_contrat_id">
                                                                <option value="">
                                                                    {{ __('welcome.form.selectContact') }}
                                                                </option>
                                                                @foreach ($typecontrats as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ old('type_contrat_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->title_type_con }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="big_form_group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label
                                                                class="form-label">{{ __('welcome.menu.country') }}
                                                                <span class="text-danger">*</span></label>
                                                            <select class="form-control select" name="ville_id">
                                                                <option value="">{{ __('welcome.form.selectCity') }}
                                                                </option>
                                                                @foreach ($countries as $country)
                                                                    <option value="{{ $country }}">
                                                                        {{ $country }}</option>
                                                                @endforeach
                                                            </select>
                        <div>
                            <div class="row job_main">
                                <!---/ Side menu -->
                                <div class=" job_main_right">
                                    <div class="row job_section">
                                        <div class="col-sm-12">

                                            <div class="section-divider">
                                            </div>
                                            @include('website.inc.messages')
                                            <form action="{{ route('client.offers.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="big_form_group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label> {{ __('welcome.form.title') }} <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ old('title_offer') }}" name="title_offer">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label class="form-label">{{ __('welcome.form.typeofcontract') }}<span class="text-danger">*</span></label>
                                                                <select class="form-control select" name="type_contrat_id">
                                                                    <option value="">
                                                                        {{ __('welcome.form.selectContact') }}
                                                                    </option>
                                                                    @foreach ($typecontrats as $item)
                                                                    <option value="{{ $item->id }}" {{ old('type_contrat_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->title_type_con }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="big_form_group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label class="form-label">{{ __('welcome.menu.country') }}
                                                                    <span class="text-danger">*</span></label>
                                                                <select class="form-control select" name="ville_id">
                                                                    <option value="">{{ __('welcome.form.selectCity') }}
                                                                    </option>
                                                                    @foreach ($countries as $country)
                                                                    <option value="{{ $country }}">
                                                                        {{ $country }}</option>
                                                                    @endforeach
                                                                </select>
                                                           </div>

                                                        </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>{{ __('welcome.form.cities') }} <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="{{ old('city') }}" name="city"
                                                                 oninput="validity.valid||(value='');">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>{{ __('welcome.form.area') }}<span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-control select"
                                                                name="secteur_activite_id" id="ddlViewBy">
                                                                <option value="">{{ __('welcome.form.selectArea') }}
                                                                </option>
                                                                @foreach ($secteurs as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ old('secteur_activite_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->title_secteur }}</option>
                                                                @endforeach
                                                            </select>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>{{ __('welcome.form.area') }}<span class="text-danger">*</span></label>
                                                                <select class="form-control select" name="secteur_activite_id" id="ddlViewBy">
                                                                    <option value="">{{ __('welcome.form.selectArea') }}
                                                                    </option>
                                                                    @foreach ($secteurs as $item)
                                                                    <option value="{{ $item->id }}" {{ old('secteur_activite_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->title_secteur }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>{{ __('welcome.form.typeofjob') }}<span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-control select" name="job_type_id">
                                                                <option value="">{{ __('welcome.form.selectJob') }}
                                                                </option>
                                                                @foreach ($types as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        {{ old('job_type_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->title_job_ty }}</option>
                                                                @endforeach
                                                            </select>

                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.typeofjob') }}<span class="text-danger">*</span></label>
                                                                <select class="form-control select" name="job_type_id">
                                                                    <option value="">{{ __('welcome.form.selectJob') }}
                                                                    </option>
                                                                    @foreach ($types as $item)
                                                                    <option value="{{ $item->id }}" {{ old('job_type_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->title_job_ty }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>{{ __('welcome.form.numberof') }}
                                                            </label>
                                                            <input type="number" class="form-control" placeholder=""
                                                                value="{{ old('vacancies') }}" name="vacancies"
                                                                min="0" oninput="validity.valid||(value='');">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>{{ __('welcome.form.numberof') }}
                                                                </label>
                                                                <input type="number" class="form-control" placeholder="" value="{{ old('vacancies') }}" name="vacancies" min="0" oninput="validity.valid||(value='');">
                                                            </div>

                                                        </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>{{ __('welcome.form.salary') }}</label>
                                                            <span class="text-danger">*</span></label>
                                                            <input type="number" class="form-control"
                                                                placeholder=""
                                                                value="{{ old('expected_salary') }}"
                                                                name="expected_salary_min" min="0"
                                                                oninput="validity.valid||(value='');">
                                                                <span class="text-danger">Min</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>{{ __('welcome.form.salary') }}</label>
                                                            <input type="number" class="form-control"
                                                                placeholder=""
                                                                value="{{ old('expected_salary') }}"
                                                                name="expected_salary_max" min="0"
                                                                oninput="validity.valid||(value='');">
                                                                <span class="text-danger">Max</span>

                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.salary') }}</label>
                                                                <input type="number" class="form-control" placeholder="" value="{{ old('expected_salary') }}" name="expected_salary" min="0" oninput="validity.valid||(value='');">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.numberyear') }} </label>
                                                                <input type="number" class="form-control" placeholder="" value="{{ old('total_experience') }}" name="total_experience" min="0" oninput="validity.valid||(value='');">
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>Web site</label>
                                                                <input type="text" class="form-control" placeholder="" value="{{ old('web-site') }}" name="web_site" min="0" oninput="validity.valid||(value='');">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>{{ __('welcome.form.numberyear') }} </label>
                                                            <input type="number" class="form-control" placeholder=""
                                                                value="{{ old('total_experience') }}"
                                                                name="total_experience" min="0"
                                                                oninput="validity.valid||(value='');">

                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>Logo</label>
                                                                <input type="file" class="form-control" placeholder="" value="{{ old('logo') }}" name="file" min="0" oninput="validity.valid||(value='');">
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>


                                            <div class="big_form_group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>{{ __('welcome.form.datebegin') }}<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" placeholder=""
                                                                name="start_date" required
                                                                value="{{ old('start_date') ?? date('Y-m-d', strtotime('+' . $date . ' days')) }}"
                                                                required>
                                                            <span class="text-danger"> > {{ $date }}
                                                                days</span>

                                                <div class="big_form_group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.datebegin') }}<span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" placeholder="" name="start_date" required value="{{ old('start_date') ?? date('Y-m-d', strtotime('+' . $date . ' days')) }}" required>
                                                                <span class="text-danger">Minimum {{ $date }}
                                                                    jours de délai</span>
                                                            </div>

                                                        </div>
                                                        {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date fin poste</label>
                                                    <input type="date" class="form-control" placeholder="" name="end_date"
                                                        value="{{ old('end_date') }}">
                                                    </div>



                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label>
                                                                {{ __('welcome.form.mission') }}</label>
                                                            <textarea class="form-control" name="mission">{{ old('mission') }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label>{{ __('welcome.form.requiredprof') }}</label>
                                                            <textarea class="form-control" name="profile">{{ old('profile') }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label>{{ __('welcome.form.description') }}</label>
                                                            <textarea class="form-control" name="description_offer">{{ old('description_offer') }}</textarea>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>Logo</label>
                                                            <input type="file" class="form-control" placeholder="" value="{{ old('logo') }}" name="photo" oninput="validity.valid||(value='');">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-9 ">
                                                    <button type="submit" class="btn btn-danger">Soumettre</button>
                                                </div>
                                            </div>
                                        </form>

                                                </div> --}}

                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label>
                                                            {{ __('welcome.form.mission') }}</label>
                                                        <textarea class="form-control" name="mission">{{ old('mission') }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label>{{ __('welcome.form.requiredprof') }}</label>
                                                        <textarea class="form-control" name="profile">{{ old('profile') }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label>{{ __('welcome.form.description') }}</label>
                                                        <textarea class="form-control" name="description_offer">{{ old('description_offer') }}</textarea>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-9 ">
                                            <button type="submit" class="btn btn-danger">{{ __('welcome.form.add') }}</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </main>
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
