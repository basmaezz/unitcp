$(document).ready(function() {

    $('select[name="faculty_id"]').on('change', function(){

        // alert('test');
        var facultyId = $(this).val();
        // alert(facultyId);
        if(facultyId) {
            $.ajax({
                url: 'create/getData/'+facultyId,
                type:"GET",
                dataType:"json",
                success:function(response) {
                    if(response.status)
                    {
                      // alert('ok');
                        $('#selectors_div').html(response.item);
                    }
                },

            });
        } else {
            // $('select[name="classes"]').empty();
        }

    });

});


