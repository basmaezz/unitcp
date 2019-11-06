<fieldset class="form-group">
    <label>اسم الفرقه </label><span><font color="red">*</font></span>
    <select class="form-control" id="class_id"  name="class_id" data-placeholder="إختيار الفرقه" required>
        <option disabled selected hidden>اختيار الفرقه</option>
        @if(isset($classes) && $classes->count() > 0)
            @foreach($classes as $item)


                {{--<option value="{{$item->id}}" @if($item->id == request('class_id'))selected @endif >{{get_text_locale($item,'name_ar')}}</option>--}}
                <option value="{{$item->id}}" @if($item->id == request('class_id'))selected @endif >{{$item->name_ar}}</option>
            @endforeach
        @endif
    </select>
</fieldset>


<fieldset class="form-group">
    <label>اسم القسم </label><span><font color="red">*</font></span>
    <select class="form-control" id="department_id"  name="department_id" data-placeholder="إختيار القسم" required>
        <option disabled selected hidden>إختيار القسم</option>
        @if(isset($department) && $department->count() > 0)
            @foreach($department as $item)

                {{--<option value="{{$item->id}}" >{{get_text_locale($item,'name_ar')}}</option>--}}
                <option value="{{$item->id}}" >{{$item->name_ar}}</option>
            @endforeach
        @endif
    </select>
</fieldset>


<fieldset class="form-group">
    <label>اسم الترم </label><span><font color="red">*</font></span>
    <select class="form-control" id="semester_id" name="semester_id" data-placeholder="إختيار الفصل الدراسى" required>
        <option disabled selected hidden>إختيار الفصل الدراسى</option>
        @if(isset( $semesters) && $semesters->count() > 0)
            @foreach($semesters as $item)

                <option value="{{$item->id}}" >{{$item->name_ar}}</option>
            @endforeach
        @endif
    </select>
</fieldset>

<fieldset class="form-group">
    <label>اسم الماده </label><span><font color="red">*</font></span>
    <select class="form-control" id="material_id " name="material_id" data-placeholder="إختيار الماده" required>
        <option disabled selected hidden>إختيار الماده</option>
        @if(isset($materials) && $materials->count() > 0)

            @foreach($materials as $item)

                <option value="{{$item->id}}" >{{$item->name_ar}}</option>
            @endforeach
        @endif
    </select>
</fieldset>


<fieldset class="form-group">
    <label>اختر السنه </label><span><font color="red">*</font></span>
    <select class="form-control" id="year_id" name="year_id" data-placeholder="إختيار السنه" required>
        <option disabled selected hidden>إختر السنه</option>
        @if(isset($year) && $year->count() > 0)
            @foreach($year as $item)

                <option value="{{$item->id}}" >{{$item->name}}</option>
            @endforeach
        @endif
    </select>
</fieldset>

{{--<fieldset class="form-group">--}}
    {{--<label>اختر التاج </label>--}}
    {{--<div class="input-group select2-bootstrap-append">--}}
        {{--<select id="multi-append" class="form-control select2" multiple name="tags[]">--}}
        {{--<option disabled selected hidden>إختر التاج</option>--}}
        {{--@if(isset($tag) && $tag->count() > 0)--}}
            {{--@foreach($tag as $item)--}}
                {{--<option value="{{$item->id}}" >{{get_text_locale($item,'name_ar')}}</option>--}}
            {{--@endforeach--}}
        {{--@endif--}}
    {{--</select>--}}
        {{--<span class="input-group-btn">--}}
               {{--<button class="btn btn-default" type="button" data-select2-open="multi-append">--}}
               {{--<span class="glyphicon glyphicon-search"></span>--}}
                {{--</button>--}}
             {{--</span>--}}
     {{--</div>--}}
{{--</fieldset>--}}

