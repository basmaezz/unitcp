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
        <a class="navbar-brand" href="#body">
            <img src="{{url('/frontend/img/logo.png')}}" alt="Exams">
        </a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span> <i class="fa fa-bars fa-2x"></i>
        </button>
        </div>
        <!-- responsive nav button -->

        <!-- /responsive nav button -->

        <div class="navbar-search">

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>


        <!-- main nav -->

        <div class="collapse navbar-collapse navbar-right" role="navigation">
            <ul id="nav" class="nav navbar-nav">
                <li>
                    <a href=""  id="login" rel="nofollow">Sign in
                    </a>
                </li>
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
                    <button class="btn-wrapper btn btn-success ">
                        <i class="fa fa-thumbs-up"></i>
                        <p class="rating-positive-number">1405</p>
                    </button>
                </div>
                <div class="col-md-6">
                    <button class="btn-wrapper btn btn-danger">
                        <i class="fa fa-thumbs-down"></i>
                        <p class="rating-negative-number">74</p>
                    </button>
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
                    <input type="text" class="form-control" placeholder="Search" value="{{url('public/viewpdf/'.$exam->id)}}">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">copy</button>
                    </div>
                </div>

            </div>



            <!--comment-->

            <div class="document-info-row  row">
                <p class="title">Comments</p>
                <div class="col-md-12 ">
                    <textarea class="form-control" placeholder="write a comment..." rows="1"></textarea>
                </div>
                <div class="clearfix"></div>

                <ul class="comment-user-post">
                    <li class="comment-det" >
                        <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>
                        <div class="comment-user-txt">
                            <span ><a href="" >Ahmed.H</a>•<span >26 days ago</span></span>
                            <span>thank you a lot. You save my semester</span>
                        </div>
                    </li>

                    <li class="comment-det" >
                        <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>
                        <div class="comment-user-txt">
                            <span ><a href="" >Ahmed.H</a>•<span >26 days ago</span></span>
                            <span>thank you a lot. You save my semester</span>
                        </div>
                    </li>

                    <li class="comment-det" >
                        <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>
                        <div class="comment-user-txt">
                            <span ><a href="" >Ahmed.H</a>•<span >26 days ago</span></span>
                            <span>thank you a lot. You save my semester</span>
                        </div>
                    </li>

                    <li class="comment-det" >
                        <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>
                        <div class="comment-user-txt">
                            <span ><a href="" >Ahmed.H</a>•<span >26 days ago</span></span>
                            <span>thank you a lot. You save my semester</span>
                        </div>
                    </li>	<li class="comment-det" >
                        <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>
                        <div class="comment-user-txt">
                            <span ><a href="" >Ahmed.H</a>•<span >26 days ago</span></span>
                            <span>thank you a lot. You save my semester</span>
                        </div>
                    </li>	<li class="comment-det" >
                        <div class=""><a href="#" class="pull-left"><i class="far fa-user-circle"></i></a></div>
                        <div class="comment-user-txt">
                            <span ><a href="" >Ahmed.H</a>•<span >26 days ago</span></span>
                            <span>thank you a lot. You save my semester</span>
                        </div>
                    </li>
                </ul>
                <div class="show-more-comments"><button class="btn btn-outline-primary btn-block"> Show 5 more comments.</button></div>
            </div>



            <!--comment-->

        </div>
    </nav>



    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="content-header row">
                    <div class="col-md-4 ">
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                        </button>
                    </div>
                    <div class="col-md-8 right  download-exam">
                        <button type="button" class="btn btn-success">Download</button>
                    </div>
                </div>
            </div>

            <!-- 4:3 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
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
</script>
</body>
</html>
