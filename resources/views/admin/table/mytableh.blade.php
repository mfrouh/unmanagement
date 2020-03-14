@extends('layouts.user')
@section('title')
@lang('home.mytable')
@endsection
@section('content')
<div class="container thistable">

    @php
    $subjects=App\subject::where('studentclass_id',$id)->get();
    $studentclass=App\studentclass::find($id);
    $name=__('home.nametr');
    @endphp
    <h4 class="text-center">{{$studentclass->$name}}</h4>
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
                 $table=App\table::where('studentclass_id',$id)->get($day[$i-1]);

              @endphp
              @foreach ($table as $k => $row)
                 <td>
                   <select name="" class="form-control tablecell" id="tablecell" role="{{$day[$i-1]}}" itemtype="{{$k+1}}" itemid="{{$id}}" >
                         <option value="{{Null}}">seleect subject</option>
                       @foreach ($subjects as $subject)
                       @php
                        $arr=array();
                        $table2=App\table::where('row_id',($k+1))->where('studentclass_id','!=',$id)->get($day[$i-1]);
                        foreach ($table2 as $key => $value) {
                            if($value[$day[$i-1]]!=null){
                            $subjectnotin=App\subject::where('id',$value[$day[$i-1]])->where('studentclass_id','!=',$id)->first();
                             if($subjectnotin){
                            $arr[]=$subjectnotin->user_id;
                            }
                        }
                        }
                       @endphp
                          @if(!in_array($subject->user_id,$arr))
                          <option value="{{$subject->id}}" @if ($row[$day[$i-1]]==$subject->id){{'selected'}}@endif>{{$subject->$name}}</option>
                          @endif
                       @endforeach
                   </select>
                 </td>
              @endforeach
         </tr>
         @endfor
    </tbody>
  </table>
</div>
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $(document).on('change','.tablecell',function(e){
          var  row      =   $(this).attr('role');
          var  row_id   =   $(this).attr('itemtype');
          var  value    =   $(this).val();
          var  classid  =   $(this).attr('itemid');
          $.ajax({
                 type:'post',
                 url:'/savetable',
                 data:{classid:classid,row_id:row_id,value:value,row:row},
                 dataType:'json',
                 success:function(data){
                    $('div.thistable').load(' div.thistable>*');
                 },
                });
             });
        });
</script>
@endsection
