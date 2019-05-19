@extends('public.layouts.app')
@section('content')

  <!-- Hover Row Table-->
  <section class="section-md bg-default">
    <div class="container">
      <div class="row justify-content-sm-center">
        <div class="col-md-10 col-xl-6 text-center">
          <h2>نتائج البحث</h2>
          <p class="big"></p>
        </div>
      </div>
    </div>
  </section>
<section class="section-md bg-default">
    <div class="container">
      <form class="rd-mailform rd-mailform-inline text-right" novalidate="novalidate">
        <div class="form-wrap form-wrap-validation">
            <select name="faculty" class="form-control" id="exampleFormControlSelect1">
            @foreach($all_fac as $fac)
                <option value="{{ $fac->id }}">{{$fac->name_en}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-wrap form-wrap-validation">
            <select class="form-control" id="exampleFormControlSelect1">
            @foreach($all_class as $class)
                <option value="{{$class->id}}">{{$class->name_en}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-wrap form-wrap-validation">
            <select class="form-control" id="exampleFormControlSelect1">
                @foreach($all_dep as $dep)
                    <option value="{{$dep->id}}">{{$dep->name_en}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-wrap form-wrap-validation">
            <select class="form-control" id="exampleFormControlSelect1">
                @foreach($all_mate as $mate)
                    <option value="{{$mate->id}}">{{$mate->name_en}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-wrap form-wrap-validation">
            <select class="form-control" id="exampleFormControlSelect1">
                @foreach($all_year as $year)
                    <option value="{{$year->id}}">{{$year->name}}</option>
                @endforeach
            </select>
        </div>
        <button class="button button-block button-primary" type="submit">Enter</button>
      </form>
    </div>
</section>
  <!-- Howered rows-->
  <section class="section-md bg-default">
    <div class="container">
      <div class="row justify-content-sm-center">
        <div class="col-md-10 col-xl-12">
          <div class="table-custom-wrap">
            <table class="table-custom table-fixed table-hover-rows">
              @foreach($exams as $exam)
              <tr>
                <td>{{$exam->faculty->name_en}}</td>
                <td>{{$exam->_class->name_en}}</td>
                <td>{{$exam->depart->name_en}}</td>
                <td>{{$exam->material->name_en}}</td>
                <td>{{$exam->semester->name_en}}</td>
                <td><a class="button button-primary-dark" href="">Download</a></td>
                  {{--url("storage/faculty/exams/".$item->files($item->file))--}}

              </tr>
              @endforeach
            </table>
          </div>
        </div>
        {{ $exams->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
  </section>
@endsection
