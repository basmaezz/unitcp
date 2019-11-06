<fieldset class="form-group">
    <label>اسم الفرقه </label><span><font color="red">*</font></span>
    <select class="form-control" select name="class_id" data-placeholder="إختيار الفرقه" required >
        <option disabled selected hidden>اختيار الفرقه</option>
        @if(isset($classes) && $classes->count() > 0)
            @foreach($classes as $item)
                  <option value="{{$item->id}}" >{{$item->name_ar}}</option>
            @endforeach
        @endif
    </select>
</fieldset>


<fieldset class="form-group">
    <label>اسم القسم </label><span><font color="red">*</font></span>
    <select class="form-control"  name="department_id" data-placeholder="إختيار القسم" required>
        <option disabled selected hidden>إختيار القسم</option>
        @if(isset($department) && $department->count() > 0)
            @foreach($department as $item)
                <option value="{{$item->id}}" >{{$item->name_ar}}</option>
            @endforeach
        @endif
    </select>
</fieldset>


<fieldset class="form-group">
    <label>اسم الترم </label><span><font color="red">*</font></span>
    <select class="form-control" select name="semester_id" data-placeholder="إختيار الترم" required>
        <option disabled selected hidden>إختيار الترم</option>
        @if(isset( $semesters) && $semesters->count() > 0)
            @foreach($semesters as $item)
                <option value="{{$item->id}}" >{{$item->name_ar}}</option>
            @endforeach
        @endif
    </select>
</fieldset>

