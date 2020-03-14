@extends('layouts.user')
@section('title')
@lang('home.mytable')
@endsection
@section('content')
<div class="container">
  <table class="table table-bordered text-center" style="background:white;">
    <thead>
        <tr>
          <th class="text-center">....</th>
          <th class="text-center">8:00</th>
          <th class="text-center">10:00</th>
          <th class="text-center">12:00</th>
          <th class="text-center">2:00</th>
          <th class="text-center">4:00</th>
        </tr>
    </thead>
    <tbody>
            @for ($i = 1; $i <=6; $i++)
         <tr>
            <?php $day =["sat", "sun","mon", "thus", "wed","thur"];?>
            <th class="text-center">{{$day[$i-1]}}</th>
              @php
                 $table=App\table::where('studentclass_id',auth()->user()->student_details->studentclass_id)->get($day[$i-1]);
                 $name=__('home.nametr');
              @endphp
              @foreach ($table as $row)
                @if($row[$day[$i-1]]!=null)
                @php $subject=App\subject::find($row[$day[$i-1]]);@endphp
                 <td>{{$subject->$name}}</td>
                @else
                <td></td>
                @endif
              @endforeach
         </tr>
         @endfor
    </tbody>
  </table>
</div>
@endsection
