@extends('public.layouts.app')
@section('content')
    <?php $lang=app()->getLocale(); ?>


    <div class="search-page">
        <section class=" search-page__controls">
            <div class="container clearfix">

                <div class="search-page_input-wrapper">
                   <form action="{{route('panel.exam.search-s')}}">
                    <div class="search-bar search-bar-big">

                        <i class="fa fa-search search-bar__icon"></i>
                        <input type="search"  name="txtsearch" placeholder="@lang('exam.searchforexams')" autofocus=""  spellcheck="true" value="{{$txtsearch}}">
                    </div>
                   </form>
                </div>

                <div class="search-filter-bar__filters">
                    <div class="row">

                        <div class="goldenforms-pro">
                            <div class="goldenforms-wrapper">
                                <div class="goldenforms-container ">
                                    <form action="{{route('panel.exam.search-s')}}" method="post" id="gform-pro">

                                        <div class="frm-body">

                                            <div class="frm-row">

                                                <div class="frm-section colm colm3">

                                                    <label class="search-filter-label ">@lang('exam.Faculty filter')</label>

                                                    <label class="field uit-select">
                                                        <select class="form-control search-faculty" name="search-faculty" data-placeholder="إختيار الكليه" id="faculty_id" required>
                                                            <option selected="selected" value="">@lang('exam.Select your faculty')</option>
                                                            @foreach(get_fac_data() as $fac)
                                                                @if($lang=='ar')

                                          <option value="{{ $fac->id }}" @if($fac->id == request('faculty') || $fac->id == request('id')) selected @endif>{{ $fac->name_ar }}</option>
                                                            @else
                                         <option value="{{ $fac->id }}" @if($fac->id == request('faculty') || $fac->id == request('id')) selected @endif>{{ $fac->name_en }}</option>
                                                            @endif
                                                                    @endforeach
                                                        </select>
                                                        <i class="select-arrow"></i>
                                                    </label>
                                                </div>
                                                <div id="selectors_div">
                                                    @include('public.fac-exam')
                                                </div>

                                            </div>

                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                 </div>
                </div>
            </div>



        </section>

        <section class="container">
            <div class="search-page__results">
                <h1 class="search-page__title"> @lang('exam.Search Results')</h1>
                <div class="row"></div>
                <ul class="search-document-results list-unstyled" id="exams_view" >

                @if($item->count() > 0)
                        @foreach($item as $key => $exam)
                            <li class="row search-document-result flex" >
                                <div class="search-document-result__details"><a href="{{url('public/viewpdf/'.$exam->id)}}">
                                        <h3 class="search-document-result__title" >{{ getFullexamNamearray($exam->department_id, $exam->material_id,  $exam->year_id) }}</h3>
                                    </a>
                                    <div><a href="" class="search-document-result__course"><span >
                                                @if($lang=='ar')
                                                {{$exam->facultyexam->name_ar}}
                                                @else
                                                    {{$exam->facultyexam->name_en}}
                                                @endif

                                            </span></a><i class="fa fa-circle search-document-result__course-institution-separator"></i><span class="font-small">@lang('exam.Mansoura University')</span></div>
                                    <div class="search-document-result__meta font-extra-small text-gray">

                                            <span title="Upload date" class="ic-text">
                                                <i class="ic fa fa-cloud-upload"></i> {{date('F d, Y', strtotime($exam->created_at))}}</span></div>

                                </div>
                                @if (Auth::check())
                                <a href="javascript:void(0);" class="like-exam" data-id="{{$exam->id}}" data-type="1">
                                    <span class="search-document-result__rating"><i class="fa fa-thumbs-up"></i><span id="rating-positive-number_{{$exam->id}}">{{$exam->likes()->where('likenum',1)->count()}}</span></span>
                                </a>
                                <a href="javascript:void(0);" class="like-exam" data-id="{{$exam->id}}" data-type="0">
                                    <span class="search-document-result__rating"><i class="fa fa-thumbs-down"></i><span id="rating-negative-number_{{$exam->id}}">{{$exam->likes()->where('likenum',0)->count()}}</span></span>
                                </a>
                                    @else
                                    <a href="{{route('panel.login')}}"  >
                                        <span class="search-document-result__rating"><i class="fa fa-thumbs-up"></i>
                                            </span>
                                    </a>
                                    <a href="{{route('panel.login')}}">
                                        <span class="search-document-result__rating"><i class="fa fa-thumbs-down"></i>
                                           </span>
                                    </a>
                                @endif
                            </li>
                        @endforeach

                </ul>
                {!! $item->links() !!}

                {{--<div id="pag_view">--}}
                    {{--<nav class="pagination-wrapper" >--}}
                        {{--<ul class="pagination justify-content-end ">--}}
                            {{--<li class="page-item disabled">--}}
                                {{--<a class="page-link" href="#" tabindex="-1">Previous</a>--}}
                            {{--</li>--}}
                            {{--<li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                            {{--<li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                            {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                            {{--<li class="page-item">--}}
                                {{--<a class="page-link" href="#">Next</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</nav>--}}

                {{--</div>--}}

                @else

                <ul class="search-document-results  center" >
                    <li class="row search-document-result flex center" >
                        <div class="search-document-result__details "><a href="#">
                                <h3 class="search-document-result__title " >@lang('exam.no results')</h3>
                            </a>


                        </div>

                    </li>
                </ul>
                @endif
            </div>
        </section>


    </div>

@endsection
