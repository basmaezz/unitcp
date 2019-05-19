@extends('public.layouts.app')
@section('content')
    <section class="section">

        {{$data['faculty']}}

        @foreach(($data['faculty']) as $item)
            {{$item->name_ar}}

            {{--<option value="{{$item->id}}" selected></option>--}}
        @endforeach

    </section>

@endsection
