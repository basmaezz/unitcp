$(document).ready(function() {

    $('select[name="faculty"]').on('change', function(){

        var facultyId = $(this).val();
        // alert(facultyId);
        if(facultyId) {
            $.ajax({
                url: '/admin/exam/create/getExamData/'+facultyId,
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
        }
    });
});


$(document).ready(function() {

    $('select[name="search-faculty"]').on('change', function(){

        var facultyId = $(this).val();
        // alert(facultyId);
        if(facultyId) {
            $.ajax({
                url: '/public/getsearchExamData/'+facultyId,
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
        }
    });
});

