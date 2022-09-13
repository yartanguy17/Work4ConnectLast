<!doctype html>
<html lang="en">

<head>
    @include('website.partials.header')
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
</head>
<body>
<div class="preloader"></div>
@include('website.partials.menu')

<main>
    <div class="blog-listing">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    @foreach ($posts as $post)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="post_box">
                                    @if ($post->cover_image == null)
                                        <img alt="" src="{{ asset('images/blog.jpg') }}" class="img-responsive">
                                    @else
                                        <img alt="" src="{{ asset('public/attachments/' . $post->cover_image) }}"
                                             class="img-responsive w-50 h-50" >
                                    @endif
                                    <div class="post_content">
                                        <h6>
                                            <a href="{{ $post->getLink() }}">{{ $post->title_post }}</a>
                                        </h6>
                                        <p>{!! \Illuminate\Support\Str::limit($post->body_post, 100, '...') !!}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-3 mt-5">
                    <div class="blog_sidebar">
                        <div class="single-job-sidebar">
                            <div class="sjs_box nav-sidebar">
                                <h5>Recherche</h5>
                                <form class="form-inline" action="{{ route('post.search') }}" method="GET">
                                    <div class="row">
                                        <div class="col-9">
                                            <input type="text" class="form-control" placeholder="Recherche" name="search"
                                                   id="search-blog"/>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fas fa-search"></i></button>
                                        </div>

                                        <style>

                                        </style>

                                    </div>

                                </form>
                            </div>
                            <br>
                            <hr/>
                            <br>
                            <style>
                                .nav-sidebar{
                                    margin-top: 15%;
                                }
                            </style>
                            <div class="sjs_box ">
                                <h5>Articles récents</h5>
                                <ul class="list-group">
                                    @foreach ($latestposts as $post)
                                        <li><a href="{{ $post->getLink() }}" class="list-group-item">{{ $post->title_post }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

@include('website.partials.js')
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
