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
                    <div class="col-lg-10 offset-lg-1">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="p-2">
                                    <h5 class="font-size-16"><strong>Type d'absence </strong></h5>
                                    <p>{{ $demandeabsences->typedemandes->type_absence_name }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="p-2">
                                    <h5 class="font-size-16"><strong>Date de demande </strong></h5>
                                    <p>{{ $demandeabsences->date_demande ? date('d/m/Y', strtotime($demandeabsences->date_demande)) : 'N/A' }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="p-2">
                                    <h5 class="font-size-16"><strong>Nombre de jours </strong></h5>
                                    <p>{!! $demandeabsences->dure_absence !!}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h5 class="font-size-16"><strong>Date de reprise </strong></h5>
                                    <p>{{ $demandeabsences->date_reprise ? date('d/m/Y', strtotime($demandeabsences->date_reprise)) : 'N/A' }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h5 class="font-size-16"><strong>Motif </strong></h5>
                                    <p>{{ $demandeabsences->motif_demande }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h5 class="font-size-16"><strong>Etat </strong></h5>
                                    <p>
                                        @if ($demandeabsences->is_valide == 0)
                                            <label class="text-danger">En attente</label>
                                        @elseif($demandeabsences->is_valide == 1)
                                            <label class="text-success">Accepté</label>
                                        @elseif($demandeabsences->is_valide == 2)
                                            <label class="text-danger">Rejété</label>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-2">
                                    <h5 class="font-size-16"><strong>Commentaire </strong></h5>
                                    <p>{{ $demandeabsences->comment_demande ? $demandeabsences->comment_demande : 'N/A' }}
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 text-right">
                            <a data-aos="fade-down" data-aos-delay="400" class="btn btn-primary"
                                href="{{ URL::route('prestataire.demandeabsences.index') }}">Retour <i
                                    class="fas fa-long-arrow-alt-left"></i></a>
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
