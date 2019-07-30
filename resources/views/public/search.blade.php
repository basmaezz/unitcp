@extends('public.layouts.app')
@section('content')
    <div class="search-page">
        <section class=" search-page__controls">
            <div class="container clearfix">



                <div class="search-page_input-wrapper">
                   <form action="{{route('panel.exam.search-s')}}">
                    <div class="search-bar search-bar-big">

                        <i class="fa fa-search search-bar__icon"></i>
                        <input type="search"  name="txtsearch" placeholder="Search for Exams" autofocus=""  spellcheck="true" value="{{$txtsearch}}">
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
                                                            <option selected="selected" value="">Select your faculty</option>
                                                            @foreach(get_fac_data() as $fac)

                                          <option value="{{ $fac->id }}" @if($fac->id == request('faculty') || $fac->id == request('id')) selected @endif>{{ $fac->name_ar }}</option>

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
                                                {{$exam->facultyexam->name_en}}
                                            </span></a><i class="fa fa-circle search-document-result__course-institution-separator"></i><span class="font-small">Mansoura University</span></div>
                                    <div class="search-document-result__meta font-extra-small text-gray">

                                            <span title="Upload date" class="ic-text">
                                                <i class="ic fa fa-cloud-upload"></i> {{date('F d, Y', strtotime($exam->created_at))}}</span></div>

                                </div>
                                <span class=" search-document-result__rating"><a href="{{url('public/storelike/'.$exam->id)}}"><i class="fa fa-thumbs-up">{{@$exam->likes_num}}</i></a></span>
                            </li>
                        @endforeach





                </ul>
                <div id="pag_view">

                </div>

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
