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
        <section class="breadcrumb-area style2" style="background-image: url({{ asset('assets/front/images/services/44.jpg') }});">
            <div class="container">
                <div class="row">
                    <H2 style="text-align:center;font-size:100px;color:#FFF">FAQS</H2>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->

        <!--Start login register area-->
        <!--<section class="login-register-area">
            <div class="container">-->

                {{-- <main>
                    <div class="simple_page">
                        <div class="container ">
                            <div class="row">
                                @foreach ($categories as $category)
                                    <div class="col-md-12">
                                        <h4>{{ $category->title_faq_cat }}</h4>
                @foreach ($category->faqs as $faq)
                <div id="accordion{{ $category->id }}">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapse{{ $faq->id }}">
                                {!! $faq->question_faq !!}<i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div id="collapse{{ $faq->id }}" class="collapse" data-parent="#accordion{{ $category->id }}">
                            <div class="card-body">
                                {!! $faq->answer_faq !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="section-divider">
                <br>
                @endforeach
            </div>
    </div>
    </div>
    </main>

        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up"></i></button>
    </div>
    </section>--}}
    <section class="faq-area">
        <div class="container">
            {{-- <ul id="sticky-menu" class="list-unstyled" role="menu">
                <li role="menuitem">
                    <a id="menu2" href="{{ route('etre_rappele') }}" class="orange" data-touch-count="0" title="Être rappelé">
                        <span class="sticky-menu-text">Être rappelé</span>
                        <span aria-hidden="true" class="o2icon o2icon-cta-rappel fa fa-phone"></span>
                    </a>
                </li>
                <li role="menuitem">
                    <a id="menu3" href="{{ route('demander_devis') }}" class="yellow" data-touch-count="0" title="Prendre contact">
                        <span class="sticky-menu-text"> Demander un devis</span>
                        <span aria-hidden="true" class="o2icon o2icon-devis fa fa-envelope"></span>
                    </a>
                </li>
            </ul> --}}
            <div class="row">
                <div class="col-xl-12">
                    <div class="faq-content-box">
                        @foreach ( $categories as $category)
                        <h4>{{ $category->title_faq_cat }}</h4>
                        <div class="accordion-box">
                            <!--Start single accordion box-->

                            @foreach ( $category->faqs as $faq )
                            <div class="accordion accordion-block">
                                <div class="accord-btn">
                                    <h4>{!! $faq->question_faq !!}</h4>
                                </div>
                                <div class="accord-content">
                                    <p>{!! $faq->answer_faq !!}.</p>
                                </div>
                            </div>
                            @endforeach

                            <!--End single accordion box-->
                            <!--Start single accordion box-->

                            <!--End single accordion box-->
                        </div>
                        @endforeach

                    </div>
                </div>
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
