@extends('layouts.user')
@section('title')
@lang('home.results')
@endsection

@section('content')
<div class="container">
    <ul id="myTabedu1" class="tab-review-design">
        <li class="active"><a href="#result">@lang('home.result')</a></li>
        <li><a href="#details">@lang('home.details')</a></li>
    </ul>
 <div class="row y" id="result" >
   <div class="col-xl-8 col-md-8">
    <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
      <table  class="stugroups table text-center" style="width:100%">
        <thead>
          <th class="text-center">#</th>
          <th class="text-center">@lang('home.studentname')</th>
          <th class="text-center">@lang('home.correctanswer')</th>
          <th class="text-center">@lang('home.wronganswer')</th>
          <th class="text-center">@lang('home.notanswer')</th>
          <th class="text-center">@lang('home.result')</th>
          <th class="text-center">@lang('home.score')</th>
          <th class="text-center">@lang('home.statepass')</th>
          <th class="text-center">@lang('home.timeendexam')</th>
          <th class="text-center">@lang('home.details')</th>
        </thead>
        <tbody>
         @foreach ($exam->studentresultexam as $k=> $examstudent)
         <tr>
         <td>{{$k+1}}</td>
          <td>{{$examstudent->user->name}}</td>
          <td>{{count(json_decode($examstudent->correct,true))}}</td>
          <td>{{count(json_decode($examstudent->wrong,true))}}</td>
          <td>{{count(json_decode($examstudent->notanswer,true))}}</td>
          <td>{{$examstudent->result}}/{{$examstudent->total}}</td>
          <td>{{$examstudent->score}}%</td>
          <td>{{$examstudent->state}}</td>
         <td>{{$examstudent->created_at}}</td>
         <td><a href="/details/{{$examstudent->exam_id}}/{{$examstudent->user->id}}" class="btn btn-success"><i class="fa fa-eye"></i></a></td>
         </tr>
         @endforeach
        </tbody>
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
 <div class="row y fade" id="details">
    <div class="col-xl-8 col-md-8">
     <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
       <table  class="stugroups table text-center" style="width:100%">
         <thead>
           <th class="text-center">#</th>
           <th class="text-center">@lang('home.question')</th>
           <th class="text-center">@lang('home.correctanswer')</th>
           <th class="text-center">@lang('home.wronganswer')</th>
           <th class="text-center">@lang('home.notanswer')</th>
         </thead>
         <tbody>
           @php
               $questions=App\question::where('exam_id',$exam->id)->get();
           @endphp
          @foreach ($questions as $k=> $question)
          <tr>
          <td>{{$k+1}}</td>
           <td>{{$question->question}}</td>
           <td>
              @forelse (array_count_values($correct) as $yu =>$item)
              @if ($yu==$question->id)
                {{$item}}
              @endif
              @empty
              0
              @endforelse
           </td>
           <td>
              @forelse (array_count_values($wrong) as $yu =>$item)
              @if ($yu==$question->id)
                {{$item}}
              @endif
              @empty
              0
              @endforelse
           </td>
           <td>
              @forelse (array_count_values($notanswer) as $yu =>$item)
              @if ($yu==$question->id)
                {{$item}}
              @endif
              @empty
              0
              @endforelse
            </td>
          </tr>
          @endforeach
         </tbody>
  </table>
    </div>
  </div>
    <div class="col-xl-4 col-md-4">
     <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
        {!! $chart1->container()!!}

        {!! $chart1->script() !!}
    </div>
  </div>
 </div>
</div>
<script type="text/javascript">
  $(function() {
    $('.tab-review-design li').click(function(){
      $('.y').addClass('hide');
      $('.y.active').removeClass('hide');
      $('.y.active').removeClass('fade');
    });
  });
</script>
@endsection
