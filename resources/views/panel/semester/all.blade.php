@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'عرض الكل','link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'الفصول الدراسيه','link'=> route('panel.faculty.all')]));
@endphp
@extends('panel.layouts.index',['sub_title'=>'الفصول الدراسيه' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/plugins/datatables/css/dataTables.bootstrap.min.css') !!}
    @endpush
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">

                    <table id="semester-table" class="table table-bordered table-hover" data-name="cool-table">
                        <caption class="bottom">
                            <a  title="Edit" style="margin-right: 10px"  href="{{route('panel.semester.create')}}"  class="btn btn-primary" > <i class="fa fa-plus icon-btn-margin"></i> اضافه جديد </a>

                            {{--<button  class="btn btn-default" onclick="window.open('panel.users.create')">إضافة جديد--}}
                            {{--<i class="fa fa-plus icon-btn-margin"></i>--}}
                            {{--</button>--}}
                        </caption>
                        <thead>
                        <tr>
                            {{--<th  width="5%">#</th>--}}
                            <th width="15%">الأسم</th>
                            <th width="15%">الاسم باللغه الأنجليزيه </th>
                            <th width="15%">الكليه </th>
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


    <!-- Modal form to edit a form -->
    <div id="editAdminModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_edit" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_edit" autofocus>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Name_En:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email_edit" >
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary  edit_semester_btn"  data-dismiss="modal">
                            <span class='glyphicon glyphicon-check'></span> Edit
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @push('panel_js')
        {!! HTML::script(panel_url('plugins/datatables/jquery.dataTables.min.js')) !!}
        {!! HTML::script(panel_url('plugins/datatables/dataTables.bootstrap.min.js')) !!}
        <script>
            var url = '{{route('panel.semester.all.data')}}';
            jQuery(document).ready(function () {
                var tbl = $('#semester-table').DataTable({
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
                        {data: 'name_ar', name: 'name_ar'},
                        {data: 'name_en', name: 'name_en'},
                        {data: 'faculty_id', name: 'faculty_id'},
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