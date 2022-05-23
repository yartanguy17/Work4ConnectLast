<!doctype html>
<html lang="en">


<!-- account 07:01:11 GMT -->
@include('website.partials.header')

<body>
    <div class="boxed_wrapper">

        <div class="preloader"></div>

        @include('website.partials.menu')
        <!--End Main Header-->

        @extends('website.prestataires.layouts.app')

        @section('title', 'Tableau de bord prestataire')

        @section('content')
            <div id="">

                @include('website.prestataires.partials.side_menu')

                <main>
                    <div class="job_container">
                        <div class="container">
                            <div class="row job_main">
                                <!---Side menu  -->
                                @include('website.clients.partials.side_menu')
                                <!---/ Side menu -->
                                <div class=" job_main_right">
                                    <div class="row job_section">
                                        <div class="col-sm-12">
                                            <div class="jm_headings">
                                                <h5>{{ __('welcome.form.updatead') }}</h5>
                                            </div>
                                            <div class="section-divider"></div>
                                            @include('website.inc.messages')
                                            <form method="POST" action="{{ route('client.offers.update', $offer->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="big_form_group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.title') }} <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" placeholder=""
                                                                    value="{{ $offer->title_offer }}" name="title_offer">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label
                                                                class="form-label">{{ __('welcome.form.typeofcontract') }}<span
                                                                    class="text-danger">*</span></label>
                                                            <select class="form-control select" name="type_contrat_id">
                                                                @foreach ($typecontrats as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        @if ($item->id == $offer->type_contrat_id) selected='selected' @endif>
                                                                        {{ $item->title_type_con }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="big_form_group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.menu.country') }} <span
                                                                        class="text-danger">*</span></label>
                                                                <select class="form-control select" name="ville_id">
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{$country }}"
                                                                             @if ($country == $offer->country) selected='selected' @endif>
                                                                            {{ $country }}
                                                                           </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                         <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.cities') }}</label>
                                                                <input type="text" class="form-control" placeholder=""
                                                                    value="{{ $offer->city }}" name="city"
                                                                    min="1" min="0" oninput="validity.valid||(value='');">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.area') }} <span
                                                                        class="text-danger">*</span></label>
                                                                <select class="form-control select"
                                                                    name="secteur_activite_id">
                                                                    @foreach ($secteurs as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            @if ($item->id == $offer->secteur_activite_id) selected='selected' @endif>
                                                                            {{ $item->title_secteur }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
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
                                                                        @if ($item->id == $offer->job_type_id) selected='selected' @endif>
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
                                                                value="{{ $offer->vacancies }}" name="vacancies"
                                                                min="1" min="0" oninput="validity.valid||(value='');">
                                                        </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>Web site</label>
                                                            <input type="text" class="form-control" placeholder="" value="{{ $offer->web_site}}" name="web_site" min="0" oninput="validity.valid||(value='');">
                                                        </div>
                                                    </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <label>{{ __('welcome.form.numberyear') }}</label>
                                                                <input type="number" class="form-control" placeholder=""
                                                                    value="{{ $offer->total_experience }}"
                                                                    name="total_experience" min="0"
                                                                    oninput="validity.valid||(value='');">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>{{ __('welcome.form.numberyear') }} </label>
                                                            <input type="number" class="form-control" placeholder=""
                                                                value="{{ $offer->total_experience }}"
                                                                name="total_experience" min="0"
                                                                oninput="validity.valid||(value='');">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>{{ __('welcome.form.website') }}</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                value="{{ $offer->web_site }}" name="web_site"
                                                                min="0" oninput="validity.valid||(value='');">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>{{ __('welcome.form.logo') }}</label>
                                                            <input type="file" class="form-control" placeholder=""
                                                                value="{{ old('logo') }}" name="file" min="0"
                                                                oninput="validity.valid||(value='');">
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
                                                                name="start_date" value="{{ $offer->start_date }}">
                                                            <span class="text-danger">{{ $date }}
                                                                {{ __('welcome.form.minimum') }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label>
                                                                {{ __('welcome.form.mission') }}</label>
                                                            <textarea class="form-control" name="mission">{{ $offer->mission }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label>{{ __('welcome.form.requiredprof') }}</label>
                                                            <textarea class="form-control" name="profile">{{ $offer->profile }}</textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>Logo</label>
                                                            <div class="col-md-4">
                               @if ($offer->logo == null)
                                        <img class="card-img-top img-fluid" src="{{ asset('images/blog.jpg') }}"
                                            alt="Card image cap" style="height: 100%;width:100%">
                                    @else
                                        <img alt="Card image cap"
                                            src="{{ asset('public/assets/logo-offer/'.$offer->logo) }}"
                                            class="card-img-top img-fluid" style="height: 100%;width:100%">
                                    @endif
                            </div></br>
                                                            <input type="file" class="form-control" placeholder="" value="{{ $offer->logo }}" name="photo" oninput="validity.valid||(value='');">
                                                        </div>
                                                    </div>
                                                    </div>

                                                <div class="form-group row">
                                                    <div class="col-md-9 ">
                                                        <button type="submit" class="btn btn-primary">Valider</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-9 ">
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ __('welcome.form.update') }}</button>
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

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
</body>

</html>
