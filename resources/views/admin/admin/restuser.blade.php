@extends('layouts.user')
@section('title')
@lang('home.restuser')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-xl-8">
        <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
        <table  class="table restuser text-center " style="width:100%">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">@lang('home.teachername')</th>
                <th class="text-center">@lang('home.days')</th>
                <th class="text-center">@lang('home.time')</th>
              </tr>
             </thead>
             <tbody>
                 @php
                     $restusers=App\restuser::all();
                 @endphp
                 @foreach ($restusers as $k=> $restuser)
               <tr>
                 <td>{{$k+1}}</td>
                 <td>{{$restuser->user_id}}</td>
                 <td>{{$restuser->days}}</td>
                 <td>{{$restuser->time}}</td>
                </td>
                </tr>
                 @endforeach
             </tbody>
        </table>
        </div>
      </div>
      <div class="col-md-4 col-xl-4">
          <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
           <form method="POST"action=""  id="addrestuser" >
              <div class="form-group">
                  <label>@lang('home.teachername')</label>
                  <select name="teachername" class="form-control" id="user">
                    @php
                        $users=App\User::where('role','teacher')->get();
                    @endphp
                    @foreach ($users as $user)
                     <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                  </select>
                </div>
              <div class="form-group">
                 <label>@lang('home.days')</label>
                 <select name="days" class="form-control" id="days" multiple>
                     <option value="1">sat</option>
                     <option value="2">sun</option>
                     <option value="3">mon</option>
                     <option value="4">thus</option>
                     <option value="5">wen</option>
                     <option value="6">thur</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>@lang('home.days')</label>
                  <select name="time" class="form-control" id="time" multiple>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                   </select>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-primary" id="savegroup" ><i class="fa fa-check"></i></button>
                </div>
           </form>
         </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
          $(document).on('submit','#addrestuser',function(e){
    e.preventDefault();
    var user=$('#user').val();
    var days=$('#days').val();
    var time=$('#time').val();
     $.ajax({
      type:'post',
      url:'/addrestuser',
      data:{user:user,days:days,time:time},
      dataType:'json',
     success:function(data){
      var user=$('#user').val('');
    var days=$('#days').val('');
    var time=$('#time').val('');
    $("table.restuser").load(" table.restuser>*");
          },
            error:function(data)
            {
              $.each(data.responseJSON.errors, function(i, item) {
              alert(item);
          });
            }
          });
        });

});
</script>
@endsection
