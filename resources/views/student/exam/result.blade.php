@extends('layouts.user')
@section('title')
@lang('home.results')
@endsection
@section('content')
<div class="container">
 <div class="row">
   <div class="col-xl-8 col-md-8">
      <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
      <table class="table table-border" style="width:100%">
        <tr>
          <th style="background: #006df0;">@lang('home.studentname')</th>
          <td style="background: #72b2ff;">{{$studentresultexam->user->name}}</td>
        </tr>
        <tr>
          <th style="background: #6dd26f;">@lang('home.nameexam')</th>
          <td style="background: #8aff8d;">{{$studentresultexam->exam->name}}</td>
        </tr>
        <tr>
          <th style="background: #ffa200;">@lang('home.teachername')</th>
          <td style="background: #ffbd4a;">{{$studentresultexam->exam->subject->user->name}}</td>
        </tr>
        <tr>
          <th style="background: gold;">@lang('home.result')</th>
          <td style="background: #fde565;">{{$studentresultexam->result}}/{{$studentresultexam->total}}</td>
        </tr>
        <tr>
           <th style="color:green;background: aqua;">@lang('home.correctanswer')</th>
           <td style="color:green;background: #50efef;">{{count(json_decode($studentresultexam->correct,true))}}</td>
          </tr>
          <tr>
            <th style="color:red;background: #ffc385;">@lang('home.wronganswer')</th>
            <td style="color:red;background: #e8ab6b;">{{count(json_decode($studentresultexam->wrong,true))}}</td>
          </tr>
          <tr>
              <th style="color:red;background: #ffc385;">@lang('home.notanswer')</th>
              <td style="color:red;background: #e8ab6b;">{{count(json_decode($studentresultexam->notanswer,true))}}</td>
            </tr>
          <tr>
             <th style="color:red;background: #d2b8b8;">@lang('home.score')</th>
             <td style="color:red;background: #d8cdcd;">{{$studentresultexam->score}}%</td>
          </tr>
          <tr>
              <th style="color:red;background: #6b5d5d;">@lang('home.statepass')</th>
              <td style="color:red;background: #8e8282">{{$studentresultexam->state}}</td>
           </tr>
      </table>
   </div>
 </div>
 <div class="col-xl-4 col-md-4">
  <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
      {!! $chart->container() !!}

      {!! $chart->script() !!}
  </div>
 </div>
 </div>
</div>
@endsection
