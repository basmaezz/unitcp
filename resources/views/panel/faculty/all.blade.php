@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'عرض الكليات','link'=> '#']));
    array_push($breadcrumb_array,collect(['is_last'=>false,'name'=>'الكليات','link'=> route('panel.faculty.all')]));
@endphp
@extends('panel.layouts.index',['sub_title'=>'الكليات' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/plugins/datatables/css/dataTables.bootstrap.min.css') !!}
        <style>
            .modal.fade {
                opacity: 1;
            }
            .modal.fade .modal-dialog {
                -webkit-transform: translate(0);
                -moz-transform: translate(0);
                transform: translate(0);
            }
        </style>
    @endpush
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="faculty_table" class="table table-bordered table-hover" data-name="cool-table">
                        <caption class="bottom">
                            <button data-toggle="modal" data-target="#edit_modal" class="btn btn-default">إضافة جديد
                                <i class="fa fa-plus icon-btn-margin"></i>
                            </button>
                        </caption>
                        <thead>
                        <tr>
                            <th class="text-center" width="5%">#</th>
                            <th class="text-center" width="20%">الاسم</th>
                            <th class="text-center" width="20%">الاسم باللغة الإنجليزية</th>
                            <th class="text-center" width="10%">الفاعليه</th>
                            {{--<th class="text-center" width="20%">تاريخ الإضافة</th>--}}
                            <th class="text-center" width="20%">عدد الأمتحانات</th>
                            <th class="text-center" width="20%"></th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-class" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        {!! Form::open(['id'=>'form','url'=>admin_url('faculty/')]) !!}
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">اضافه كليه جديده</h5>
                    <button type="button" class="close pull-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="loader" class="text-center hidden">
                        <i style="color: #1183e1;margin-top: 100px;margin-bottom: 100px" class="fa fa-spinner fa-spin fa-2x fa-fw"></i>
                    </div>

                    <div id="modal_body" class="row">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="icon" id="photo">
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label class="col-md-4" for="text">الاسم</label>
                                <input class="form-control col-md-8" id="name_ar" type="text" name="name_ar" placeholder="الرجاء ادخال الاسم" required>
                            </fieldset>

                            <fieldset class="form-group">
                                <label class="col-md-4" for="text">الاسم باللغه الانجليزيه</label>
                                <input class="form-control col-md-8" id="name_en" type="text" name="name_en" placeholder="الرجاء ادخال الاسم باللغه الانجلييه" required>
                            </fieldset>

                            <fieldset class="form-group">
                                <label class="col-md-4" for="">الفاعليه</label>
                                <select class="form-control col-md-8" name="active" data-placeholder="إختيار التصنيف" >
                                    <option disabled selected hidden>اختيار الحاله</option>
                                    <option value="1" name="active">فعاله</option>
                                    <option value="0" name="active">موقوفه</option>
                                </select>
                            </fieldset>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">  <i class="fa fa-save"></i> &nbsp; حفظ &nbsp; <i style="top: inherit;left: AUTO;" class="upload-spinn fa fa-cog fa-spin fa-1x fa-fw  hidden"></i> </button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>



    @push('panel_js')
        {!! HTML::script(panel_url('plugins/datatables/jquery.dataTables.min.js')) !!}
        {!! HTML::script(panel_url('plugins/datatables/dataTables.bootstrap.min.js')) !!}
        <script>
            var url = '{{route('panel.faculty.all.data')}}';
            var tbl = $('#faculty_table').DataTable({
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
                    {data: 'name_ar', name: 'name_ar'},
                    {data: 'name_en', name: 'name_en'},
                    {data: 'active', name: 'active'},
                    // {data: 'created_at', name: 'created_at'},
                    {data: 'exam_count', name: 'exam_count'},
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
            jQuery(document).ready(function () {
                var form = $('#form');
                var base_url = form.attr('action');
                form.validate({
                    highlight: function (element) {
                        jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                    },
                    success: function (element) {
                        jQuery(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                    },
                    submitHandler: function (f, e) {
                        $('.upload-spinn').removeClass('hidden');
                        var formData = new FormData(form[0]);
                        var form_url =  (constant_id.val() !== undefined && constant_id.val() !== '') ?   base_url+'/edit/'+constant_id.val() :  form_url = base_url+'/create';
                        $.ajax({
                            url: form_url,
                            method: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                $('.upload-spinn').addClass('hidden');
                                if (response.status) {
                                    customSweetAlert(
                                        'success',
                                        response.message,
                                        response.item,
                                        function (event) {
                                            tbl.ajax.reload();
                                            modal.modal('hide');
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
                            error: function (jqXhr) {
                                $('.upload-spinn').addClass('hidden');
                                getErrors(jqXhr, '/'+window.lang+'/admin/login');
                            }
                        })
                    }
                });
                var id;
                var loader = $('#loader');
                var name_ar = $('#name_ar');
                var name_en = $('#name_en');
                var active = $('#active');
                var constant_id = $('#id');
                var modal_body = $('#modal_body');
                var modal = $('#edit_modal');
                $(document).on('click', '.edit', function (event) {
                    constant_id.val($(this).data('id'));
                    if (constant_id.val() !== undefined && constant_id.val() !== '') {
                        modal_body.addClass('hidden');
                        loader.removeClass('hidden');
                        $.ajax({
                            url: base_url + '/data/' + constant_id.val(),
                            method: 'GET',
                            type: 'json',
                            success: function (response) {
                                if (response.status) {
                                    loader.addClass('hidden');
                                    modal_body.removeClass('hidden');
                                    name_ar.val(response.item.name_ar);
                                    name_en.val(response.item.name_en);
                                    active.val(response.item.active);
                                    constant_id.val(response.item.id);
                                }
                            },
                            error: function (response) {
                                modal.hide();
                            }
                        });
                    }
                    event.preventDefault();
                });
                modal.on('hidden.bs.modal', function (e) {
                    name_ar.val('');
                    name_en.val('');
                    constant_id.val('');
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
                // $(document).on('click', '.delete', function (event) {
                //     var delete_url = $(this).data('url');
                //     event.preventDefault();
                //     swal({
                //         title: '<span class="info">هل أنت متأكد من حذف العنصر المحدد ؟</span>',
                //         type: 'info',
                //         showCloseButton: true,
                //         showCancelButton: true,
                //         confirmButtonText: 'حذف',
                //         cancelButtonText: 'إغلاق',
                //         confirmButtonColor: '#56ace0',
                //         width: '450px'
                //     }).then(function (value) {
                //         $.ajax({
                //             url: delete_url,
                //             method: 'delete',
                //             type: 'json',
                //             success: function (response) {
                //                 if (response.status) {
                //                     customSweetAlert(
                //                         'success',
                //                         response.message,
                //                         response.item,
                //                         function (event) {
                //                             tbl.ajax.reload();
                //                         }
                //                     );
                //                 } else {
                //                     customSweetAlert(
                //                         'error',
                //                         response.message,
                //                         response.errors_object
                //                     );
                //                 }
                //             },
                //             error: function (response) {
                //                 $('.upload-spinn').addClass('hidden');
                //                 errorCustomSweet();
                //             }
                //         });
                //     });
                // });
            });
        </script>
    @endpush
@stop
