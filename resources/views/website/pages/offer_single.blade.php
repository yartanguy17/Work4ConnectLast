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
                            <div class="col-md-4">
                               
                                        <img alt="Card image cap"
                                            src="{{ asset('public/assets/logo-offer/'.$offer->logo) }}"
                                            class="card-img-top img-fluid" style="height: 100%;width:100%">
                                   
                            </div>
                            <div class="col">
                                <p class="text-danger"><i class="fa fa-user"></i> {{ __('annonce.page.title') }}</p>
                                <p>{{ $offer->title_offer }}</p>

                                <p class="text-danger"><i class="fa fa-city"></i> {{ __('welcome.menu.country') }}</p>
                                <p class="">{{ $offer->country }}</p>
                                <p class="text-danger"><i class="fa fa-city"></i> {{ __('messages.form.cities') }}</p>
                                <p class="">{{ $offer->city }}</p>

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
                                         
                                        
                                <p class="text-danger"> <i class="fa fa-calendar"></i> {{ __('welcome.form.startdate') }}</p>
                                <p>


                                   {{ $offer->start_date}}

                                </p>
                                
                                 
                                <p class="text-danger"> <i class="fa fa-calendar"></i> {{ __('welcome.menu.area') }}</p>
                                <p>


                                    {{ $secteur->title_secteur }}

                                </p>
                                 <p class="text-danger"> <i class="fa fa-user"></i> </p>
                                <p>
                                    {{ $offer->description_offer}}   
                                     
                                    </p>


                            </div>

                        </div>
                       
                        
                            <div class="poster_action justify-content-center d-flex">
                                
                                
                              
                                  @if($offer->web_site !=null)
                                  
                                  
                                    <a class="btn btn-danger"
                                           href="{{ $offer->web_site }}">{{ __('annonce.page.postuler') }}
                                       </a>
                                       
                                       <form method="post" action="{{route('applybymail')}}" style="margin-left:2%">
                                           @csrf
                                           
                                           <input type="hidden" name="id" value="{{ $offer->id}}">
                                          
                                     <a href="mailto:{{$offer->user["email"]}}?subject={{ $offer->title_offer }}" class="btn btn-danger" >Apply by mail</a>
                                       
                                       </form>
                                  
                                  @else
                                  
                                       <form method="post" action="{{route('applybymail')}}" style="margin-left:2%">
                                           @csrf
                                           
                                           <input type="hidden" name="id" value="{{ $offer->id}}">
                                          
                                            <a href="mailto:{{$offer->user["email"]}}?subject={{ $offer->title_offer }}" class="btn btn-danger" >Apply by mail</a>
                                       
                                       </form>
                                  @endif
                                  
                                      
                                       
                                       
                                       
                                  
                            
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
