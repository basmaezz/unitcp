<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <!-- meta charec set -->
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- Page Title -->
    <title>Exams</title>
    <!-- Meta Description -->
    <meta name="description" content="Exams">
    <meta name="keywords" content="Exams, elearning">
    <meta name="author" content="Rehab">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" media="none" onload="if(media!='all')media='all'">

    <!-- CSS
    ================================================== -->
    @include('public.layouts.css')

</head>

<body id="body">

<!-- preloader -->
<div id="preloader">
    <img src="{{url('/frontend/img/preloader.gif')}}" alt="Preloader">
</div>
<!-- end preloader -->

<!--  Navigation=== -->
<header  class="inner">

    <nav class="navbar  navigation ">
        <!-- logo -->
        <a class="navbar-brand" href="{{route('public.index')}}">
            <img src="{{url('/frontend/img/logo.png')}}" alt="Exams">
        </a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span> <i class="fa fa-bars fa-2x"></i>
        </button>
        </div>
        <!-- responsive nav button -->

        <!-- /responsive nav button -->

        <div class="navbar-search">

            {{--<form class="form-inline my-2 my-lg-0">--}}
            <form method="get" class="form-inline my-2 my-lg-0" action="{{route('panel.exam.search-s')}}">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="txtsearch">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>


        <!-- main nav -->

        <div class="collapse navbar-collapse navbar-right" role="navigation">
            <ul class="nav navbar-nav">
                @if (Auth::check())
                    <li>
                        <a href ="#"  id="login" rel="nofollow">{{auth()->user()->name}}

                        </a>
                    </li>

                    <li>
                        <a href ="{{route('logout.panel')}}"  id="login" rel="nofollow">Logout

                        </a>
                    </li>

                @else
                    <li>
                        <a href ="{{route('panel.login')}}"  id="login" rel="nofollow">Sign in
                        </a>
                    </li>
                @endif
                <li >
                    <a href=""  id="lang" rel="nofollow">Arabic
                    </a></li>

            </ul>
        </div>


    </nav>
    <!-- /main nav -->


</header>
<!--
End Fixed Navigation
==================================== -->



<!--Home search ==== -->

<div  id="container" class="sidebar-wrapper wrapper document-viewer">
    <!-- Sidebar -->

    <nav id="sidebar" >
        <div class="sidebar-content">
            <div class="sidebar-header">
                <h1 class="docTitle"></h1>

                Solution Manual of Probability & Statistics for Engineers & Scientists (9th Edition) - Ronal E. Walpole, Raymond H. Mayers, Sharon L. Mayers & Keying Ye
            </div>
            <!-- rating -->
            <div class="document-info-row row">
                <p class="title">Ratings</p>
                <div class="col-md-6">
                    <button class="btn-wrapper btn btn-success like-btn">
                    {{--<a href="{{url('public/storelike/'.$exam->id)}}" class="btn-wrapper btn btn-success ">--}}
                        <i class="fa fa-thumbs-up"></i>
                        <p class="rating-positive-number">{{$exam->likes_num}}</p>
                    {{--</a>--}}
                    </button>
                </div>
                <div class="col-md-6">
                    <button class="btn-wrapper btn btn-danger dislike-btn">
{{--                    <a href="{{url('public/dislike/'.$exam->id)}}" class="btn-wrapper btn btn-danger ">--}}
                        <i class="fa fa-thumbs-down"></i>
                        <p class="rating-negative-number">{{$exam->dislike_num}}</p>
                        </button>
                    {{--</a>--}}
                </div>
            </div>
            <!-- social -->

            <div class="document-info-row  row">
                <p class="title">Share</p>
                <div class="col-md-4">
                    <button class="btn-wrapper btn btn-primary  btn-lg">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                </div>
                <div class="col-md-4">

                    <button class="btn-wrapper btn  btn-success  btn-lg">
                        <i class="fab fa-whatsapp"></i>
                    </button>
                </div>
                <div class="col-md-4">

                    <button class="btn-wrapper btn  btn-info  btn-lg">
                        <i class="fab fa-facebook-messenger"></i>
                    </button>
                </div>


                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{url('public/viewpdf/'.$exam->id)}}">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">copy</button>
                    </div>
                </div>

            </div>



            <!--comment-->

            <div class="document-info-row  row">
                <p class="title">Comments</p>
                <div class="col ">



                    <form method="get" id="comment-form">
                        <div class="input-group mb-5">

                            <input type="hidden" name="exam_id" class="form-control exam_id" value="{{$exam->id}}">
                            @if (Auth::check())
                                <input type="text" name="txtcomment" class="form-control txtcomment" placeholder="write comment">
                            @else
                                <input type="text" name="txtcomment" class="form-control" placeholder="write comment" disabled>
                            @endif
                        </div>

                    </form>


                </div>
                <div class="clearfix"></div>

                <ul class="comment-user-post">
                    @foreach($comments as $comment)
                        <li class="comment-det" >
                            <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>
                            <div class="comment-user-txt">
                                <span ><a href="" >{{$comment->student->name}}</a>•<span >{{$comment->created_at->diffForHumans()}}</span></span>
                                <span>{{$comment->comment}}</span>
                            </div>
                        </li>
                    @endforeach


                </ul>
                <div class="show-more-comments"><button class="btn btn-outline-primary btn-block"> Show 5 more comments.</button></div>
            </div>



            <!--comment-->

        </div>
    </nav>



    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="content-header  row">
                    <div class=" col-md-4 col-sm-2 ">
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                        </button>
                    </div>
                    <div class="col-md-8 col-sm-2 right  download-exam">
                        <button type="button" class="btn btn-success">Download</button>
                    </div>
                </div>
            </div>

            <!-- 4:3 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9">
                {{--<iframe class="embed-responsive-item" src="{{ response()->file('storage/faculty/exams/10/485/2/10/2/2/test1-2002-2003.pdf') }}" allowfullscreen></iframe>--}}
                {{--<iframe class="embed-responsive-item" src="" allowfullscreen></iframe>--}}
                <embed src="https://drive.google.com/viewerng/
viewer?embedded=true&url={{ url('https://www.tutorialspoint.com/php/php_tutorial.pdf') }}" width="500" height="375">
            </div>
        </nav>
    </div>
</div>

<!--
End Home search
==================================== -->





<!-- Essential jQuery Plugins
================================================== -->
<!-- Main jQuery -->
@include('public.layouts.js')


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });


    $( "#comment-form" ).submit(function( event ) {
        var exam_id= $(".exam_id").val();
        var comment= $(".txtcomment").val();

        // alert( exam_id);
        event.preventDefault();

        $.ajax({
            type: "get",
            url: '/public/comment/'+exam_id+'/'+comment,

            success: function(response) {
                if(response.status)
                {
                    alert('ok');
                    console.log(response);
                    this.clear();

                }


            }

        });
    });


</script>
</body>
</html>