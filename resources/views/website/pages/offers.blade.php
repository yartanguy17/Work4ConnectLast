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
        <main>
            <div class="single_job">
                <div class="container">
                    <br/>
                    <h2 class="text-center">{{ __('annonce.page.offers') }}</h2>
                    <br/>
                    <div class="row">
                        @foreach ($offers as $offer)
                        <div class="col-3 mb-3">
                            <div class="card">
                                <div class="card-header text-center">
                                    {{ $offer->title_offer }}
                                    <style>
                                        a{
                                            color: red;
                                            text-decoration: none;
                                        }
                                    </style>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="col-md-4">
                               
                                        <img alt="Card image cap"
                                            src="{{ asset('public/assets/logo-offer/'.$offer->logo) }}"
                                            class="card-img-top img-fluid" style="height: 100%;width:100%">
                                   
                            </div>

                                  
                                    <div>
                                        <i class="fas fa-map-marker-alt"></i> {{ $offer->country }}
                                    </div>
                                    <div>
                                        <i class="fas fa-map-marker-alt"></i> {{ $offer->city }}
                                    </div>
                                    
                                    
                                  
                                    <div>
                                            <i class="far fa-clock"></i>
                                            {{ $offer->created_at->format('d/m/Y') }}
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('offer.show.single', $offer->id) }}">
                                            <i class="far fa-eye"></i>
                                            {{ __('annonce.page.sees') }}
                                        </a>
                                    </div>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $offer->title_offer }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
            </div>



        </main>
        <!--End login register area-->

        <!--Start footer area Style4-->
        @include('website.partials.footer')

    </div>

    <div class='scroll-to-top scroll-to-target' data-target='html'><span class='fa fa-angle-up'></span></div>

    @include('website.partials.js')




</body>


<!-- account 07:01:11 GMT -->
</html>
