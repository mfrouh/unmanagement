@extends('layouts.user')
@section('title')
@lang('home.exams')
@endsection
@section('content')
<div class="container">
        @php
        $myexams= array();$mysubject= array();
        foreach (auth()->user()->studentresultexam as $key => $value) {
           $myexams[]=$value->exam_id;
        }
        foreach (auth()->user()->student_details->studentclass->subject as $key => $value) {
           $mysubject[]=$value->id;
        }
        $exams=App\exam::whereIn('subject_id',$mysubject)->orderby('id','desc')->get();
        $name=__('home.nametr');
       @endphp
    <div class="row text-center">
        <ul id="myTabedu1" class="tab-review-design">
            <li class="active"><a href="#activeexam">@lang('home.exams')</a></li>
            <li><a href="#result">@lang('home.result')</a></li>
            <li><a href="#end">@lang('home.nottested')</a></li>
        </ul>
      <div class="sparkline11-list mt-b-30 " style="border:1px solid black " id="activeexam">
        <table  class="table text-center " style="width:100%">
            <thead >
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">@lang('home.nameexam')</th>
                <th class="text-center">@lang('home.start')</th>
                <th class="text-center">@lang('home.end')</th>
                <th class="text-center">@lang('home.durationinminute')</th>
                <th class="text-center">@lang('home.subject')</th>
                <th class="text-center"></th>
              </tr>
             </thead>
             <tbody>
                 @foreach ($exams as $k=> $exam)
                  @if(!in_array($exam->id,$myexams) && $exam->start < now() && $exam->end > now())
                     <tr>
                       <td>{{$k+1}}</td>
                       <td>{{$exam->name}}</td>
                       <td>{{$exam->start}}</td>
                       <td>{{$exam->end}}</td>
                       <td>{{$exam->duration}} @lang('home.min')</td>
                       <td>{{$exam->subject->$name}}</td>
                       <td>
                         <a href="/doexam/{{$exam->id}}" class="btn btn-success">@lang('home.start')</a>
                       </td>
                      </tr>
                  @endif
                 @endforeach
             </tbody>
        </table>
      </div>
      <div class="sparkline11-list mt-b-30 hide" style="border:1px solid black " id="result">
            <table  class="table text-center " style="width:100%">
                <thead >
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">@lang('home.nameexam')</th>
                    <th class="text-center">@lang('home.start')</th>
                    <th class="text-center">@lang('home.end')</th>
                    <th class="text-center">@lang('home.durationinminute')</th>
                    <th class="text-center">@lang('home.subject')</th>
                    <th class="text-center"></th>
                  </tr>
                 </thead>
                 <tbody>
                     @foreach ($exams as $k=> $exam)
                      @if(in_array($exam->id,$myexams) )
                         <tr>
                           <td>{{$k+1}}</td>
                           <td>{{$exam->name}}</td>
                           <td>{{$exam->start}}</td>
                           <td>{{$exam->end}}</td>
                           <td>{{$exam->duration}} @lang('home.min')</td>
                           <td>{{$exam->subject->$name}}</td>
                           <td>
                             <a href="/resultexam/{{$exam->id}}" class="btn btn-primary">show result</a>
                           </td>
                          </tr>
                      @endif
                     @endforeach
                 </tbody>
            </table>
          </div>
          <div class="sparkline11-list mt-b-30 hide" style="border:1px solid black " id="end">
                <table  class="table text-center " style="width:100%">
                    <thead >
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">@lang('home.nameexam')</th>
                        <th class="text-center">@lang('home.start')</th>
                        <th class="text-center">@lang('home.end')</th>
                        <th class="text-center">@lang('home.durationinminute')</th>
                        <th class="text-center">@lang('home.subject')</th>
                        <th class="text-center"></th>
                      </tr>
                     </thead>
                     <tbody>
                         @foreach ($exams as $k=> $exam)
                          @if(!in_array($exam->id,$myexams) &&  $exam->end < now())
                             <tr>
                               <td>{{$k+1}}</td>
                               <td>{{$exam->name}}</td>
                               <td>{{$exam->start}}</td>
                               <td>{{$exam->end}}</td>
                               <td>{{$exam->duration}} @lang('home.min')</td>
                               <td>{{$exam->subject->$name}}</td>
                               <td>
                                 <a href="#" class="btn btn-danger">end</a>
                               </td>
                              </tr>
                          @endif
                         @endforeach
                     </tbody>
                </table>
              </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $('.tab-review-design li').click(function(){
        $('.sparkline11-list').addClass('hide');
        $('.sparkline11-list.active').removeClass('hide');
             });
        });
</script>
@endsection
