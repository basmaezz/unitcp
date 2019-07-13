<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<?php  $locale = App::getLocale();  ?>

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
    @if($locale =='ar')
        @include('public.layouts.css-ar')
        @else
        @include('public.layouts.css')
    @endif

</head>

<body id="body">
<div id="fb-root"></div>

<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=241110544128";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<script>
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/messenger.Extensions.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'Messenger'));
</script>

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
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">

                            <span class="username username-hide-on-mobile"> @lang('exam.Change Language')   </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </li>

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
                        <p class="rating-positive-number">{{$like}}</p>
                    {{--</a>--}}
                    </button>
                </div>
                <div class="col-md-6">
                    <button class="btn-wrapper btn btn-danger dislike-btn">
{{--                    <a href="{{url('public/dislike/'.$exam->id)}}" class="btn-wrapper btn btn-danger ">--}}
                        <i class="fa fa-thumbs-down"></i>
                        <p class="rating-negative-number">{{$dislike}}</p>
                        </button>
                    {{--</a>--}}
                </div>
            </div>
            <!-- social -->

            <div class="document-info-row  row">
                <p class="title">Share</p>
                <div class="col-md-4">
                    <div class="fb-share-button btn-wrapper btn btn-primary  btn-lg" data-href="{{url('storage/faculty/exams/'.$exam->faculty_id ."/".$exam->department_id."/".
                            $exam->class_id ."/".$exam->semester_id ."/".$exam->material_id ."/".$exam->year_id ."/".$exam->files($exam->file))}}"
                         data-layout="button_count"></div>

                </div>
                <div class="col-md-4">
                    <a class="btn-wrapper btn  btn-success  btn-lg" href="https://web.whatsapp.com/send?text=url={{url('storage/faculty/exams/'.$exam->faculty_id ."/".$exam->department_id."/".
                            $exam->class_id ."/".$exam->semester_id ."/".$exam->material_id ."/".$exam->year_id ."/".$exam->files($exam->file))}}" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>


                </div>
                <div class="col-md-4">
                    <a class="btn-wrapper btn  btn-info  btn-lg" href="https://twitter.com/share?text={{url('storage/faculty/exams/'.$exam->faculty_id ."/".$exam->department_id."/".
                            $exam->class_id ."/".$exam->semester_id ."/".$exam->material_id ."/".$exam->year_id ."/".$exam->files($exam->file))}}" target="_blank">
                        <i class="fab fa-twitter"></i></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                {{--<div class="col-md-4">--}}
                    {{--<a class="btn-wrapper btn  btn-info  btn-lg" href="https://twitter.com/share?ref_src=twsrc%5Etfw" target="_blank">--}}
                        {{--<i class="fab fa-twitter"></i></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                    {{--<a class="  twitter-share-button " href="https://twitter.com/share?ref_src=twsrc%5Etfw"--}}
                       {{--data-show-count="false"><i class="fab fa-twitter">Tweet</i></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>--}}

                {{--</div>--}}


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
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">send</button>
                                </div>
                            @else
                                <input type="text" name="txtcomment" class="form-control" placeholder="write comment" disabled>

                            @endif
                        </div>

                    </form>


                </div>
                <div class="clearfix"></div>

                <ul class="comment-user-post">
                    @foreach($exam->comments as $comment)
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
                        <a href="{{url('storage/faculty/exams/'.$exam->faculty_id ."/".$exam->department_id."/".
                            $exam->class_id ."/".$exam->semester_id ."/".$exam->material_id ."/".$exam->year_id ."/".$exam->files($exam->file))}}"  class="btn btn-success">Download</a>
                        {{--<button type="button" class="btn btn-success">Download</button>--}}
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