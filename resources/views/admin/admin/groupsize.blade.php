@extends('layouts.user')
@section('title')
@lang('home.groupsplace')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-xl-8">
        <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
        <table  class="table groupsize text-center " style="width:100%">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">@lang('home.namegroup')</th>
                <th class="text-center">@lang('home.table')</th>
              </tr>
             </thead>
             <tbody>
                 @php
                     $groupsizes=App\groupsize::all();
                 @endphp
                 @foreach ($groupsizes as $k=> $groupsize)
               <tr>
                 <td>{{$k+1}}</td>
                 <td>{{$groupsize->group->name}}</td>
                 <td>{{$groupsize->table}}</td>
                </td>
                </tr>
                 @endforeach
             </tbody>
        </table>
        </div>
      </div>
      <div class="col-md-4 col-xl-4">
          <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
           <form method="POST"action=""  id="addgroupsize" >
              <div class="form-group">
                  <label>@lang('home.namegroup')</label>
                  <select name="group" class="form-control" id="group">
                    @php
                        $groups=App\group::all();
                    @endphp
                    @foreach ($groups as $group)
                     <option value="{{$group->id}}">{{$group->name}}</option>
                    @endforeach
                  </select>
                </div>
              <div class="form-group">
                 <label>@lang('home.table')</label>
                 <select name="table" class="form-control" id="table" multiple>
                  @php
                  $setting=App\setting::first();
                 @endphp
                @for ($i = 1; $i <= $setting->courseplace; $i++)
                 <option value="{{$i}}">{{$i}}</option>
                @endfor
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
          $(document).on('submit','#addgroupsize',function(e){
    e.preventDefault();
    var group=$('#group').val();
    var table=$('#table').val();
     $.ajax({
      type:'post',
      url:'/addgroupsize',
      data:{group:group,table:table},
      dataType:'json',
     success:function(data){
    var group=$('#group').val('');
    var table=$('#table').val('');

    $("table.groupsize").load(" table.groupsize>*");
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
