$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $('#logout').on('click', function () {
        var url = $(this).data('link');
        $.ajax({
            url: url,
            type: 'POST',
            success: function (response) {
                window.location = '/'+window.lang+'/admin';
            }
        });
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

});


