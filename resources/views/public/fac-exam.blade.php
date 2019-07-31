<?php $lang=app()->getLocale(); ?>

<div class="frm-section colm colm3">

    <label class="search-filter-label "  >@lang('exam.Department filter')</label>

    <label class="field uit-select">
        <select class="form-control" id="de_id"  name="de_id" data-placeholder="Level Filter" required>
            <option selected="selected" value="">@lang('exam.Select your Department')</option>
            @if(isset($department) && $department->count() > 0)
                @foreach($department as $item)
                    <option value="{{$item->id}}" @if($item->id == request('class_id'))selected @endif >{{get_text_locale($item,'name_'.$lang)}}</option>
                @endforeach
            @endif
        </select>
        <i class="select-arrow"></i>
    </label>
</div>



<div class="frm-section colm colm3">

    <label class="search-filter-label "  >@lang('exam.level filter')</label>

    <label class="field uit-select">
        <select class="form-control" id="class_id"  name="class_id" data-placeholder="Level Filter" required>
            <option selected="selected" value="">@lang('exam.Select your level')</option>
            @if(isset($classes) && $classes->count() > 0)
                @foreach($classes as $item)
                    <option value="{{$item->id}}" @if($item->id == request('class_id'))selected @endif >{{get_text_locale($item,"name_{$lang}")}}</option>
                @endforeach
            @endif
        </select>
        <i class="select-arrow"></i>
    </label>


</div>

<div class="frm-section colm colm3">

    <label class="search-filter-label "  >@lang('exam.year filter')</label>

    <label class="field uit-select">
        <select name="year_id" id="year_id">
            <option selected="selected" value="">@lang('exam.Select year')</option>
            @if(isset($year) && $year->count() > 0)
                @foreach($year as $item)

                    <option value="{{$item->id}}" >{{get_text_locale($item,'name')}}</option>
                @endforeach
                @endif
        </select>
        <i class="select-arrow"></i>
    </label>
</div>
