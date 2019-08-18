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
    <meta property="og:url"   content="http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="When Great Minds Don’t Think Alike" />
    <meta property="og:description"        content="How much does culture influence creative thinking?" />
    <meta property="og:image"              content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />

    <meta name="twitter:card" content="photo">
    <meta name="twitter:title" content="exams  ">
    <meta name="twitter:description" content="mansoura university , MyAssistant">
    <meta name="twitter:image" content="http://instacards.net/storage/card/l/RGg1Nmw4VWpjN0h1bHdVa3oxcWZldz09">

    <!-- Google Font -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" media="none" onload="if(media!='all')media='all'">



    @if(app()->getLocale() =='ar')
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
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">@lang('exam.search')</button>
            </form>
        </div>


        <!-- main nav -->
        <div id="navbar" class="navbar-collapse collapse navbar-right">
            <ul  class="nav navbar-nav">
                @if (Auth::check())
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth()->user()->name}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="dropdown-item">
                            <a href ="{{ route('public.logout') }}">@lang('exam.Logout') </a>
                        </li>

                    </ul>

                @else
                    <li>
                        <a href ="{{route('panel.login')}}"  id="login" rel="nofollow">@lang('exam.Sign in')
                        </a>
                    </li>
                @endif
                <li >
                    <a href=""  id="lang" rel="nofollow">عربى
                    </a>
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
                <p class="title">@lang('exam.Ratings')</p>
                <div class="col-md-6 col-xs-4">
                    <button class="btn-wrapper btn btn-success like-btn">
                    {{--<a href="{{url('public/storelike/'.$exam->id)}}" class="btn-wrapper btn btn-success ">--}}
                        <i class="fa fa-thumbs-up"></i>
                        <p class="rating-positive-number">{{$like}}</p>
                    {{--</a>--}}
                    </button>
                </div>
                <div class="col-md-6 col-xs-4">
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
                <p class="title">@lang('exam.Share')</p>
                <div class="col-md-4 col-xs-4">

                    <div class=" fab fa-facebook-f fb-share-button btn-wrapper btn btn-primary  btn-lg" data-href="{{url('public/viewpdf/'.$exam->id)}}"></div>

                </div>
                <div class="col-md-4 col-xs-4">
                    <a class="btn-wrapper btn  btn-success  btn-lg" href="https://web.whatsapp.com/send?text={{url('public/viewpdf/'.$exam->id)}}" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
                <div class="col-md-4 col-xs-4">
                    <a class="btn-wrapper btn  btn-info  btn-lg" href="https://twitter.com/share?text={{url('public/viewpdf/'.$exam->id)}}" target="_blank">
                        <i class="fab fa-twitter"></i></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>


                <div class="input-group mb-3">
                    <input type="text" id="current_url" readonly class="form-control" value="{{url('public/viewpdf/'.$exam->id)}}">
                    <div class="input-group-append">
                        <button onclick="copyMe('current_url')" class="btn btn-success" type="button">@lang('exam.copy')</button>
                    </div>
                </div>

            </div>
            <!--comment-->

            <div class="document-info-row  row">
                <p class="title">@lang('exam.Comments')</p>
                <div class="col ">



                    <form method="get" id="comment-form">
                        {{csrf_field()}}
                        <div class="input-group mb-5">

                            <input type="hidden" name="exam_id" class="form-control exam_id" value="{{$exam->id}}">
                            @if (Auth::check())
                                <input type="text" name="txtcomment" class="form-control txtcomment" placeholder="write comment">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">@lang('exam.send')</button>
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
                                <span class="user-comment">{{$comment->comment}}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="show-more-comments"><button class="btn btn-outline-primary btn-block"> @lang('exam.Show more comments').</button></div>
            </div>

            <!--comment-->

        </div>
    </nav>


    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="content-header ">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    @if (Auth::check())
                    <div class="download-exam">
                        <button type="button" class="btn btn-success">@lang('exam.Download')</button>
                    </div>
                        @endif
                </div>
            </div>

            <!-- 4:3 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9 exam-view">
                <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
                <embed src="https://drive.google.com/viewerng/
viewer?embedded=true&url={{ url('storage/faculty/exams/'.$exam->faculty_id ."/".$exam->department_id."/".
                            $exam->class_id ."/".$exam->semester_id ."/".$exam->material_id ."/".$exam->year_id ."/".$exam->files($exam->file)) }}" width="500" height="375">
            </div>
        </nav>
    </div>



</div>

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
            var usercom = $.ajax({
                type: "get",
                url: '/public/comment/'+exam_id+'/'+comment,

                success: function(response) {
                    if(response.status)
                    {
                        let html= '        <li class="comment-det" >\n' +
                            '                            <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>\n' +
                            '                            <div class="comment-user-txt">\n' +
                            '                                <span ><a href="" >'+response.comments.name+'</a>•<span >'+response.comments.date+'</span></span>\n' +
                            '                                <span class="user-comment">'+response.comments.comment+'</span>\n' +
                            '                            </div>\n' +
                            '                        </li>';

                        $('.comment-user-post').prepend(html);


                    }
                    $('.txtcomment') .val('');

                }
            });

        });

</script>
</body>
</html>