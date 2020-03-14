@extends('layouts.user')
@section('title')
   @lang('home.mytable')
@endsection
@section('content')
<div class="container">
    <div class="row ">
    <div class="col-md-12">
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
                           @php
                           $day =["sat", "sun","mon", "thus", "wed","thur"];
                           @endphp
                        <th class="text-center">{{$day[$i-1]}}</th>
                          @for ($j = 1; $j <=5; $j++)
                          @php
                           $arry= array(); unset($arry);  $arrc= array(); unset($arrc);
                          $day =["sat", "sun","mon", "thus", "wed","thur"];
                          $arry= array();
                          $arrc= array();
                          $countplace=App\setting::first();
                       for ($y=1; $y <=$countplace->courseplace ; $y++) {
                           $teachertable=App\subjecttable::where('tableid',$y)->where('tid',$j)->first();
                           $arr[$y] = $teachertable[$day[$i-1]];
                         }

                        foreach ($arr as $key => $value) {
                         $subject=App\subject::where('user_id',auth()->user()->id)->where('id',$value)->first();

                         if($subject){
                         $arry[$subject->user_id]= $subject->id;}
                        }
                        @endphp
                          <td>@foreach ($arry as $key=> $item)
                          @if ( $item)
                          <?php $subjectid=App\subject::where('id',$item)->first();?>
                          {{$subjectid->name}}<br>{{$subjectid->user->name}}<br>{{$subjectid->group->name}}
                          @endif
                          @endforeach
                        </td>
                          @endfor
                      </tr>
                      @endfor
                     </tbody>
           </table>
    </div>
</div></div>

@endsection
