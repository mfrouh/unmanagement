@extends('layouts.user')
@section('title')
   @lang('home.sectionstable')
@endsection
@section('content')
<div class="container">
  <div class="row ">
    <?php  $user=array(); $group=array();?> <?php  $al=array(); $array=array();  $p=0;  $countplace=App\setting::first();?>
    <form action="/savesectiontable" method="POST">
      @csrf
  @for ($o = 1; $o<=$countplace->sectionplace ; $o++)
  <h1 class="text-center">table {{$o}}</h1>
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
          <?php unset($array2); $array2=array(); unset($array3); $array3=array();?>
          <tr>
            @php
                  $array=App\section::all();
                 foreach ($array as $key => $va1) {
                  $grouprest=App\restgroup::where('group_id',$va1->sectiongroup->group_id)->first();
                   if($grouprest){
                    if($grouprest && !in_array($i,json_decode($grouprest['days']))){
                        $array3[]=$va1;
                    }
                 }
                 }

            @endphp
            <?php $day =["sat", "sun","mon", "thus", "wed","thur"];?>
            <th class="text-center">{{$day[$i-1]}}</th>

              @for ($j = 1; $j <=5; $j++)
              <?php unset($tot); $tot=array(); unset($arr); $arr=array();  unset($arry); $arry=array();  unset($array4); $array4=array();  unset($array5);  unset($array6); unset($array7); $array5=array();  $array6=array(); $array7=array();?>
              @php
              for ($y=1; $y <=$countplace->courseplace ; $y++) {
                $teachertable=App\subjecttable::where('tableid',$y)->where('tid',$j)->first();
                $arr[$y] = $teachertable[$day[$i-1]];
              }

             foreach ($arr as $key => $value) {
              $course=App\subject::where('id',$value)->first();
              if($course){
              $course->group_id;
              $arry[]= $course->group_id;}
             }

                 foreach ($array3 as $key => $va1) {
                    $grouprest1=App\restgroup::where('group_id',$va1->sectiongroup->group_id)->first();
                    if($grouprest1 && !in_array($j,json_decode($grouprest1['time']))){
                        $array5[]=$va1;
                    }
                 }

                if($o!=1 ){
                  if($o == $countplace->sectionplace)
                  {
                    $array5=$array3;
                  }
                  foreach ($array5 as $key => $value)
                  {
                    foreach ($group[$i.$j] as $key => $r) {
                      if(!in_array($value->sectiongroup_id,$group[$i.$j]))
                     {
                      $array7[]=$value;
                     }
                    }
                  }
                  foreach ($array7 as $key => $value)
                  {
                     if(!in_array($value->user_id,$user[$i.$j]))
                     {
                      $array6[]=$value;

                     }
                  }

                   foreach ($array6 as $key => $value) {
                  if(!in_array($value,$al) &&  !in_array($value,$tot)){
                    $coursesize=App\coursesize::where('subject_id',$value->subject_id)->first();
                  if($coursesize && in_array($o,json_decode($coursesize['table'])) && $o!=$countplace->sectionplace){
                     if(!in_array($value->sectiongroup->group_id,$arry)){
                    $tot[]=$value;
                    }
                 }
                 if($o == $countplace->sectionplace)
                  {
                    if(!in_array($value->sectiongroup->group_id,$arry)){
                    $tot[]=$value;
                    }
                  }
                }
                   }

                   shuffle($tot);
                   $element =  array_pop($tot);
                }

                if($o==1){
                foreach ($array5 as $key => $value) {
                  if(!in_array($value,$al) &&  !in_array($value,$tot)){
                     $coursesize=App\coursesize::where('subject_id',$value->subject_id)->first();
                  if($coursesize && in_array($o,json_decode($coursesize['table']))){
                   if(!in_array($value->sectiongroup->group_id,$arry)){
                    $tot[]=$value;
                    }
                  }
                 }
                   }
                   shuffle($tot);
                   $element =  array_pop($tot);
                  }

              @endphp
              <td>
              @if ($element)
               {{$element['user_id']}}
               {{$element['sectiongroup_id']}}

               <input type="hidden" name="{{$o.$day[$i-1].$j}}" value="{{$element['id']}}">
               <?php $al[]=$element;
             ?>
              <?php
              $user[$i.$j][]=$element['user_id'];
              $group[$i.$j][]=$element['sectiongroup_id'];
            ?>
               @endif
               <?php
               $user[$i.$j][]=null;
               $group[$i.$j][]=null;
             ?>


              </td>

              @endfor

          </tr>
          @endfor

         </tbody>
   </table>
 @endfor
 <input type="submit" class="btn btn-primary" value="save">
 {{count($al)}}
  </form>
 </div>
</div>
@endsection
