@extends('admin.layouts.app')

@section('title')
    {{ __('messages.menu.user') }}
@endsection

@section('content')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Liste </h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">{{ __('messages.menu.dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="#">Liste des cv</a></li>
            </ol>
        </div>
        <div class="">
            <div class="float-end row">
                <div class="col"><input type="text" class="form-group" placeholder="Email"></div>
                <div class="col"><input type="text" class="form-group" placeholder="Secteur d'activité"></div>
                <div class="col"><input type="text" class="form-group" placeholder="Pays"></div>
                <div class="col"><input type="text" class="form-group" placeholder="Nombre d'années d'experience"></div>
                <div class="col"><button class="btn btn-danger"><i class="ti-search "></i></button></div>

            </div>
        </div>
    </div>
</div>
<section id="blog-area" class="blog-default-area">
    <div class="container">





        <div class="row">



            @if ($prestataires->isNotEmpty())

                @foreach ($prestataires as $prestataire)


                    <div class="col-sm-4 mb-4">
                      <div class="card">
                        <div class="card-body">
                            <div class="row">
                          <h5 class="card-title h5">
                              <img class="rounded-circle mr-3" width="15px" height="15px" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg"
                            data-holder-rendered="true"/> {{ $prestataire->last_name }} {{ $prestataire->first_name }}</h4>
                            </div>
                            <hr/>
                            <div class="row">
                                @if ($prestataire->personne_type == 'entreprise')
                                <div class="col">
                                    <p class="mr-3">
                                        <i class="fas fa-landmark"></i>
                                        Entreprise
                                    </p>
                                </div>
                                @else
                                <div class="col">
                                    <p class=" mr-3">
                                        <i class="far fa-user"></i>
                                        Particulier
                                    </p>
                                </div>
                                @endif
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <i class="fas fa-city"></i>
                                        {{ $prestataire->villes->title_ville }}
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col">
                                    @if ($prestataire->personne_type == 'particulier')

                                        <i class="fas fa-border-all"></i>
                                        @if ($prestataire->gender == 'M')
                                            Masculin
                                        @else
                                            Féminin
                                        @endif

                                    <!--
                                    <li>
                                        <i class="fa fa-sex"></i>
                                        <input type="hidden"
                                            value="{{ $prestataire->birth_date ? $prestataire->birth_date : 'N/A' }}"
                                            id="birth_date">
                                        <p id="age" class="btn btn-danger mr-3"></p>
                                    </li>
                                -->
                                @endif
                                </div>
                            </div>
                               <style>
                               .space{
                                    margin-right: 10%;
                               }
                               a{
                                   color: red;
                               }
                                </style>

                          {{-- <p class="card-text"><i class="fa fa-earth-africa space"></i> {{ $prestataire->villes["title_ville"] }}</p> --}}

                          <div class="fb_action">
                            <button class="btn btn-danger">Competence 1</button>
                            <button class="btn btn-danger">Competence 2</button>
                          </div>
                          <hr/>
                          <div class="fb_action">
                            <a class="btn btn-danger" title="Voir" href="{{ route('admin.cv_details') }}"><i
                                class="fa fa-eye"></i></a>

                        </div>

                        </div>
                      </div>
                    </div>
                @endforeach

                <br/>


            @else
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span>
                            <b> Pas profil trouvé correspondant à votre recherche </b>
                        </span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="confirm_resource" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="" id="addForm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmation de reservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <p>Souhaitez-vous que   Work4connect vous réserve ce prestataire ?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Oui</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>

                </div>
            </div>
        </form>
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
