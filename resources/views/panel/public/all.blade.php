@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'مستودع الأمتحانات','link'=> ('panel.exam.all')]));
@endphp
@extends('panel.layouts.index',['sub_title'=>'مستودع الأمتحانات' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/plugins/datatables/css/dataTables.bootstrap.min.css') !!}
        <style>
            .input-sm{
                width: 288px !important;

            }
        </style>
    @endpush
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <div class="content">
        <div class="card">
            <div class="card-body">
                <td> <button title="Download" style="margin-right: 10px"  class="btn btn-primary show-btn" data-word="Show" > Advanced </button>
                    <form action="{{ route('searchexamx') }}" method="post" id="selectors_divone" class="hidden">
                        {{ @csrf_field() }}
                        <fieldset class="form-group">
                            <label>اسم الكليه </label>
                            <select class="form-control faculty" name="faculty" data-placeholder="إختيار الكليه" id="faculty_id" required>
                                <option disabled selected hidden>اختيار الكليه</option>
                                @foreach(get_fac_data() as $fac)
                                    <option value="{{ $fac->id }}" @if($fac->id == request('faculty') || $fac->id == request('id')) selected @endif>{{ $fac->name_ar }}</option>
                                @endforeach
                            </select>
                        </fieldset>
                        <div id="selectors_div">
                            @include('panel.exam.exam-selectors')
                        </div>
                <button title="Search" style="margin-right: 10px"  class="btn btn-success" type="submit" > Search </button>
                    </form>
                <div class="table-responsive">

                    <table id="exam-table" class="table table-bordered table-hover" data-name="cool-table">
                        <caption class="bottom">

                        </caption>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">اسم الامتحان</th>
                                <th scope="col">#</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($item->count() > 0)
                            @foreach($item as $key => $exam)
                            <tr>

                                <th scope="row">{{ $key +1 }}</th>
                                <td>{{ getFullNamearray($exam->faculty_id, $exam->class_id, $exam->material_id, $exam->semester_id, $exam->year_id) }}</td>
                                <td>
                                    <a title="Download" href="{{ url('storage/faculty/exams/'.$exam->files($exam->file)) }}" target="_blank" style="margin-right: 10px" data-id="{{ $exam->id }}"  class="btn btn-primary download" > تحميل </a>

                                    <div class="fb-share-button"
                                         data-href="{{ url('storage/faculty/exams/'.$exam->files($exam->file)) }}"
                                         data-layout="button_count">
                                    </div>

                                </td>

                            </tr>
                            @endforeach
                                @else
                                <tr>

                                    <th scope="row"></th>
                                    <td>{{'لم يتم العثور على نتائج'}}</td>
                                    <td></td>
                                    </td>

                                </tr>

                                @endif

                            </tbody>
                        </table>
                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('panel_js')
        {!! HTML::script(panel_url('plugins/datatables/jquery.dataTables.min.js')) !!}
        {!! HTML::script(panel_url('plugins/datatables/dataTables.bootstrap.min.js')) !!}


    <script>
        $(document).on('click', '.show-btn',function(){
            var lable = $('.show-btn').attr('data-word');
            if(lable == 'Hide') {
                $( "#selectors_divone" ).addClass( "hidden" );
                $('.show-btn').attr('data-word', 'Show');
            } else {
                $( "#selectors_divone" ).removeClass( "hidden" );
                $('.show-btn').attr('data-word', 'Hide');
            }

        });
        $(document).on('click', '.download', function() {
            id = $(this).attr('data-id');
            $.ajax({
                type: "post",
                url: "{{ route('downloadexamx') }}",
                data: {
                    "id"    : id,
                },
                success: function(data) {
                    console.log(data);


                }
            });
        });


    </script>
    @endpush


@stop