@extends('layouts.user')
@section('content')
<div class="container">
    <div class="row ">
    <div class="col-md-4">
        @php
            $teachers=App\User::where('role','teacher')->get();
        @endphp
        {{dd($teachers)}}
        @foreach ($teachers as $item)
            <a href="/teachertable/{{$item->id}}" class="col-md-3 " style="margin: 5px;padding: 6px; background: white;border: 1px solid red;border-radius: 25px;text-align: center;">{{$item->name}}</a>
        @endforeach
    </div>
    <div class="col-md-8">
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
                         $subject=App\subject::where('id',$value)->first();

                         if($subject){

                         $arry[$subject->user_id]= $subject->id;}
                        }
                        @endphp
                          <td>@foreach ($arry as $key=> $item)
                          @if ($key==$id && $item)
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
