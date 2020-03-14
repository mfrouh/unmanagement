@extends('layouts.user')
@section('title')
    @lang('home.coursestable')
@endsection
@section('content')
<div class="container">
  <div class="row ">
    <?php  $user=array(); $group=array();?> <?php  $al=array(); $array=array();  $p=0;  $countplace=App\setting::first();?>
    <form action="/savetable" method="POST">
      @csrf
  @for ($o = 1; $o<=$countplace->courseplace ; $o++)
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
                  $array=App\subject::all();
                 // dd($array);
                  foreach ($array as $key => $va) {
                  $userrest=App\restuser::where('user_id',$va->user_id)->first();
                   if($userrest && !in_array($i,json_decode($userrest['days']))){
                        $array2[]=$va;
                   }
                 }
                  //dd($array2);
                 foreach ($array2 as $key => $va1) {
                  $grouprest=App\restgroup::where('group_id',$va1->group_id)->first();
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
              <?php unset($tot); $tot=array();  unset($array4); $array4=array();  unset($array5);  unset($array6); unset($array7); $array5=array();  $array6=array(); $array7=array();?>
              @php
               foreach ($array3 as $key => $va) {
                  $userrest1=App\restuser::where('user_id',$va->user_id)->first();
                   if($userrest1 && !in_array($j,json_decode($userrest1['time']))){
                        $array4[]=$va;
                   }
                 }
                 foreach ($array4 as $key => $va1) {
                    $grouprest1=App\restgroup::where('group_id',$va1->group_id)->first();
                    if($grouprest1 && !in_array($j,json_decode($grouprest1['time']))){
                        $array5[]=$va1;
                    }
                 }

                if($o!=1 ){
                  foreach ($array5 as $key => $value)
                  {
                     if(!in_array($value->user_id,$user[$i.$j]))
                     {
                      $array6[]=$value;

                     }
                  }

                  foreach ($array6 as $key => $value)
                  {
                    foreach ($group[$i.$j] as $key => $r) {
                      if(!in_array($value->group_id,$group[$i.$j]))
                     {
                      $array7[]=$value;
                      // dd($value->group->id);
                     }
                    }
                  }

                   foreach ($array7 as $key => $value) {
                  if(!in_array($value,$al) &&  !in_array($value,$tot)){
                    $groupsize=App\groupsize::where('group_id',$value->group_id)->first();
                    if($groupsize && in_array($o,json_decode($groupsize['table']))){
                    $tot[]=$value;
                    }
                 }
                   }
                   shuffle($tot);
                   $element =  array_pop($tot);
                }
                if($o==1){
                //dd($array5);
                foreach ($array5 as $key => $value) {
                  if(!in_array($value,$al) &&  !in_array($value,$tot)){
                    $groupsize=App\groupsize::where('group_id',$value->group_id)->first();
                    if($groupsize && in_array($o,json_decode($groupsize['table']))){
                    $tot[]=$value;
                    }
                 }
                   }

                   shuffle($tot);
                   $element =  array_pop($tot);
                    // dd($element);
                  }
              @endphp
              <td>
                @if ($element)
               {{$element['group_id']}}
               {{$element['user_id']}}

               <input type="hidden" name="{{$o.$day[$i-1].$j}}" value="{{$element['id']}}">
               <?php $al[]=$element;?>

               <?php
               $user[$i.$j][]=$element['user_id'];
               $group[$i.$j][]=$element['group_id'];
             ?>
              @endif
              </td>
              <?php
              $user[$i.$j][]=null;
              $group[$i.$j][]=null;
            ?>
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
