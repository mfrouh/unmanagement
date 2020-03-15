@extends('layouts.user')
@section('title')
@lang('home.sectioncontents')
@endsection
@section('content')
<div class="container">
  <div class="row ">
      @php
          $contents=App\content::where('subject_id',$id)->whereJsonContains('sectiongroup',auth()->user()->sectiongroup_id)->orderby('id','desc')->get();
          $subject=App\subject::find($id);
      @endphp
 <legend style="background:#ffb7aa;text-align:center;border:1px solid black">@lang('home.content'): {{$subject->name}}</legend>
   @foreach ($contents as $content)
   <fieldset class="sparkline11-list mt-b-30" style="border:1px solid black ">
      <legend style="background:#ffb7aa;text-align:center;border:1px solid black">@lang('home.title'): {{$content->title}}</legend>
      {{$content->content}}
    </fieldset>
   @endforeach
 </div>
</div>
@endsection
