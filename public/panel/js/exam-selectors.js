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
                        // console.log(response.item);
                        // console.log(response.item);
                        // $('#exams_view').html("");
                        $('#selectors_div').html(response.item);
                        $('#exams_view').html(response.item);
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

    $(".like-exam").on('click',function(e) {
        var exam_id= $(this).attr('data-id');
        var type= $(this).attr('data-type');
        e.preventDefault();
        if(exam_id){
            $.ajax({
                type: "get",
                url: '/public/storelike/'+exam_id+'/'+type,
                data: {
                    access_token: $("#access_token").val()
                },
                success: function(response) {
                    if(response.status)
                    {
                        $('#rating-positive-number_'+exam_id).text(response.like);
                        $('#rating-negative-number_'+exam_id).text(response.dislike);

                    }
                }
            });

        }

    });

    $(".like-btn").on('click',function(e) {

        var exam_id= $(".exam_id").val();
        // alert(exam_id);
        console.log(exam_id);
        e.preventDefault();
        if(exam_id){
            $.ajax({
                type: "get",
                url: '/public/storelike/'+exam_id+'/1',
                data: {
                    id: $(this).val(), // < note use of 'this' here
                    access_token: $("#access_token").val()
                },
                success: function(response) {
                    if(response.status)
                    {
                        //$('#sidebar').html(response.like);
                        //let like = parseInt($('.rating-positive-number').text())+1;
                        $('.rating-positive-number').text(response.like);
                        $('.rating-negative-number').text(response.dislike);

                        // console.log(response);
                    }
                }
            });

        }

    });


    $(".dislike-btn").on('click',function(e) {
        var exam_id= $(".exam_id").val();
        console.log(exam_id);
        e.preventDefault();
        if(exam_id){
            $.ajax({
                type: "get",
                url: '/public/storelike/'+exam_id+'/0',

                success: function(response) {
                    if(response.status)
                    {
                        // alert('ok');
                        //let dislike = parseInt($('.rating-negative-number').text());
                        $('.rating-positive-number').text(response.like);
                        $('.rating-negative-number').text(response.dislike);

                    }
                }
            });

        }

    });
});




function copyMe(item) {
    /* Get the text field */
    var copyText = document.getElementById(item);
    /* Select the text field */
    copyText.select();

    /* Copy the text inside the text field */
    document.execCommand("copy");
    alert('Copied');
}
