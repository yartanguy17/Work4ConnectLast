<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>Recherche Blog | Centralresource</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="{{ asset('assets/website/images/cr-logo-website.png') }}" type="image/gif" sizes="64x64">

    <!-- CSS
================================================== -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&amp;display=swap&amp;subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/website/css/all.min.css') }}">
    <link href="{{ asset('assets/website/css/aos.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/website/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/website/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/website/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/color-1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/btn.css') }}">
</head>

<body>
    <header class="header_01 header_inner">
        <div class="header_main">
            <!-- Header -->
            @include('website.partials.header')
            <!--/ Header -->
            @include('website.partials.menu')
        </div>
    </header>
    <main>
        <div class="blog-listing">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        @if ($posts->isNotEmpty())
                            <h2 class="section_h">{{ $posts->count() }} Post(s) trouvé(s)</h2>
                        @else
                            <h2 class="section_h">Pas de post trouvé</h2>
                        @endif

                        @if ($posts->isNotEmpty())
                            @foreach ($posts as $post)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="post_box">
                                            <img alt="" src="{{ asset('public/attachments/' . $post->cover_image) }}"
                                                class="img-responsive">
                                            <div class="post_content">
                                                <h6>
                                                    <a href="{{ $post->getLink() }}">{{ $post->title_post }}</a>
                                                </h6>
                                                <p>{!! \Illuminate\Support\Str::limit($post->body_post, 100, '...') !!}</p>
                                                <a class="btn btn-secondary btn-rounded"
                                                    href="{{ $post->getLink() }}">Continuer lecture</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-sm-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span>
                                        <b> Pas de post trouvé correspondant à votre recherche !</b>
                                    </span>
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-3">
                        <div class="blog_sidebar">
                            <div class="single-job-sidebar">
                                <div class="sjs_box">
                                    <h3>Recherche</h3>
                                    <form class="form-inline" action="{{ route('post.search') }}" method="GET">
                                        <input type="text" class="form-control" placeholder="Recherche" name="search"
                                            id="search-blog">

                                        <button type="submit" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="sjs_box">
                                    <h3>Articles récentes</h3>
                                    <ul class="recentpost">
                                        @foreach ($latestposts as $post)
                                            <li><a href="{{ $post->getLink() }}">{{ $post->title_post }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-left">
                        <a class="btn btn-danger" href="{{ URL::previous() }}"><i
                                class="fas fa-long-arrow-alt-left"></i> Retour </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up"></i></button>

    <!-- Footer Container
================================================== -->

    @include('website.partials.footer')

    <!-- End Footer Container
================================================== -->

    <!-- Scripts
================================================== -->
    <script src="{{ asset('assets/website/js/jquery-3.4.1.min.js') }}"></script>
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
    <script src="{{ asset('assets/website/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/aos.js') }}"></script>
    <script src="{{ asset('assets/website/js/custom.js') }}"></script>
</body>

</html>
