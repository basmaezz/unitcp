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
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">

                    <table id="exam-table" class="table table-bordered table-hover" data-name="cool-table">
                        <caption class="bottom">
                            <a  title="Edit" style="margin-right: 10px"  href="{{route('units.exam.create')}}"  class="btn btn-primary" > <i class="fa fa-plus icon-btn-margin"></i> اضافه جديد </a>

                        </caption>
                        <thead>
                        <tr>
                            <th  width="5%">#</th>
                            <th width="15%">الأسم</th>

                            <th width="15%">تاريخ الإضافة</th>
                            <th width="25%">#</th>

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
            $(document).ready(function()
            {
                $(document).on('change','.faculty',function () {
                    var facultyId = $('.faculty option:selected').val();
                    // alert(facultyId);
                    if(facultyId) {
                        $.ajax({
                            url: '/admin/exam/all/data?faculty_id='+facultyId,
                            type:"GET",
                            dataType:"json",
                            success:function(response) {
                                if(response.status)
                                {
                                    // alert('ok');
                                    tbl.ajax.reload();
                                    // $('#exams_div').html(response.item);
                                }
                            },
                        });
                    } else {
                        // $('select[name="classes"]').empty();
                    }
                });
                $(document).on('click', '.pagination a', function (e) {
                    e.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    if(page !== undefined && page !== ''){
                        $('#page').val(page);
                    }
                    $('#faculty_exam').submit();
                });
            });
            // $('#faculty_selector').on('change',function (event) {
            //     event.preventDefault();
            //     $('#faculty_exam').submit();
            // });
            // $(document).on('click', '.pagination a', function (e) {
            //     e.preventDefault();
            //     var page = $(this).attr('href').split('page=')[1];
            //     if(page !== undefined && page !== ''){
            //         $('#page').val(page);
            //     }
            //     $('#faculty_exam').submit();
            // });
            var url = '{{route('units.fac-exam.all.data')}}';
            var tbl ;
            jQuery(document).ready(function () {
                tbl = $('#exam-table').DataTable({
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
                        {data: 'id', name: 'id'},
                        // {data: 'file', name: 'file'},
                        {data: 'fullName', name: 'fullName'},
                        {data: 'created_at', name: 'created_at'},
                        // {data: getFullName(), name: 'created_at'},
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
                    swal({
                        title: '<span class="info">هل أنت متأكد من حذف العنصر المحدد ؟</span>',
                        type: 'info',
                        showCloseButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'حذف',
                        cancelButtonText: 'إغلاق',
                        confirmButtonColor: '#56ace0',
                        width: '450px'
                    }).then(function (value) {
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
                    });
                });
            });
        </script>
    @endpush
@stop