<!DOCTYPE html>
<html class="wide smoothscroll wow-animation" lang="en">
  <head>
    <!-- Site Title-->
    <title>Home</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:300,400">
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
  </head>
  <body>
    <!-- Page-->
    <div class="page">
      <!-- Page preloader-->
      <div class="page-loader">
        <div>
          <div class="page-loader-body">
            <div class="cssload-loader">
              <div class="cssload-inner cssload-one"></div>
              <div class="cssload-inner cssload-two"></div>
              <div class="cssload-inner cssload-three"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Page Header-->
      <header class="page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-transparent" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fullwidth" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-sm-stick-up-offset="1px" data-md-stick-up-offset="37px" data-lg-stick-up-offset="46px" data-xxl-stick-up-offset="1px" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true">
            <div class="rd-navbar-outer outer-transparent">
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-inner"><span class="toggle-icon"></span></button>
                <!-- RD Navbar Brand--><a class="rd-navbar-brand" href="wt_61281_v1.html"><img class="brand-mini" src="{{asset('images/brand.png')}}" width="138" height="18" alt=""></a>
              </div>
              <div class="rd-navbar-inner">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-cell rd-navbar-brand-wrap">
                  <!-- RD Navbar Brand--><a class="rd-navbar-brand" href="wt_61281_v1.html"><img class="brand-normal" src="{{asset('images/brand.png')}}" width="138" height="18" alt=""><span class="brand-slogan">Elearning Unit</span></a>
                </div>
                <!-- RD Navbar Nav-->
                <div class="rd-navbar-cell rd-navbar-nav-wrap">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav rd-navbar-nav-default">
                    <li class="active"><a href="wt_61281_v1.html">Home</a>
                      <!-- RD Navbar Megamenu-->
                      <ul class="rd-navbar-megamenu">
                        @foreach($all_fac as $facs)
                            @if($facs->parent_id == 0)
                        <li>
                          <p class="rd-megamenu-header">{{$facs->name_en}}</p>
                          <ul class="rd-megamenu-list">
                            @foreach($facs->child as $fac)
                            <li><a href="#">{{$fac->name_en}}</a></li>
                            @endforeach
                            

                          </ul>
                        </li>
                            @endif
                        @endforeach
                      </ul>
                    </li>
                    <li><a href="about.html">About</a></li>
                  </ul>
                </div>
                <!-- RD Navbar Panel Right-->
                <div class="rd-navbar-cell rd-navbar-panel-right">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav rd-navbar-nav-right">
                    <li><a href="student-help.html">Student help</a></li>
                    <li><a href="https://livedemo00.template-help.com/wt_61281_v1/news.html">News</a></li>
                    <li><a href="https://livedemo00.template-help.com/wt_61281_v1/contact-us.html">Contact us</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
@yield('content')
      <!-- Page Footer-->
      <section class="section pre-footer-default">
        <div class="container-wide">
          <div class="row row-40">
            <div class="col-md-12 col-xl-4">
              <div class="row">
                <div class="col-md-4 col-xl-4 col-xl-6"><a class="brand-logo brand-white brand-grouped" href="https://livedemo00.template-help.com/wt_61281_v1/index.html"><img src="{{asset('images/brand.png')}}" width="138" height="18" alt=""><span class="brand-slogan">National University</span></a></div>
                <div class="col-md-4 col-xl-4 col-xl-6">
                  <ul class="list list-md">
                    <li>
                      <p>4578 Marmora St,<br class="d-none d-xl-inline">Chicago D04 89GR.</p>
                    </li>
                    <li>
                      <p>Telephone:<a class="link-white" href="callto:#"> 1-800-1234-567</a></p>
                    </li>
                    <li>
                      <p>E-mail:<a class="link" href="mailto:#"> mail@demolink.org</a></p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>


          </div>
        </div>
      </section>

      <footer class="section page-footer-default">
        <div class="container-wide">
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="{{asset('site/js/core.min.js')}}"></script>
    <script src="{{asset('site/js/script.js')}}"></script>
    @yield('script')
  </body>
</html>