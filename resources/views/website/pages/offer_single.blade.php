<!DOCTYPE html>
<html lang='en'>


<!-- account 07:01:11 GMT -->
@include('website.partials.header')
<link href='//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css' rel='stylesheet' />
<script src='//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js'></script>
<body>
    <div class='boxed_wrapper'>


        <div class='preloader'></div>

        @include('website.partials.menu')
        <!--End Main Header-->



        <!--Start login register area-->
        <section class=''>
            <div class='container-sm my-container'>
                <style>
                    .my-container{
                        padding-left: 20%;
                        padding-right: 20%;
                        margin-top: 20px;
                        margin-bottom: 20px;
                    }
                </style>
                <div class="card">
                    <div class="card-header text-center">
                        <h3>{{ __('annonce.page.annonces') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="text-danger"><i class="fa fa-user"></i> {{ __('annonce.page.title') }}</p>
                                <p>{{ $offer->title_offer }}</p>
                                
                                <p class="text-danger"><i class="fa fa-city"></i> {{ __('welcome.menu.country') }}</p>
                                <p>{{ $offer->country }}</p>
                                <i class="fa fa-city"></i> {{ __('messages.form.cities') }}</p>
                                <p>{{ $offer->city }}</p>
                                
                                <p class="text-danger"><i class="fa fa-calendar"></i> {{ __('annonce.page.pub_date') }}</p>
                                <p>{{ $offer->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="col">
                                
                                
                                <p class="text-danger"><i class="fa fa-money" aria-hidden="true"></i> {{ __('annonce.page.salary') }}</p>
                                <p>@if($offer->expected_salary_max == null)
                                        € {{ $offer->expected_salary_min }}
                                        @else
                                         € {{ $offer->expected_salary_min }} - {{ $offer->expected_salary_max }}
                                         @endif</p>
                                <p class="text-danger"> <i class="fa fa-calendar"></i> {{ __('annonce.page.date_post') }}</p>
                                <p>
                                   
                                  
                                   {{ $offer->start_date}}
                                  
                                </p>
                                <p>
                                   
                                    {{$offer->end_date}}
                                    
                                </p>
                               
                            </div>
                        </div>

                        {{-- @if ($offer->user->personne_type == 'particulier')
                            <div class="poster_action justify-content-center d-flex">
                                <a class="btn btn-danger"
                                    href="{{ route('prestataire.offer.apply', $offer->id) }}">{{ __('annonce.page.postuler') }}</a>
                            </div>
                        @endif --}}
                    </div>
                    </div>


                    <br/>


                    
                </div>
            </div>
        </section>
        <!--End login register area-->

        <!--Start footer area Style4-->
        @include('website.partials.footer')

    </div>

    <div class='scroll-to-top scroll-to-target' data-target='html'><span class='fa fa-angle-up'></span></div>

    @include('website.partials.js')




</body>


<!-- account 07:01:11 GMT -->
</html>
