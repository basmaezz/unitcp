@extends('public.layouts.app')
@section('content')
    <section class="section">

        @foreach($data as $item )
            {{$item->name_ar}}
        @endforeach



    </section>
    @endsection