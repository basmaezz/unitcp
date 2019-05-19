
<fieldset class="form-group">
    <label>اسم الفرقه </label>
    <select class="form-control" select name="class_id" data-placeholder="إختيار الفرقه" required>
        <option disabled selected hidden>اختيار الفرقه</option>
        @if(isset($data['classes']) && ($data['classes'])->count() > 0)
            @foreach(($data['classes']) as $item)
                <option value="{{$item->id}}" >{{get_text_locale($item,'name_ar')}}</option>
            @endforeach
        @endif
    </select>
</fieldset>


<fieldset class="form-group">
    <label>اسم القسم </label>
    <select class="form-control"  name="department_id" data-placeholder="إختيار القسم" required>
        <option disabled selected hidden>إختيار القسم</option>
        @if(isset($data['department']) && $data['department']->count() > 0)
            @foreach($data['department'] as $item)
                <option value="{{$item->id}}" >{{get_text_locale($item,'name_ar')}}</option>
            @endforeach
        @endif
    </select>
</fieldset>


<fieldset class="form-group">
    <label>اسم الترم </label>
    <select class="form-control" select name="semester_id" data-placeholder="إختيار الترم" required>
        <option disabled selected hidden>إختيار الترم</option>
        @if(isset( $data['semesters']) && $data['semesters']->count() > 0)
            @foreach($data['semesters'] as $item)
                <option value="{{$item->id}}" >{{get_text_locale($item,'name_ar')}}</option>
            @endforeach
        @endif
    </select>
</fieldset>

