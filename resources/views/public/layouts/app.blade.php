<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
{{--<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">--}}
<html>
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
  <meta name="author" content="Elearning unit ">
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" media="none" onload="if(media!='all')media='all'">

  <!-- CSS
  ================================================== -->

  <!-- Fontawesome Icon font -->

{{--  @include('public.layouts.css-ar')--}}

  @if(app()->getLocale() =='ar')
    @include('public.layouts.css-ar')

    @else
    @include('public.layouts.css')
    @endif

</head>

<body id="body">

<!-- preloader -->
<div id="preloader">
  <img src="{{url('/frontend/img/preloader.gif')}}" alt="Preloader">
</div>
<!-- end preloader -->

<!--  Navigation=== -->
@include('public.layouts.header')
@yield('content')

@include('public.layouts.footer')

<a href="javascript:void(0);" id="back-top"><i class="fa fa-angle-up fa-3x"></i></a>

<!-- Essential jQuery Plugins
================================================== -->
<!-- Main jQuery -->
@include('public.layouts.js')
<!-- jquery easing -->
<script src="{{url('/frontend/js/wow.min.js')}}"></script>
<script>
    var wow = new WOW ({
            boxClass:     'wow',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset:       120,          // distance to the element when triggering the animation (default is 0)
            mobile:       false,       // trigger animations on mobile devices (default is true)
            live:         true        // act on asynchronously loaded content (default is true)
        }
    );
    wow.init();
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>
<!-- Custom Functions -->
{{--<script src="{{url('/frontend/js/custom.js')}}"></script>--}}


</body>
</html>
