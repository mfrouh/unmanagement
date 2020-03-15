@extends('layouts.user')
@section('title')
@lang('home.results')
@endsection
@section('content')
<div class="container">
  <div class="row ">
   @foreach (auth()->user()->group->subject as $subject)
   <fieldset class="sparkline11-list mt-b-30" style="border:1px solid black ">
      <legend style="background:#ffb7aa;text-align:center;border:1px solid black">@lang('home.namesubject'): {{$subject->name}}</legend>
      @php
         $arr=array();
         foreach (auth()->user()->studentresultexam as $item) {
          $arr[]=$item->exam_id;
         }
      @endphp
      @foreach ($subject->exam as $exam)
      @if($exam->sectiongroup && in_array($exam->id,$arr) && in_array(auth()->user()->sectiongroup_id,json_decode($exam->sectiongroup)) )
       <a href="/resultexam/{{$exam->id}}" class="btn btn-primary" style="margin: 7px;">{{$exam->name}}</a>
      @endif
      @endforeach
   </fieldset>
   @endforeach
 </div>
</div>
@endsection
