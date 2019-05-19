@extends('public.layouts.app')
@section('content')
  <section class="section">
    <!-- Swiper-->
    <div class="swiper-container swiper-slider swiper-slider-custom" data-autoplay="false" data-simulate-touch="false">
      <div class="swiper-wrapper">
        <div class="swiper-slide" data-slide-bg="{{asset('images/slider-1-1920x794.jpg')}}" data-slide-title="Title text">
          <div class="swiper-slide-caption">
            <div class="container">
              <div class="row justify-content-center text-center">
                <div class="col-md-10 col-lg-8 col-xxl-10">
                  <h1 data-caption-animate="fadeInUp" data-caption-delay="100">Our Students Get the Top Opportunities</h1>
                  <p class="big caption" data-caption-animate="fadeInUp" data-caption-delay="250">Our Undergraduate Research and Fellowships Programs help students pursue fellowships, grants, scholarships and awards for study</p>
                  <div class="group-button-md" data-caption-animate="fadeInUp" data-caption-delay="450"><a class="button button-md button-secondary" href="{{route('search')}}">Exams</a><a class="button button-md button-primary" href="{{route('search')}}">Search</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide" data-slide-bg="{{asset('images/slider-2-1920x794.jpg')}}" data-slide-title="Title text">
          <div class="swiper-slide-caption">
            <div class="container">
              <div class="row justify-content-center text-center">
                <div class="col-md-10 col-lg-8 col-xxl-10">
                  <h1 data-caption-animate="fadeInUp" data-caption-delay="100">A Wide Variety of Activities</h1>
                  <p class="big caption" data-caption-animate="fadeInUp" data-caption-delay="250">There is always something happening on the National University campus. Performances, events and other recreational activities are open to all.</p>
                  <div class="group-button-md" data-caption-animate="fadeInUp" data-caption-delay="450"><a class="button button-md button-secondary" href="{{route('search')}}">Exams</a><a class="button button-md button-primary" href="{{route('search')}}">Search</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide" data-slide-bg="{{asset('images/slider-3-1920x794.jpg')}}" data-slide-title="Title text">
          <div class="swiper-slide-caption">
            <div class="container">
              <div class="row justify-content-center text-center">
                <div class="col-md-10 col-lg-8 col-xxl-10">
                  <h1 data-caption-animate="fadeInUp" data-caption-delay="100">Immerse into the Learning Process</h1>
                  <p class="big caption" data-caption-animate="fadeInUp" data-caption-delay="250">With an extensive range of available specialties, disciplines, and educational resources, every student at our campus can learn and become more.</p>
                  <div class="group-button-md" data-caption-animate="fadeInUp" data-caption-delay="450"><a class="button button-md button-secondary" href="{{route('search')}}">Exams</a><a class="button button-md button-primary" href="{{route('search')}}">Search</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide" data-slide-bg="{{asset('images/slider-4-1920x794.jpg')}}" data-slide-title="Title text">
          <div class="swiper-slide-caption">
            <div class="container">
              <div class="row justify-content-center text-center">
                <div class="col-md-10 col-lg-8 col-xxl-10">
                  <h1 data-caption-animate="fadeInUp" data-caption-delay="100">A Friendly Student Community</h1>
                  <p class="big caption" data-caption-animate="fadeInUp" data-caption-delay="250">At our campus, students can get extensive support in every aspect of their studies including educational materials, assistance in lectures and seminars etc.</p>
                  <div class="group-button-md" data-caption-animate="fadeInUp" data-caption-delay="450"><a class="button button-md button-secondary" href="{{route('search')}}">Exams</a><a class="button button-md button-primary" href="{{route('search')}}">Search</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Swiper pagination-->
      <div class="swiper-pagination"></div>
      <!-- Swiper Navigation-->
      <div class="swiper-button swiper-button-prev"><span class="swiper-button__arrow"><span class="fa fa-angle-left"></span></span>
        <div class="preview">
          <h3 class="title">Text</h3>
          <div class="preview__img"></div>
        </div>
      </div>
      <div class="swiper-button swiper-button-next"><span class="swiper-button__arrow"><span class="fa fa-angle-right"></span></span>
        <div class="preview">
          <h3 class="title">Text</h3>
          <div class="preview__img"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- Our Campus Offers-->

  <!-- Upcoming events-->

  <!-- Newsletter-->
  <section class="section section-sm bg-secondary-custom context-dark">
    <div class="container text-center">
      <div class="row justify-content-center">
        <div class="col-md-8 col-xl-8">
          <h2>البحث</h2>
          <p class="big">Keep up with the latest Campus Life news and events. Subscribe to our newsletter.</p>
          <!-- Mailchimp-->
          <form class="mailchimp-mailform rd-mailform-inline rd-mailform-large text-md-right" dir="rtl" data-form-output="form-output-global" action="https://templatemonster.us15.list-manage.com/subscribe/post?u=ba5bb362073a413f48e4a7b90&amp;id=8dc95d9dec" method="post">
            <div class="form-wrap">
              <label class="form-label" for="inline-email"style="right: 29px;">دخل الاسم</label>
              <input class="form-input" id="inline-email" type="email" name="email" data-constraints="@Email @Required">
            </div>
            <button class="button button-primary-dark" type="submit">بحث</button>

          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Start Learning Online Today-->
  <section class="section">
    <div class="row no-gutters justify-content-center">
      <div class="col-md-12 col-xl-6 cell-container bg-image bg-image-small-7 context-dark">
        <div class="cell-block text-center">
          <h2>Start Learning Online Today</h2>
          <p class="big fixed-width fixed-width-1"><span class="font-weight-bold">Set your schedule, pick your course and start learning.</span> Even if you live far from our university and campus, we can provide you with knowledge and qualification for your future profession via our online study programs.</p><a class="button button button-secondary" href="wellness-courses.html">Online course brochure</a>
        </div>
      </div>
      <div class="col-md-12 col-xl-6 bg-gray-lightest text-left text-primary-dark cell-container">
        <div class="cell-block cell-block-4">
          <div class="row justify-content-center row-40 row-lg-72">
            <div class="col-md-6">
              <div class="counter-wrap">
                <div class="title heading-1"><span class="counter" data-speed="3000">92</span><span class="counter-preffix">%</span></div>
                <p class="big">عدد الامتحانات المرفوعه</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="counter-wrap">
                <div class="title heading-1"><span class="counter" data-step="3000">35000</span></div>
                <p class="big">عدد المشاهدات</p>
              </div>
            </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Success Stories-->
  <section class="section section-sm bg-default">
    <div class="container container-wide text-center">
      <h2>الأمتحانات</h2>
      <div class="thumbnail-custom-wrapper">
        <div class="thumbnail-quote"><img src="images/index-4-570x346.jpg" alt="" width="570" height="346"/>
          <blockquote class="quote">
            <cite class="big">احدث الامتحانات المرفوعه</cite>

            <div class="quote-body">
              <p>
                <q>The First Year Program at Campus Life affords so much more than opportunity, flexibility, great classes and advisors, as well as an environment that emanates success—it allows dreams to become imaginable and realized.</q>
              </p>
            </div>
            <div class="quote-meta">
            </div>
          </blockquote>
        </div>
        <div class="thumbnail-quote"><img src="{{asset('images/index-5-570x346.jpg')}}" alt="" width="570" height="346"/>
          <blockquote class="quote">
            <cite class="big">أكتر الامتحانات مشاهده</cite>
            <div class="quote-body">
              <p>
                <q>Online programs at CL allowed me to acquire the skills I needed to take control of my life and get on the road to the career I want.  With the help of my advisor, I was able to set goals and a road map that allowed me to get my education while balancing a job and family.</q>
              </p>
            </div>
            <div class="quote-meta">

            </div>
          </blockquote>
        </div>


      </div><a class="button button-sm-wide button-primary" href="wt_61281_v1.html#">More stories</a>
    </div>
  </section>

@endsection
