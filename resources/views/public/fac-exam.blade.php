{{--<div class="frm-section colm colm3">--}}

    {{--<label class="search-filter-label "  >Department filter</label>--}}

    {{--<label class="field">--}}
        {{--<input class="uit-input" placeholder="search for your Department" type="text">--}}
    {{--</label>--}}
{{--</div>--}}

<div class="frm-section colm colm3">

    <label class="search-filter-label "  >Department filter</label>

    <label class="field uit-select">

            <select name="select2" class="form-control" id="department_id"  name="department_id" data-placeholder="Department filter" required>
            <option selected="selected" value="">Select your Department</option>
                <select class="form-control" id="department_id"  name="department_id" data-placeholder="إختيار الكليه" required>
                    <option disabled selected hidden>إختيار القسم</option>
                    @if(isset($department) && $department->count() > 0)

                        @foreach($department as $item)

                            <option value="{{$item->id}}" >{{get_text_locale($item,'name_ar')}}</option>
                        @endforeach
                    @endif
                </select>
        </select>
        <i class="select-arrow"></i>
    </label>
</div>

<div class="frm-section colm colm3">

    <label class="search-filter-label "  >level filter</label>

    <label class="field uit-select">
        <select class="form-control" id="class_id"  name="class_id" data-placeholder="Level Filter" required>
            <option selected="selected" value="">Select your level</option>
            @if(isset($classes) && $classes->count() > 0)
                @foreach($classes as $item)
                    <option value="{{$item->id}}" @if($item->id == request('class_id'))selected @endif >{{get_text_locale($item,'name_ar')}}</option>
                @endforeach
            @endif
        </select>
        <i class="select-arrow"></i>
    </label>
</div>

<div class="frm-section colm colm3">

    <label class="search-filter-label "  >year filter</label>

    <label class="field uit-select">
        <select name="select2">
            <option selected="selected" value="">Select year</option>
            <option value="1"> Select option 1 </option>
            <option value="2"> Select option 2 </option>
            <option value="3"> Select option 3 </option>
            <option value="4"> Select option 4 </option>
            <option value="5"> Select option 5 </option>
        </select>
        <i class="select-arrow"></i>
    </label>
</div>
