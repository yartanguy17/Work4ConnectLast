<!DOCTYPE html>
<html lang="en">

@include('website.partials.header')
<!--   06:37:19 GMT -->

<body>
    <div class="boxed_wrapper">
        <div class="preloader"></div>
        <!--Start Main Header-->
        @include('website.partials.menu')
        <!--End Main Header-->
        <section id="blog-area" class="blog-default-area">
            <div class="container">
                <div class="row">
                      @include("website.partials.routes")
                    <div class="col-lg-8 offset-lg-1">
                        <div class="row">
                            <div class="col-md-4">
                                
                                @if($offer->logo !=null)
                                
                               
                                        <img alt="Card image cap"
                                            src="{{ asset('public/assets/logo-offer/'.$offer->logo) }}"
                                            class="card-img-top img-fluid" style="height: 100%;width:100%">
                                @else
                                <img alt="Card image cap"
                                            src="{{ asset('assets/front/images/resources/logo.png') }}"
                                            class="card-img-top img-fluid" style="height: 80%;width:80%">
                                @endif
                                   
                            </div>
                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.title') }} </strong></h6>
                                    <p>{{ $offer->title_offer }}
                                    </p>
                                </div>
                            </div>



                         



                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.area') }} </strong></h6>
                                    <p>{{ $offer->secteurs->title_secteur }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>Country</strong></h6>
                                    <p>{{ $offer->country }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>City</strong></h6>
                                    <p>{{ $offer->city }}
                                    </p>
                                </div>
                            </div>
                              <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>Registration page URL</strong></h6>
                                    <p> <a href="{{ $offer->web_site }}">{{ $offer->web_site }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.numberof') }} </strong></h6>
                                    <p>{{ $offer->vacancies ? $offer->vacancies : 'N/A' }}

                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.salary') }}</strong></h6>
                                    
                                   <p>
                                       @if($offer->expected_salary_max == null)
                                        € {{ $offer->expected_salary_min }}
                                        @else
                                         € {{ $offer->expected_salary_min }} - {{ $offer->expected_salary_max }}
                                         @endif</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.numberyear') }}</strong></h6>
                                    <p>
                                    {{ $offer->total_experience ? $offer->total_experience : 'N/A' }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.datebegin') }}</strong></h6>
                                    <p>{{ Carbon\Carbon::parse($offer->start_date)->format('d/m/Y') }}
                                    </p>
                                </div>
                            </div>


                          

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h6 class="font-size-16"><strong>{{ __('welcome.form.description') }}</strong></h6>
                                    <p>{{ $offer->description_offer }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <a data-aos="fade-down" data-aos-delay="400" class="btn btn-primary"
                                href="{{ URL::previous() }}">{{ __('welcome.form.back') }} <i class="fas fa-long-arrow-alt-left"></i></a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        </section>

        <!--Start footer area-->
        @include('website.partials.footer')
        <!--End footer bottom area-->

    </div>


    <div class="scroll-to-top-style2 scroll-to-target" data-target="html">
        <span class="fa fa-angle-up"></span>
    </div>


    @include('website.partials.js')

    <script>
        var ptag = $('#birth_date').val();
        if (ptag != '') {
            var birthdate = new Date(ptag);
            var cur = new Date();
            // var diff = cur - birthdate;
            // var age = Math.floor(diff / 31536000000);
            var month_diff = Date.now() - birthdate.getTime();
            var month_diff_v = Date.now() - cur.getTime();


            var age_dt = new Date(month_diff);
            var age_dt_v = new Date(month_diff_v);


            var year = age_dt.getUTCFullYear();
            var year_v = age_dt_v.getUTCFullYear();


            var age = Math.abs(year_v - year);
            $('#age').text(age);

        }

        function addData(id) {
            var id = id;
            var url = '{{ route('client.reservations', ':id') }}';
            url = url.replace(':id', id);
            $("#addForm").attr('action', url);
        }

        function formSubmit() {
            $("#addForm").submit();
        }
    </script>
    <script type="text/javascript">
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>

</body>


<!--   06:40:40 GMT -->

</html>
