@extends('layouts.user')
@section('title')
@lang('home.coursesplace')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-xl-8">
        <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
        <table  class="table coursesize text-center " style="width:100%">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">@lang('home.coursename')</th>
                <th class="text-center">@lang('home.table')</th>
              </tr>
             </thead>
             <tbody>
                 @php
                     $coursesizes=App\coursesize::all();
                 @endphp
                 @foreach ($coursesizes as $k=> $coursesize)
               <tr>
                 <td>{{$k+1}}</td>
                 <td>{{$coursesize->subject->group->name}}/{{$coursesize->subject->name}}</td>
                 <td>{{$coursesize->table}}</td>
                </td>
                </tr>
                 @endforeach
             </tbody>
        </table>
        </div>
      </div>
      <div class="col-md-4 col-xl-4">
          <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
           <form method="POST"action=""  id="addcoursesize" >
              <div class="form-group">
                  <label>@lang('home.coursename')</label>
                  <select name="group" class="form-control" id="course">
                    @php
                        $courses=App\subject::all();
                    @endphp
                    @foreach ($courses as $course)
                     <option value="{{$course->id}}">{{$course->group->name}}/{{$course->name}}</option>
                    @endforeach
                  </select>
                </div>
              <div class="form-group">
                 <label>@lang('home.table')</label>
                 <select name="table" class="form-control" id="table" multiple>
                     @php
                         $setting=App\setting::first();
                     @endphp
                    @for ($i = 1; $i <= $setting->sectionplace; $i++)
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
          $(document).on('submit','#addcoursesize',function(e){
    e.preventDefault();
    var course=$('#course').val();
    var table=$('#table').val();
     $.ajax({
      type:'post',
      url:'/addcoursesize',
      data:{course:course,table:table},
      dataType:'json',
     success:function(data){
    var course=$('#course').val('');
    var table=$('#table').val('');

    $("table.coursesize").load(" table.coursesize>*");
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
