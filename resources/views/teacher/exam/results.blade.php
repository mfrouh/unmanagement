@extends('layouts.user')
@section('title')
@lang('home.results')
@endsection
@section('content')
<div class="container">
  <div class="row ">
   @foreach (auth()->user()->subject as $subject)
   <fieldset class="sparkline11-list mt-b-30" style="border:1px solid black ">
      <legend style="background:#ffb7aa;text-align:center;border:1px solid black">@lang('home.namegroup'): {{$subject->name}}</legend>
      @foreach ($subject->exam as $exam)
       <a href="/result/{{$exam->id}}" class="btn btn-primary" style="margin:7px">{{$exam->name}}</a>
      @endforeach
   </fieldset>
   @endforeach
 </div>
</div>
@endsection
