<html>
<head>
    <title>Title</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>


    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />

    <style>
        header {
            padding: 40px 0 31px;
            border-bottom: 1px solid #e0e0e0;
        }
        body {
            font-size: 15px;
            color: #5D5D5D;
            background-color: #fff;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            font-family: 'Open Sans',sans-serif;
        }
        .no-padding {
            padding: 0;
        }
        header .logo-holder .logo {
            margin: 17px 0;
        }
        header .top-search-holder {
            margin: 0 0 0 -20px;
        }
        header .top-search-holder .contact-row {
            font-size: 14px;
            line-height: 20px;
            min-height: 21px;
        }
        header .top-search-holder .contact-row .phone {
            margin: 0 10px 0 0;
        }
        header .top-search-holder .contact-row i {
            color: #59B210;
            vertical-align: middle;
            margin: 0 8px 0 0;
            font-size: 23px;
            line-height: 23px;
        }
        .mc-search-bar {
            border: 3px solid #5cb210;
            border-radius: 7px;
            margin: 8px 0 0;
            width: 100%;
        }
        select#product_cat {
            display: inline-block;
            margin: 0;
            height: 47px;
            border: 0;
            background-color: transparent;
        }
        .input-group {
            position: relative;
            display: table;
            border-collapse: separate;
        }
        .screen-reader-text {
            position: absolute;
            width: 1px;
            height: 1px;
            margin: -1px;
            padding: 0;
            overflow: hidden;
            clip: rect(0,0,0,0);
            border: 0;
        }
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0,0,0,0);
            border: 0;
        }
        label {
            display: inline-block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: 700;
        }
        .twitter-typeahead {
            z-index: 1051;
            width: 100%;
        }
        .mc-search-bar .search-field {
            padding: 13px;
            border: none;
            width: 100%;
        }
        .tt-hint {
            color: #999;
        }
        .mc-search-bar .search-field {
            padding: 13px;
            border: none;
            width: 100%;
        }
        .mc-search-bar .input-group-addon.has-categories-dropdown {
            border-left: 1px solid #e0e0e0;
        }
        .mc-search-bar .input-group-addon {
            background-color: transparent;
            border: none;
            padding: 0 0 0 10px;
            text-align: left;
        }
        .input-group-addon:last-child {
            border-left: 0;
        }
        .mc-search-bar .button {
            border: none;
            padding: 18px 17px;
            margin: -1px -3px -2px 0px;
            border-radius: 0 10px 10px 0;
            background: #59B210;
            position: relative;
        }
        .top-cart-row-container>div{
            display:inline-block;
        }
        header .top-cart-row {
            padding: 35px 0 0 21px;
        }
        header .top-cart-row .wishlist-compare-holder {
            line-height: 24px;
            margin: 0 18px 0 0;
            font-size: 13px;
        }
        header .top-cart-row .wishlist-compare-holder a {
            color: #3D3D3D;
        }
        header .top-cart-row .top-cart-holder .dropdown-toggle {
            display: block;
            padding: 0;
        }
        header .top-cart-row .top-cart-holder .dropdown-menu {
            width: 332px;
            left: -170px;
            top: 65px;
            padding: 16px 0 0;
        }
        .dropdown .dropdown-menu {
            border-top-color: #59B210;
        }
        .dropdown .dropdown-menu {
            border-radius: 0;.
        top: 120% !important;
        }
        span.cart-items-count.count {
            position: relative;
            left: 35px;
            top: -7px;
        }
    </style>



</head>
<body>

<header class="header-style-1">
    <div class="header-content">
        <div class="container no-padding">
            <div class="col-xs-12 col-md-3 logo-holder">
            </div>
            <div class="col-xs-12 col-md-6 top-search-holder no-margin">

                <fieldset class="form-group">
                    <label>اسم الكليه </label>
                    <select class="form-control fSearch" name="fSearch" data-placeholder="إختيار الكليه" id="faculty_id" required>
                        <option disabled selected hidden>إختيار الكليه</option>

                            @foreach($faculty as $item)
                                <option value="{{$item->id}}" >{{get_text_locale($item,'name_ar')}}</option>
                            @endforeach

                    </select>
                </fieldset>

                {{--<div class="mc-search-bar">--}}
                    {{--<form role="search" method="get" action="https://demo2.chethemes.com/mediacenter/">--}}
                        {{--<div class="input-group">--}}
                            {{--<label class="sr-only screen-reader-text" for="s">Search for:</label>--}}
                            {{--<input type="text" class="search-field" dir="ltr" value="" name="s" placeholder="Search for products" />--}}
                            {{--<div class="input-group-addon has-categories-dropdown">--}}
                                {{--<div class="btn-group show-on-hover ">--}}
                                    {{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">--}}
                                        {{--Action <span class="caret"></span>--}}
                                    {{--</button>--}}
                                    {{--<ul class="dropdown-menu" role="fSearch">--}}
                                        {{--<li><a href="#">Select Faculty</a></li>--}}
                                        {{--@foreach($faculty as $item)--}}
                                        {{--<li><a href="#">{{$item->name_ar}}</a></li>--}}
                                        {{--@endforeach--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<button class="button" type="submit"><i class="fa fa-search"></i></button>--}}
                                {{--<input type="hidden" id="search-param" name="post_type" value="product" />--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            </div>

        </div>
    </div>

</header>

</body>
</html>

<script type="text/javascript">


    $(document).ready(function() {

        $('select[name="fSearch"]').on('change', function(){


            var facultyId = $(this).val();
            // alert(facultyId);
            if(facultyId) {
                $.ajax({
                    url: '/getdata/'+facultyId,
                    type:"GET",
                    dataType:"json",
                    success:function(response) {
                        if(response.status)
                        {
                            alert('ok');
                            // $('#selectors_div').html(response.item);
                        }
                    },

                });
            } else {
            }

        });
    });





</script>


