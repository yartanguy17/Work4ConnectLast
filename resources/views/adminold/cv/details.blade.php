@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.user') }}
@endsection

@section('content')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">{{ __('messages.menu.dashboard') }}</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">CV</a></li>
                <li class="breadcrumb-item"><a href="#">Détails</a></li>
            </ol>
        </div>

    </div>
</div>
<section id="blog-area" class="blog-default-area">
    <div class="container">
        <div class="card">
            <div class="card-header text-center bg-danger">
                <h2 style="color: white">CV Details</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4 text-center">
                        <h3>{{ __('cv.data.details') }}</h3>
                        <br/>
                        <h5>{{ __('cv.data.surname') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.first_name') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.email_address') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.profile_title') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.phone_number') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.address') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.city') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.country') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.date_of_birth') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.place_birth')}} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.driving_license') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.sex') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.nationality') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.marital_status') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.site_internet') }} :</h5>
                        <p>Datum</p>
                        <h5>Linkedin :</h5>
                        <p>Datum</p>

                    </div>
                    <div class="col-4 text-center">
                        <h3>{{ __('cv.data.training') }}</h3>
                        <br/>
                        <h5>{{ __('cv.data.training') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.etab') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.country') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.start_date') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.end_date') }} :</h5>
                        <p>Datum</p>
                        <h5>Description :</h5>
                        <p>Datum</p>
                        <br/>
                        <h3>{{ __('cv.data.competence') }}</h3>
                        <br/>
                        <h5>{{ __('cv.data.competence') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('annonce.page.niveau') }} :</h5>
                        <p>Datum</p>
                        <br/>
                        <h3>{{ __('cv.data.lang') }}</h3>
                        <br/>
                        <h5>{{ __('cv.data.lang') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('annonce.page.niveau') }} :</h5>
                        <p>Datum</p>
                        <br/>
                        <h3>{{ __('cv.data.interest') }}</h3>
                        <br/>
                        <h5>{{ __('cv.data.interest') }} :</h5>
                        <p>Data</p>
                        <br/>
                        <h3>{{ __('cv.data.quality') }}</h3>
                        <br/>
                        <h5>{{ __('cv.data.quality') }} :</h5>
                        <p>Data</p>

                    </div>
                    <div class="col-4 text-center">
                        <h3>{{ __('cv.data.xp') }}</h3>
                        <br/>
                        <h5>{{ __('cv.data.post') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.emp') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.city') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.start_date') }} :</h5>
                        <p>Datum</p>
                        <h5>{{ __('cv.data.end_date') }} :</h5>
                        <p>Datum</p>
                        <h5>Description :</h5>
                        <p>Datum</p>
                        <br>
                        <h3>{{ __('cv.data.ref') }}</h3>
                        <br/>
                        <h5>{{ __('cv.data.ref') }} :</h5>
                        <p>Data</p>
                        <br>
                        <h3>{{ __('cv.data.Realization') }}</h3>
                        <br/>
                        <h5>{{ __('cv.data.Realization') }} :</h5>
                        <p>Data</p>
                        <br>
                        <h3>{{ __('cv.data.cert') }}</h3>
                        <br/>
                        <h5>{{ __('cv.data.cert') }} :</h5>
                        <p>Data</p>
                        <br>
                        <h3>Profil</h3>
                        <br/>
                        <h5>Description :</h5>
                        <p>Datum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

@push('admin')
    <script>
        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.admins.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endpush
