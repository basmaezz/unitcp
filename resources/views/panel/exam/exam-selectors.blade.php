<fieldset class="form-group">
    <label>اسم الفرقه </label>
    <select class="form-control" id="class_id"  name="class_id" data-placeholder="إختيار الكليه" required>
        <option disabled selected hidden>اختيار الفرقه</option>
        @if(isset($classes) && $classes->count() > 0)
            @foreach($classes as $item)


                <option value="{{$item->id}}" @if($item->id == request('class_id'))selected @endif >{{get_text_locale($item,'name_ar')}}</option>
            @endforeach
        @endif
    </select>
</fieldset>


<fieldset class="form-group">
    <label>اسم القسم </label>
    <select class="form-control" id="department_id"  name="department_id" data-placeholder="إختيار الكليه" required>
        <option disabled selected hidden>إختيار القسم</option>
        @if(isset($department) && $department->count() > 0)
            @foreach($department as $item)

                <option value="{{$item->id}}" >{{get_text_locale($item,'name_ar')}}</option>
            @endforeach
        @endif
    </select>
</fieldset>


<fieldset class="form-group">
    <label>اسم الترم </label>
    <select class="form-control" id="semester_id" name="semester_id" data-placeholder="إختيار الكليه" required>
        <option disabled selected hidden>إختيار الترم</option>
        @if(isset( $semesters) && $semesters->count() > 0)
            @foreach($semesters as $item)

                <option value="{{$item->id}}" >{{get_text_locale($item,'name_ar')}}</option>
            @endforeach
        @endif
    </select>
</fieldset>

<fieldset class="form-group">
    <label>اسم الماده </label>
    <select class="form-control" id="material_id " name="material_id" data-placeholder="إختيار الكليه" required>
        <option disabled selected hidden>إختيار الترم</option>
        @if(isset($materials) && $materials->count() > 0)

            @foreach($materials as $item)

                <option value="{{$item->id}}" >{{get_text_locale($item,'name_ar')}}</option>
            @endforeach
        @endif
    </select>
</fieldset>


<fieldset class="form-group">
    <label>اختر السنه </label>
    <select class="form-control" id="year_id" name="year_id" data-placeholder="إختيار السنه" required>
        <option disabled selected hidden>إختر السنه</option>
        @if(isset($year) && $year->count() > 0)
            @foreach($year as $item)

                <option value="{{$item->id}}" >{{get_text_locale($item,'name')}}</option>
            @endforeach
        @endif
    </select>
</fieldset>