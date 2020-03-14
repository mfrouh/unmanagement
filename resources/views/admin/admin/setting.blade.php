@extends('layouts.user')
@section('title')
@lang('home.setting')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-xl-8">
        <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
        <table  class="table setting text-center " style="width:100%">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">@lang('home.courseplace')</th>
                <th class="text-center">@lang('home.sectionplace')</th>
              </tr>
             </thead>
             <tbody>
                 @php
                     $settings=App\setting::all();
                 @endphp
                 @foreach ($settings as $k=> $setting)
               <tr>
                 <td>{{$k+1}}</td>
                 <td>{{$setting->courseplace}}</td>
                 <td>{{$setting->sectionplace}}</td>
                </td>
                </tr>
                 @endforeach
             </tbody>
        </table>
        </div>
      </div>
      <div class="col-md-4 col-xl-4">
          <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
           <form method="POST"action=""  id="addsetting" >
              <div class="form-group">
                 <label>@lang('home.courseplace')</label>
                <input type="number" name="couseplace" class="form-control" id="courseplace">
               </div>
               <div class="form-group">
                <label>@lang('home.sectionplace')</label>
               <input type="number" name="sectionplace" class="form-control" id="sectionplace">
              </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-primary" id="savegroup" ><i class="fa fa-check"></i></button>
                </div>
           </form>
         </div>
    </div>
    <div class="container">
            @if(count($settings)==1)
           <a class="btn btn-primary" href="/subjecttable" aria-expanded="false"> <span class="mini-click-non">@lang('home.coursestable')</span></a>
           <a class="btn btn-danger" href="/sectiontable" aria-expanded="false"> <span class="mini-click-non">@lang('home.sectionstable')</span></a>
            @endif
           <a class="btn btn-success" href="/restgroup" aria-expanded="false"> <span class="mini-click-non">@lang('home.restgroup')</span></a>
           <a class="btn btn-warning" href="/restuser" aria-expanded="false"> <span class="mini-click-non">@lang('home.restuser')</span></a>
           <a class="btn btn-success" href="/coursesize" aria-expanded="false"> <span class="mini-click-non">@lang('home.coursesplace')</span></a>
           <a class="btn btn-warning" href="/groupsize" aria-expanded="false"> <span class="mini-click-non">@lang('home.groupsplace')</span></a>

    </div>
</div>

<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
          $(document).on('submit','#addsetting',function(e){
    e.preventDefault();
    var sectionplace=$('#sectionplace').val();
    var courseplace=$('#courseplace').val();
     $.ajax({
      type:'post',
      url:'/addsetting',
      data:{sectionplace:sectionplace,courseplace:courseplace},
      dataType:'json',
     success:function(data){
      var sectionplace=$('#sectionplace').val('');
      var courseplace=$('#courseplace').val('');
    $("table.setting").load(" table.setting>*");
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
