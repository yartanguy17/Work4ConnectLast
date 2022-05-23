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
                    @if ($prestataires->isNotEmpty())

                        @foreach ($prestataires as $prestataire)


                            <div class="col-sm-4 mb-4">
                              <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                  <h5 class="card-title h5">
                                      <img class="rounded-circle mr-3" width="15%" height="15%" alt="40x40" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg"
                                    data-holder-rendered="true"/> {{ $prestataire->last_name }} {{ $prestataire->first_name }}</h4>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        @if ($prestataire->personne_type == 'entreprise')
                                            <li>
                                                <h5 class="btn btn-danger mr-3">
                                                    <i class="fas fa-landmark"></i>
                                                    Entreprise
                                                </h5>
                                            </li>
                                            @else
                                            <li>
                                                <h5 class="btn btn-danger mr-3">
                                                    <i class="far fa-user"></i>
                                                    Particulier
                                                </h5>
                                            </li>
                                        @endif
                                    </div>

                                   
                                    <div class="row mb-3">
                                        <div class="col">
                                            <i class="fas fa-city"></i>
                                                {{ $prestataire->country }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <i class="fas fa-city"></i>
                                                {{ $prestataire->city }}
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

                                   <p class="card-text"><i class="fa fa-earth-africa space"></i> {{ $prestataire->city }}</p> 
<p class="card-text"><i class="fa fa-earth-africa space"></i> {{ $prestataire->country }}</p> 

                                  <div class="d-flex flex-row">
                                    <button class="btn btn-danger mr-3">Competence 1</button>
                                    <button class="btn btn-danger ml-3">Competence 2</button>
                                  </div>
                                  <hr/>
                                  <div class="fb_action">
                                    <a class="btn btn-danger" title="Voir" href="{{ route('prestataire.view', $prestataire->id) }}"><i
                                        class="fa fa-eye"></i></a>
                                    <a class="btn btn-danger mr-3" href="#" type="button" data-toggle="modal"
                                        data-target="#confirm_resource"
                                        onclick="addData({{ $prestataire->id }})">Réserver cette ressource</a>
                                </div>

                                </div>
                              </div>
                            </div>
                        @endforeach

                        <br/>

                        <nav role="navigation" aria-label="Pagination Navigation" class="d-flex justify-content-center">
                            <div class="flex justify-content-right">
                                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                    <i class="fa fa-chevron-left"></i>
                                </span>
                                <a href="http://localhost:8000/recherche/prestataire?page=2" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </nav>

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
