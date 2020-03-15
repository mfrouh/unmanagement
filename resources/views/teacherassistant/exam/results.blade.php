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
   @php
       $sections=App\section::whereIN('subject_id',auth()->user()->section->pluck('subject_id'))->get();
   @endphp
   @foreach (auth()->user()->section as $section)
   <fieldset class="sparkline11-list mt-b-30" style="border:1px solid black ">
      <legend style="background:#ffb7aa;text-align:center;border:1px solid black">@lang('home.namegroup'): {{$section->sectiongroup->group->name}} | @lang('home.sectiongroup'): {{$section->sectiongroup->name}} | @lang('home.subject'): {{$section->subject->name}}</legend>
      @foreach ($section->subject->exam as $exam)
      @if($exam->sectiongroup && in_array($section->id,json_decode($exam->sectiongroup)) )
       <a href="/resultsection/{{$exam->id}}" class="btn btn-primary" style="margin:7px">{{$exam->name}}</a>
      @endif
      @endforeach
   </fieldset>
   @endforeach
 </div>
</div>
@endsection
