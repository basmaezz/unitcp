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
function chooseFile() {
    $("#fileInput").click();
}

// Function to preview image after validation
$(function() {
    $("#file").change(function() {
        $("#message").empty(); // To remove the previous error message
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
            $('#previewing').attr('src','noimage.png');
            $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
            return false;
        }
        else
        {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});
function imageIsLoaded(e) {
    $("#file").css("color","green");
    $('#image_preview').css("display", "block");
    $('#previewing').attr('src', e.target.result);
    $('#previewing').attr('width', '250px');
    $('#previewing').attr('height', '230px');
});
});