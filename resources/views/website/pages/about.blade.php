@include('website.partials.header')

<body>

<div class="page-wrapper">

    <!-- Main Header-->
    @include('website.partials.menu')
    <!--End Main Header -->

	<!-- Page Banner Image Section -->
    <div class="page-banner-image-section" >
		{{-- <div class="image">
			<img src="{{ asset('assets/front/images/slides/v1-1.jpg') }}" alt="" />
		</div> --}}
	</div>
	<!-- End Page Banner Image Section -->

	<!-- About Section Two -->
	<div class="about-section-two">
		<div class="auto-container">
			<div class="inner-container">
				<div class="row align-items-center clearfix">

                    <div class="row">
                        <div class="col-6">
                            <div class="card text-white bg-primary mb-4">
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: center">Nos valeurs</h5>
                                    <p class="card-text"><STRONG>Le respect</STRONG>  est une valeur fondamentale de CentralResource. Cela reflète notre volonté de donner la priorité aux personnes. Il s’agit de considérer les autres avec respect et dignité, non seulement à travers des mots, mais à travers nos actions quotidiennes.</p>
                                    <p class="card-text"><STRONG>L'excellence</STRONG> au sein de CentralResource, c'est le désir d'être le meilleur et la recherche de l'amélioration continue. </p>
                                    <p class="card-text">Partager des objectifs, avancer ensemble dans la même direction et s'appuyer les uns sur les autres, c'est l'esprit d'équipe de CentralResource au quotidien</p>
                                    <p class="card-text">L'attitude positive de CentralResource c’est avoir la volonté de bien faire son travail, de voir les situations comme des opportunités, d'avoir confiance en nous et en nos collègues, et de faire de notre entreprise un succès collectif. </p>
                                    <p class="card-text"></p>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="card text-white bg-danger mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Danger card title</h5>
                                    <p class="card-text">Some dummy text to make up the card's content. You can replace it anytime.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card text-white bg-success mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Success card title</h5>
                                    <p class="card-text">Some dummy text to make up the card's content. You can replace it anytime.</p>
                                </div>
                            </div>
                        </div>


                    </div>



				</div>
			</div>
		</div>
	</div>
	<!-- End About Section Two -->

	<!-- Reputation Section Two -->
	<div class="reputation-section-two">
		<div class="auto-container">
			<div class="row clearfix">



				<!-- Form Column -->
				<div class="form-column col-lg-5 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="form-boxed">


							<div class="consult-form">


							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Reputation Section -->

	<!-- End Testimonial Section -->

	<!-- Sponsors Section -->
	<div class="sponsors-section">
		<div class="auto-container">

			<div class="carousel-outer">
                <!--Sponsors Slider-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li><div class="image-box"><a href="#"><img src="{{ asset('front/images/clients/1.png') }}" alt=""></a></div></li>
                    <li><div class="image-box"><a href="#"><img src="{{ asset('front/images/clients/2.png') }}" alt=""></a></div></li>
                    <li><div class="image-box"><a href="#"><img src="{{ asset('front/images/clients/3.png') }}" alt=""></a></div></li>
                    <li><div class="image-box"><a href="#"><img src="{{ asset('front/images/clients/4.png') }}" alt=""></a></div></li>
					<li><div class="image-box"><a href="#"><img src="{{ asset('front/images/clients/5.png') }}" alt=""></a></div></li>

                </ul>
            </div>

		</div>
	</div>
	<!--End Sponsors Section-->

    @include('website.partials.footer')
