@extends('layouts.user')
@section('title')
@lang('home.results')
@endsection
@section('content')
<div class="container-fluid">
 <div class="row">
   <div class="col-xl-4 col-md-4">
      <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
      <table class="table table-border" style="width:100%">
        <tr>
          <th style="color:green;background: gold;">@lang('home.studentname')</th>
          <td style="color:green;background: #fde565;">{{$examstudent->user->name}}</td>
         </tr>
         <tr>
          <th style="color:green;background: aqua;">@lang('home.nameexam')</th>
          <td style="color:green;background: #50efef;">{{$examstudent->exam->name}}</td>
         </tr>
        <tr>
          <th style="background: gold;">@lang('home.result')</th>
          <td style="background: #fde565;">{{$examstudent->result}}</td>
        </tr>
         <tr>
           <th style="color:green;background: aqua;">@lang('home.correctanswer')</th>
           <td style="color:green;background: #50efef;">{{count(json_decode($examstudent->correct,true))}}</td>
          </tr>
          <tr>
            <th style="color:red;background: #ffc385;">@lang('home.wronganswer')</th>
            <td style="color:red;background: #e8ab6b;">{{count(json_decode($examstudent->wrong,true))}}</td>
          </tr>
          <tr>
              <th style="color:red;background: #ffc385;">@lang('home.notanswer')</th>
              <td style="color:red;background: #e8ab6b;">{{count(json_decode($examstudent->notanswer,true))}}</td>
            </tr>
            <tr>
              <th style="color:red;background: #ffc385;">@lang('home.score')</th>
              <td style="color:red;background: #e8ab6b;">{{($examstudent->result/$examstudent->total)*100}}%</td>
            </tr>
      </table>
   </div>
 </div>
   <div class="col-xl-8 col-md-8">
      <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
      <table class="table table-border" style="width:100%">
        @foreach ($questions as $g => $question)
        <tr style="background:#3c8dbc;">
            <th colspan="1" rowspan="1"class="text-center">@lang('home.question')#{{$g+1}}</th>
            <th colspan="4" class="text-center">{{$question->question}}</th>
        </tr>
        <tr>
        <td  colspan="1" rowspan="2"class="text-center">
          @lang('home.answers')
          @php
          $wr=array(); $cr=array();
          foreach (json_decode($examstudent->wrong) as $key => $value) {
            $wr[]=$key;
          }
          foreach (json_decode($examstudent->correct) as $key => $value) {
            $cr[]=$key;
          }
          @endphp
           @if (in_array($question->id,json_decode($examstudent->notanswer)) || in_array($question->id,$wr))
              <br><i class="fa fa-close"></i>
          @endif
          @if (in_array($question->id,$cr))
          <br><i class="fa fa-check"></i>
          @endif
        </td>
            <td {{check(1,json_decode($examstudent->wrong),json_decode($examstudent->correct),$question->id,$question->correctanswer)}}><input type="radio" value="1" {{check(1,json_decode($examstudent->wrong),json_decode($examstudent->correct),$question->id,$question->correctanswer)}} name="{{$question->id}}"  disabled>{{$question->option1}}</td>
            <td {{check(2,json_decode($examstudent->wrong),json_decode($examstudent->correct),$question->id,$question->correctanswer)}}><input type="radio" value="2" {{check(2,json_decode($examstudent->wrong),json_decode($examstudent->correct),$question->id,$question->correctanswer)}} name="{{$question->id}}"  disabled>{{$question->option2}}</td>
        </tr>
        <tr>
            <td {{check(3,json_decode($examstudent->wrong),json_decode($examstudent->correct),$question->id,$question->correctanswer)}}><input type="radio" value="3" {{check(3,json_decode($examstudent->wrong),json_decode($examstudent->correct),$question->id,$question->correctanswer)}} name="{{$question->id}}"  disabled>{{$question->option3}}</td>
            <td {{check(4,json_decode($examstudent->wrong),json_decode($examstudent->correct),$question->id,$question->correctanswer)}}><input type="radio" value="4" {{check(4,json_decode($examstudent->wrong),json_decode($examstudent->correct),$question->id,$question->correctanswer)}} name="{{$question->id}}"  disabled>{{$question->option4}}</td>
        </tr>
        @endforeach
      </table>
      </div>
   </div>
 </div>
</div>
@endsection
