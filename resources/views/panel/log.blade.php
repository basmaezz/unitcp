@php
    $breadcrumb_array = [];
    array_push($breadcrumb_array,collect(['is_last'=>true,'name'=>'عرض السجلات','link'=> ('panel.classes.all')]));
@endphp
@extends('panel.layouts.index',['sub_title'=>'عرض السجلات' ,'breadcrumb_array'=> $breadcrumb_array])
@section('main')
    @push('panel_css')
        {!! HTML::style('panel/plugins/datatables/css/dataTables.bootstrap.min.css') !!}
    @endpush
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">

                    <table id="log-table" class="table table-striped table-bordered" style="width:100%" data-name="cool-table">

                        <thead>
                        <tr>
                            <th  width="5%">#</th>
                            <th  width="5%">المستخدم</th>
                            <th width="15%">السجل</th>
                            <th width="25%">#</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $key => $logs)
                            <tr>

                                <th scope="row">{{$key +1}}</th>
                                <td>{{$logs->who_users->name}}</td>
                                <td>{{$logs->what}}</td>
                                <td>{{$logs->created_at}}</td>
                            </tr>
                        @endforeach

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
            $(document).ready(function() {
                $('#log-table').DataTable();
            } );
        </script>
    @endpush
@stop