<!DOCTYPE html>
<html lang="en">

@include('website.partials.header')
<!--   06:37:19 GMT -->


<body>
    <div class="boxed_wrapper">

        <div class="preloader"></div>

        <!--Start Main Header-->
        @include('website.partials.menu')


        <section id="blog-area" class="blog-default-area">
            <div class="container">
                <div class="row">
                    
                    @if (count($offers)>0)

                        @foreach ($offers as $offer)


                            <div class="col-sm-4 mb-4">
                              <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                  <h5 class="card-title h5">
                                      <!--<img class="rounded-circle mr-3" width="15%" height="15%" alt="40x40" src="{{ asset('public/assets/logo-offer/'.$offer->logo) }}" data-holder-rendered="true"/> -->
                                      <h4> {{ $offer->title_offer  }}</h4>
                                    </div>
                                    <hr/>
                                   
                                    <div class="row mb-3">
                                        <div class="col">
                               
                                <p>


                                  Start date : {{ $offer->start_date}}

                                </p>
                                
                                 <p>

                                
                                  Company : {{ $offer->user["first_name"]}} {{ $offer->user["last_name"]}}

                                </p>
                                
                                 <p>

                                    @if($offer->country !=null)
                                      Country : {{ $offer->country}}
                                    @else
                                     Country : N/A
                                     @endif

                                </p>
                                
                                 <p>


                                    @if($offer->city !=null)
                                      City : {{ $offer->city}}
                                    @else
                                     City : N/A
                                     @endif
                                 
                                </p>
                                <p>
                                    @if($offer->profile !=null)
                                       {{ $offer->pofile}}
                                    @endif
                                </p>
                                
                                
                               


                                  

                              
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

                                  
                                 
                                  <hr/>
                                  <div class="fb_action">
                                    <a class="btn btn-danger" title="Voir" href="{{ route('offer.show.single', $offer->id) }}"><i
                                        class="fa fa-eye"></i> {{ __('show') }}
                                        </a>
                                    
                                </div>

                                </div>
                              </div>
                            </div>
                        @endforeach

                        <br/>

                      
                        <nav role="navigation" aria-label="Pagination Navigation" class="d-flex justify-content-center">
                            <div class="flex justify-content-right">
                                {!! $offers->appends(['sort' => 'votes'])->links() !!}
                            </div>
                        </nav>

                    @else
                        <div class="col-sm-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span>
                                    <b> No Ad founded. </b>
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
                            <p>Souhaitez-vous que   Work4connect vous réserve cette offre ?
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

        <!--Start footer area-->
        @include('website.partials.footer')
        <!--End footer bottom area-->

    </div>


    {{-- <div class="scroll-to-top-style2 scroll-to-target" data-target="html">
        <span class="fa fa-angle-up"></span>
    </div> --}}


    @include('website.partials.js')

    <script src="{{ asset('assets/website/js/jquery-3.4.1.min.js') }}"></script>
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

    </script>

</body>


<!--   06:40:40 GMT -->

</html>
