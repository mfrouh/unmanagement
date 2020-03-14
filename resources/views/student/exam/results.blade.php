@extends('layouts.user')
@section('title')
@lang('home.results')
@endsection
@section('content')
<div class="container">
  <div class="row ">
      @php
          $name=__('home.nametr');
      @endphp
   @foreach (auth()->user()->student_details->studentclass->subject as $subject)
   <fieldset class="sparkline11-list mt-b-30" style="border:1px solid black ">
      <legend style="background:#ffb7aa;text-align:center;border:1px solid black">@lang('home.namesubject'): {{$subject->$name}}</legend>
      @php
         $arr=array();
         foreach (auth()->user()->studentresultexam as $item) {
          $arr[]=$item->exam_id;
         }
      @endphp
      @foreach ($subject->exam as $exam)
      @if(in_array($exam->id,$arr))
       <a href="/resultexam/{{$exam->id}}" class="btn btn-primary" style="margin: 7px;">{{$exam->name}}</a>
      @endif
      @endforeach
   </fieldset>
   @endforeach
 </div>
</div>
@endsection
