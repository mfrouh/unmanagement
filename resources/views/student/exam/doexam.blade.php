@extends('layouts.user')
@section('title')
@lang('home.exam')
@endsection

@section('content')
<div class="container-fluid">
 <div class="row">
  <div class="col-xl-8 col-md-8">
      <div id="styspan"style=" background: #ffbd8e;padding: 9px;font-size: large;display: -webkit-inline-box;outline: auto;"><span id="timer"></span></div>
    <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
   <form action="/exam/storeexam" method="POST" id="subforma" style="width:100%">
        @csrf

        @foreach ($questions as $g => $question)
        <table class="table table-bordered {{$g}} @if($g==0){{''}} @else {{'hide'}} @endif" style="width:100%" >
        <tr >
            <th style="background:#3c8dbc; width:10%" colspan="1" class="text-center">@lang('home.question')#{{$g+1}}</th>
            <th  colspan="2" class="text-center">    </th>
            <th style="background:#3c8dbc; width:10%" colspan="1" class="text-center">@lang('home.grade'):{{$question->mark}}</th>
        </tr>
        <tr >
            <th  style="background:#58c2ff;" colspan="4" class="text-center">{{$question->question}}</th>
            <input type="hidden" value="start" class="btn btn-primary" id="start" title="{{$question->exam->duration}}">
        </tr>
        <tr>
            <td  colspan="1" class="text-center">1</td>
            <td  colspan="3"><input type="radio" value="1" class="{{$question->id}}{{auth()->user()->id}}" name="{{$question->id}}" required>{{$question->option1}}</td>
        </tr>
        <tr>
            <td  colspan="1" class="text-center">2</td>
            <td  colspan="3"><input type="radio" value="2" class="{{$question->id}}{{auth()->user()->id}}" name="{{$question->id}}" required>{{$question->option2}}</td>
        </tr>
        <tr>
            <td  colspan="1" class="text-center">3</td>
            <td  colspan="3"><input type="radio" value="3"  class="{{$question->id}}{{auth()->user()->id}}" name="{{$question->id}}" required>{{$question->option3}}</td>
        </tr>
        <tr>
            <td  colspan="1" class="text-center">4</td>
            <td  colspan="3"><input type="radio" value="4"  class="{{$question->id}}{{auth()->user()->id}}" name="{{$question->id}}" required>{{$question->option4}}</td>
            <input type="hidden" id="exam_id" name="exam_id" value="{{$question->exam_id}}">
            <input type="hidden" id="au" name="au" value="{{auth()->user()->id}}">

        </tr>
        <tr>
            @if($g < count($questions)-1)
            <td  colspan="1" class="text-center"><a href="#" value="next" class="btn btn-warning" title="{{$g+1}}">@lang('home.next')</a></td>
            @else
            <td  colspan="1" class="text-center"><input type="submit" value="@lang('home.save')" class="btn btn-primary" ></td>
            @endif
            @if($g >= count($questions))

            @else
            <td  colspan="1" class="text-center"><a href="#" type="{{$question->id}}{{auth()->user()->id}}" class="btn btn-danger {{$g}}"  title="{{$g}}">@lang('home.review')</a></td>
            <td  colspan="1" class="text-center"><a href="#" type="{{$question->id}}{{auth()->user()->id}}" class="btn btn-default {{$g}}"  title="{{$g}}">@lang('home.unreview')</a></td>
            @endif
            @if($g > 0)
            <td  colspan="1" class="text-center"><a href="#" value="previes" class="btn btn-success" title="{{$g-1}}">@lang('home.previous')</a></td>
            @else
            <td  colspan="1" class="text-center"></td>
            @endif
        </tr>
      </table>
        @endforeach
   </form>
   </div>
  </div>
  <div class="col-xl-4 col-md-4">
   <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
      @foreach ($questions as $g => $question)
   <a href="#" class="btn btn-primary {{$g}} na{{$question->id}}{{auth()->user()->id}} re{{$question->id}}{{auth()->user()->id}}" style="border-radius:24px;border:5px solid #337ab7;margin:2px; width: 16.66666667%;" title="{{$g}}" type="re{{$question->id}}{{auth()->user()->id}}" name="na{{$question->id}}{{auth()->user()->id}}">{{$g+1}}</a>
      @endforeach
   </div>
   <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
        <table class="table table-bordered">
          <tr>
            <th class="text-center">@lang('home.notselectnotreview')</th>
            <td class="text-center">
                 <input href="#" class="btn btn-primary" style="border-radius:24px;border:5px solid #337ab7;margin:2px; width: 16.66666667%;" >
            </td>
          </tr>
          <tr>
              <th class="text-center">@lang('home.selectnotreview')</th>
              <td class="text-center">
                  <input href="#" class="btn btn-success" style="border-radius:24px;border:5px solid #337ab7;margin:2px; width: 16.66666667%;" >
              </td>
          </tr>
          <tr>
              <th class="text-center">@lang('home.selectreview')</th>
              <td class="text-center">
                  <input href="#" class="btn btn-success" style="border-radius:24px;border:5px solid red;margin:2px; width: 16.66666667%;" >
              </td>
          </tr>
          <tr>
              <th class="text-center">@lang('home.notselectreview')</th>
              <td class="text-center">
                  <input href="#" class="btn btn-primary" style="border-radius:24px;border:5px solid red;margin:2px; width: 16.66666667%;" >
              </td>
          </tr>
        </table>
   </div>
  </div>
</div>
<script type="text/javascript" src="{{asset('js/exam.js')}}"></script>
@endsection
