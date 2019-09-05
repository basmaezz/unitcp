@php
   $admin = auth()->user();
@endphp

<header class="main-header">
    <meta charset="utf-8">
    <!-- Logo -->
    <a href="#" class="logo blue-bg">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="" alt=""></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="/panel/img/assistlogo.jpeg" style="margin-left: 10px;" alt=""></span> </a>
    {{--/*********Meta Tag For Upload */--}}
       <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Header Navbar -->
    <nav class="navbar blue-bg navbar-static-top">
        <!-- Sidebar toggle button-->
        <ul class="nav navbar-nav pull-left">
            <li><a class="sidebar-toggle" data-toggle="push-menu" href="#"></a> </li>
        </ul>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages -->

                <li> <a href="{{route('panel.users.profile',auth()->id())}}" data-toggle="control-sidebar"><i class="/frontend "></i></a> </li>
            </ul>
        </div>
    </nav>



    @push('panel_js')
        {!! HTML::script(panel_url('plugins/datatables/jquery.dataTables.min.js')) !!}
        {!! HTML::script(panel_url('plugins/datatables/dataTables.bootstrap.min.js')) !!}

        <script>
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
        </script>

</header>

