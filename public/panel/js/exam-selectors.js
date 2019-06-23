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

    $('select[name="search-faculty"]').on('change', function(){

        var facultyId = $(this).val();
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
                        $('#exams_view').html(response.exams);
                        $('#pag_view').html(response.paginate);
                    }
                },

            });
        }
    });
    var deId;
    $(document).on('change', 'select[name="de_id"]', function(){
        deId = $(this).val();
        console.log('on');
        console.log(deId);
        if(deId) {
            $.ajax({
                url: '/public/searchExams/'+deId,
                type:"GET",
                dataType:"json",
                success:function(response) {
                    if(response.status)
                    {
                        // alert('ok');
                        console.log(response);
                        $('#exams_view').html(response.exams);
                    }
                },

            });
        }
    });
    var classId;
    $(document).on('change', 'select[name="class_id"]', function(){
        classId = $(this).val();
        console.log(deId);
        console.log(classId);
        if(classId) {
            $.ajax({
                url: '/public/searchExams/'+deId+'/'+classId,
                type:"GET",
                dataType:"json",
                success:function(response) {
                    if(response.status)
                    {
                        // alert('ok');
                        console.log(response);
                        $('#exams_view').html(response.exams);
                    }
                },

            });
        }
    });
    var yearId;
    $(document).on('change', 'select[name="year_id"]', function(){
        yearId = $(this).val();
        console.log(deId);
        console.log(classId);
        console.log(yearId);
        if(yearId) {
            $.ajax({
                url: '/public/searchExams/'+deId+'/'+classId+'/'+yearId,
                type:"GET",
                dataType:"json",
                success:function(response) {
                    if(response.status)
                    {
                        // alert('ok');
                        console.log(response);
                        $('#exams_view').html(response.exams);
                    }
                },

            });
        }
    });


//   Like && DisLike

    $(".like-btn").click(function(e) {
        var exam_id= $(".exam_id").val();
        console.log(exam_id);
        e.preventDefault();
        if(exam_id){
            $.ajax({
                type: "get",
                url: '/public/storelike/'+exam_id,
                data: {
                    id: $(this).val(), // < note use of 'this' here
                    access_token: $("#access_token").val()
                },
                success: function(response) {
                    if(response.status)
                    {
                        // alert('ok');
                        console.log(response);

                    }
                }
            });

        }

    });


    $(".dislike-btn").click(function(e) {
        var exam_id= $(".exam_id").val();
        console.log(exam_id);
        e.preventDefault();
        if(exam_id){
            $.ajax({
                type: "get",
                url: '/public/dislike/'+exam_id,

                success: function(response) {
                    if(response.status)
                    {
                        alert('ok');
                        console.log(response);

                    }
                }
            });

        }

    });





});





