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

              @for ($j = 1; $j <= 5; $j++)
              @php
              $table=App\table::where('row_id',$j)->get($day[$i-1]);
              $name=__('home.nametr');
                foreach (auth()->user()->subject as $key => $value) {
                   $arr[]=$value->id;
                }
                $cell='';
                $subject='';
              foreach ($table as $key => $value) {
                if($value[$day[$i-1]]!=null && in_array($value[$day[$i-1]],$arr) ){
                 $cell=$value[$day[$i-1]];
                 $subject=App\subject::find($cell)->$name;
                }
            }

              @endphp
              @php
              @endphp
               <td>{{$subject}}</td>
              @endfor
         </tr>
         @endfor
    </tbody>
  </table>
</div>
@endsection
