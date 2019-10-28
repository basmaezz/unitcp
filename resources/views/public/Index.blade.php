@extends('public.layouts.app')
@section('content')
    <?php  $lang=app()->getLocale();?>

    <!--Home search ==== -->

    <section  class="jumbotron  overlay vertical-center-wrapper">
        <div class="vertical-center-element">
            <div class="container">
                <h1 class="animated fadeInDown">@lang('exam.Find your study resources')</h1>
                <h3 class="animated fadeInDown">@lang('exam.The best documents shared by your fellow students, organized in one place')</h3>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class=" col-md-8">
                        <form method="get" class="search-bar search-bar--big" action="{{route('panel.exam.search-s')}}">
                            <i class="fa fa-search search-bar__icon"></i>
                            <input type="search" placeholder="@lang('exam.searchforexams')" name="txtsearch" data-test-selector="big-search-field" value="" data-hj-whitelist="true">
                            <button type="submit" class="btn btn-primary btn-lg" data-test-selector="search-button">@lang('exam.search')</button>
                        </form>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="popular" class="popular">
        <div class="container">
            <div class="row">

                <div class="sec-title text-center mb50 wow  fadeInDown animated">
                    <h2>@lang('exam.We’ve got the best study material for you')
                    </h2>
                    <div class="devider"><i class="fas fa-book-reader"></i></div>

                </div>

                <!-- search item -->

                <div class="col-md-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms">
                    <div class="service-item">


                        <div class="service-desc">
                            <div class="popular-titel">
                                <p>
								<span class="fa-stack fa-lg popular-icon">
								  <i class="fa fa-circle fa-stack-2x"></i>
								  <i class="fa fa-search fa-stack-1x fa-inverse"></i>
								</span>

                                <h3> @lang ('exam.MostPopularSearches')</h3>
                                </p>
                            </div>
                            <ul class="exam-items-list">
                                @foreach($exams as $key => $exam)
                                    <li><a href="{{url('public/viewpdf/'.$exam->id)}}" class="popular-items__link"><span class="text-ellipsis">{{ getFullexamNamearray(@$exam->department_id, @$exam->material_id,  @$exam->year_id) }}</span></a></li>
                                @endforeach
                                <div class="more">
                                <a href="{{route('popular')}}" class="btn btn-primary">@lang ('exam.view more')</a>

                                </div>

                            </ul>
                  					</div>
                    </div>
                </div>
                <!-- end search item -->

                <!-- recent item -->
                <div class="col-md-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms">
                    <div class="service-item">


                        <div class="service-desc">
                            <div class="popular-titel">
                                <p>
								<span class="fa-stack fa-lg popular-icon">
								  <i class="fa fa-circle fa-stack-2x"></i>
								  <i class="fa fa-search fa-stack-1x fa-inverse"></i>
								</span>

                                <h3>@lang ('exam.Most Recent Exams') </h3>
                                </p>
                            </div>
                            <ul class="exam-items-list">
                                @foreach($exams as $key => $exam)
                                    <li><a href="{{url('public/viewpdf/'.$exam->id)}}" class="popular-items__link"><span class="text-ellipsis">{{ getFullexamNamearray(@$exam->department_id, @$exam->material_id,  @$exam->year_id) }}</span></a></li>
                                @endforeach
                                <div class="more">
                                    <a href="{{route('recent')}}" class="btn btn-primary">@lang ('exam.view more')</a>
                                </div>

                            </ul>			</div>
                    </div>
                </div>
                <!-- end service item -->

            </div>
        </div>
    </section>

    <!--
    End popular
    ==================================== -->




    <!--
    Some  facts
    ==================================== -->

    <section id="facts" class="facts">
        <div class="parallax-overlay">
            <div class="container">
                <div class="row number-counters">

                    <div class="sec-title text-center mb50 wow rubberBand animated" data-wow-duration="1000ms">
                        <h2>@lang('exam.Youre in good company')</h2>
                        <div class="devider"><i class="fas fa-book-reader"></i></div>
                    </div>

                    <!-- first count item -->
                    <div class="col-md-4 col-sm-4 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
                        <div class="counters-item">
                            <a href="">
                                <img src="{{url('/frontend/img/university-icon.png')}}" srcset="{{url('/frontend/img/university-icon.png')}}" alt="university icon" class="illus-figures" width="150" height="150" data-test-selector="homeUniversityIcon"
                                >
                            </a>
                            <strong data-to="{{$faculty}}">0</strong>
                            <!-- Set Your Number here. i,e. data-to="56" -->
                            <p>@lang('exam.faculities')</p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="600ms">
                        <div class="counters-item">
                            <a href="">
                                <img src="{{url('/frontend/img/exam-questions.png')}}" srcset="{{url('/frontend/img/exam-questions.png')}}" alt="Exam icon" class="illus-figures" width="150" height="150" data-test-selector="examIcon"
                                >
                            </a>
                            <strong data-to="{{$examcount}}">0</strong>
                            <!-- Set Your Number here. i,e. data-to="56" -->
                            <p> @lang('exam.exams')</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="900ms">
                        <div class="counters-item">
                            <a href="">
                                <img src="{{url('/frontend/img/users.png')}}" srcset="{{url('/frontend/img/users.png')}}" alt="Exam icon" class="illus-figures" width="150" height="150" data-test-selector="examIcon"
                                >
                            </a>								<strong data-to="{{$user}}">0</strong>
                            <!-- Set Your Number here. i,e. data-to="56" -->
                            <p>@lang('exam.users')</p>
                        </div>
                    </div>
                    <!-- end first count item -->

                </div>
            </div>
        </div>
    </section>

    <!--
    End Some fun facts
    ==================================== -->

    <!-- about-exams -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6  section-padding wow fadeInLeft" data-wow-delay="0.6s">
                    <h2 class="text-uppercase ">@lang('exam.about') </h2>
                    <p>@lang('exam.aboutsite') </p>
                    <a href="{{route('panel.login')}}" class="btn btn-primary btn-lg">@lang('exam.GetStrated') </a>
                    {{--<button type="button" class="btn btn-primary btn-lg">@lang('exam.GetStratedforfree') </button>--}}

                </div>
                <div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
                    <img src="{{url('/frontend/img/illus-devices.png')}}" class="img-responsive" alt="feature img">
                </div>
            </div>
        </div>
    </section>
    <!-- about-exams -->


@endsection
