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
                    <div class="col-xl-12">
                        <div class="inner-content-box clearfix">
                            <div class="title-s2 text-center">
                                <span>
                                    <h5 style="color: #FFF">A propos du prestataire</h5>
                                    <ul>
                                        @if ($prestataire->personne_type == 'entreprise')
                                            <li>
                                                <a href="#">
                                                    <i class="fas fa-landmark"></i>
                                                    <span style="color: #e9212e">Entreprise</span>
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="#">
                                                    <i class="far fa-user"></i>
                                                    <span style="color: #e9212e">Particulier</span>
                                                </a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span style="color: #e9212e">{{ $prestataire->country }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span style="color: #e9212e">{{ $prestataire->city }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </span>
                                {{-- <h1>That Perfectly Fits Your Life</h1> --}}
                            </div>
                            <div class="breadcrumb-menu float-left">
                                <a class="btn btn-third" href="#" type="button" data-toggle="modal"
                            data-target="#confirm_resource" onclick="addData({{ $prestataire->id }})"><h2 style="color: #FFF">Reserver cette
                                ressource</h2></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->

        <!--Start login register area-->
        <section class="login-register-area">
            <div class="container">
                @include('website.inc.messages')
                <div class="row">

                    <div class="col-md-9">
                        <div class="row ">
                            <div class="col-md-12 single_job_main">
                                <h2> Description du profil</h2>
                                <p>
                                    {!! \Illuminate\Support\Str::limit($prestataire->biography, 500, '...') !!}
                                </p>
                            </div>
                            <div class="section-divider"></div>
                            <div class="col-md-12 single_job_main">
                                <div class="row two_col featured_box_outer">
                                    <div class="col-md-12 text-center">
                                        <a class="btn btn-primary" href="{{ URL::previous() }}"><i
                                                class="fas fa-long-arrow-alt-left"></i> Retour </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="single-job-sidebar">
                            <div class="sjs_box">
                                <h3>Résumé du profil</h3>
                                <ul class="single-job-sidebar-features">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <h6>Country</h6>
                                        <p>{{ $prestataire->country }}</p>
                                    </li>

                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <h6>City</h6>
                                        <p>{{ $prestataire->city }}</p>
                                    </li>
                                    @if ($prestataire->personne_type == 'particulier')
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                            <h6>Sexe</h6>
                                            @if ($prestataire->gender == 'M')
                                                <p>Masculin</p>
                                            @else
                                                <p>Féminin</p>
                                            @endif
                                        </li>

                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                            <h6>Age</h6>
                                            <input type="hidden" value="{{ $prestataire->birth_date }}" id="birth_date">
                                            <p id="age"></p>
                                        </li>
                                    @endif
                                   
                                </ul>
                            </div>
                        </div>
                        <div class=" sjs_box_action">
                            <a class="btn btn-third" href="#" type="button" data-toggle="modal"
                                data-target="#confirm_resource" onclick="addData({{ $prestataire->id }})">Reserver cette
                                ressource</a>
                        </div>
                    </div>



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
                        <p>souhaitez-vous être mis en relation avec ce prestataire</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </div>
                </div>
            </form>
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
