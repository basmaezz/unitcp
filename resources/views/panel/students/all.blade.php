@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'الطلاب','link'=> ('panel.users.all')]));
@endphp
@extends('panel.layouts.index',['sub_title'=>'الطلاب' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/plugins/datatables/css/dataTables.bootstrap.min.css') !!}
    @endpush
    @include('panel.flash-message')
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    @if(Session::has('status'))
                        <div class="text-success">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                    <table id="user-table" class="table table-bordered table-hover" data-name="cool-table">
                        <caption class="bottom">
                            <a  title="Edit" style="margin-right: 10px"  href="{{route('panel.students.createstudent')}}"  class="btn btn-primary" > <i class="fa fa-plus icon-btn-margin"></i> اضافه جديد </a>

                        </caption>
                        <thead>
                        <tr>
                            {{--<th  width="5%">#</th>--}}
                            <th width="15%">الأسم</th>
                            {{--<th width="15%">البريد الالكترونى </th>--}}
                            {{--<th width="15%">الحاله </th>--}}
                            <th width="15%">الكليه </th>
                            {{--<th width="15%">تاريخ الإضافة</th>--}}
                            <th width="25%">خيارات</th>

                        </tr>
                        </thead>
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
            var url = '{{route('panel.students.all.data')}}';
            jQuery(document).ready(function () {
                var tbl = $('#user-table').DataTable({
                    "columnDefs": [
                        {"orderable": false, targets: '_all'}
                    ],
                    language: {
                        "sSearch": " ",
                        "searchPlaceholder": "إبحث ",
                        "sProcessing": " جارٍ التحميل ... ",
                        "sLengthMenu": "أظهر _MENU_ مدخلات",
                        "sZeroRecords": "لم يعثر على أية سجلات",
                        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                        "sInfoPostFix": "",
                        "sUrl": "",
                        "oPaginate": {
                            "sFirst": "الأول",
                            "sPrevious": "السابق",
                            "sNext": "التالي",
                            "sLast": "الأخير"
                        }
                    },
                    "bSort": false,
                    "processing": true,
                    "serverSide": true,
                    "info": false,
                    "ajax": {
                        "url": url
                    },
                    "columns": [
                        // {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        // {data: 'email', name: 'email'},
                        // {data: 'active', name: 'active'},
                        {data: 'faculty_id', name: 'faculty_id'},
                        // {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action'}
                    ],
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            text: '',
                            className: 'hidden'
                        }
                    ],
                    "bLengthChange": true,
                    "bFilter": true,
                    "pageLength": 10
                });
                $(document).on('click', '.delete', function (event) {
                    var delete_url = $(this).data('url');
                    event.preventDefault();

                    if(delete_url){
                        $.ajax({
                            url: delete_url,
                            method: 'delete',
                            type: 'json',
                            success: function (response) {
                                if (response.status) {
                                    customSweetAlert(
                                        'success',
                                        response.message,
                                        response.item,
                                        function (event) {
                                            tbl.ajax.reload();
                                        }
                                    );
                                } else {
                                    customSweetAlert(
                                        'error',
                                        response.message,
                                        response.errors_object
                                    );
                                }
                            },
                            error: function (response) {
                                $('.upload-spinn').addClass('hidden');
                                errorCustomSweet();
                            }
                        });

                    }

                });
            });
        </script>
    @endpush
@stop