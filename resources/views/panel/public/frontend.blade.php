@extends('panel.layouts.index')
@section('main')
    @push('panel_css')

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

        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="info-box">
                    <div class="col-12">
                        <h5>حدث مرفوعه</h5>
                        <div class="row m-t-2 m-b-2">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">الأمتحان</th>
                                    <th scope="col">#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($latest as $key => $last)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ getFullNamearray($last->faculty_id, $last->class_id, $last->material_id, $last->semester_id, $last->year_id) }}</td>

                                    <td>
                                        <a title="Download" href="{{ url('storage/faculty/exams/'.$last->files($last->file)) }}" target="_blank" style="margin-right: 10px" data-id="{{ $last->id }}"  class="btn btn-primary download" > تحميل </a>
                                        &nbsp;
                                        <div class="fb-share-button"
                                             data-href="{{ url('storage/faculty/exams/'.$last->files($last->file)) }}"
                                             data-layout="button_count">
                                        </div>

                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="earning"></div>
                </div>
            </div>

        </div>



        <div class="row">
            <div class="col-lg-12">
                <div class="info-box">
                    <div class="col-12">
                        <h5>الأكثر تحميلا</h5>
                        <div class="row m-t-2 m-b-2">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">الأمتحان</th>
                                    <th scope="col">#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($downloads as $key => $down)
                                    <tr>
                                        <th scope="row">{{ $key }}</th>
                                        <td>{{ getFullNamearray($down->faculty_id, $down->class_id, $down->material_id, $down->semester_id, $down->year_id) }}</td>

                                        <td>
                                            <a title="Download" href="{{ url('storage/faculty/exams/'.$down->file) }}" target="_blank" style="margin-right: 10px" data-id="{{ $down->id }}"  class="btn btn-primary download" > تحميل </a>
                                            &nbsp;
                                            <div class="fb-share-button"
                                                 data-href="{{ url('storage/faculty/exams/'.$down->file) }}"
                                                 data-layout="button_count">
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="earning"></div>
                </div>
            </div>

        </div>
        <!-- /.row -->


        </div>
        <!-- /.row -->
    </div>

    @push('panel_js')
    <script>
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