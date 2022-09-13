<footer class="footer-area">
    <div class="footer-shape-bg wow slideInRight" data-wow-delay="300ms" data-wow-duration="2500ms"></div>
    <div class="container">
        <div class="row">
            <!--Start single footer widget-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget marbtm50">
                    <div class="contact-info-box">
                        <div class="footer-logo">
                            <a href="/">
                                <img src="{{ asset('assets/front/images/footer/footerLogo.png') }}" alt="Awesome Logo"
                                    class="logoo">
                                <style>
                                    .logoo {
                                        width: 150px;
                                        height: 75px;
                                    }

                                </style>
                            </a>
                        </div>
                        <ul>
                            <li>
                                <h6>{{ __('welcome.footer.address') }}</h6>
                                <!--<p>Flat 20, Reynolds Neck, North<br> Helenaville, FV77 8WS</p>-->
                            </li>
                            <li>
                                <h6>{{ __('welcome.footer.phone') }}</h6>
                                <!--<p>+324 123 45 978 & 01<br> <span>Mon - Friday:</span> 9.00am to 6.00pm</p>-->
                            </li>
                            <li>
                                <h6>{{ __('welcome.footer.email') }}</h6>
                                <!--<p>abc@yourdomain.com<br> crystalocareer@gmail.com</p>-->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--End single footer widget-->
            <!--Start single footer widget-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget marbtm50">
                    <div class="title">
                        <h3>{{ __('welcome.footer.jobseeker') }}</h3>
                    </div>
                    <div class="services-links">
                        <ul>
                            <li><a href="#">{{ __('welcome.footer.dashboard') }}</a></li>
                            <li><a href="#">{{ __('welcome.footer.current') }}</a></li>
                            <li><a href="#">{{ __('welcome.footer.profile') }}</a></li>
                            <li><a href="#">{{ __('welcome.footer.password') }}</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget marbtm50">
                    <div class="title">
                        <h3>{{ __('welcome.footer.customer') }}</h3>
                    </div>
                    <div class="services-links">
                        <ul>
                            <li><a href="#">{{ __('welcome.footer.dashboard') }}</a></li>
                            <li><a href="#">{{ __('welcome.footer.find') }}</a></li>
                            <li><a href="#">{{ __('welcome.footer.profile') }}</a></li>
                            <li><a href="#">{{ __('welcome.footer.password') }}</a></li>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-footer-widget marbtm50">
                    <div class="title">
                        <h3>{{ __('welcome.footer.community') }}</h3>
                    </div>
                    <div class="services-links">
                        <ul>
                            <li><a href="#">{{ __('welcome.footer.help') }}</a></li>
                            <li><a href="#">{{ __('welcome.footer.condition') }}</a></li>
                            <li><a href="#">{{ __('welcome.footer.policy') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--End footer area-->

<!--Start footer bottom area-->
<section class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="footer-bottom-content flex-box-two">
                    <div class="copyright-text">
                        <p>Designed by <a href="www.sparkcorporation.org" target="_blank">Spark Corporation</a> -
                            Work4connect all rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">

    var make_button_active = function()
    {
      //Get item siblings
      var siblings =($(this).siblings());

      //Remove active class on all buttons
      siblings.each(function (index)
        {
          $(this).removeClass('active');
        }
      )


      //Add the clicked button class
      $(this).addClass('active');
    }

    //Attach events to menu
    $(document).ready(
      function()
      {
        $(".menu li").click(make_button_active);
      }
    )

    </script>
