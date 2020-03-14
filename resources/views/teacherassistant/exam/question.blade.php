@extends('layouts.user')
@section('title')
@lang('home.questions')
@endsection

@section('content')

<div class="container-fluid">
 <div class="row">
   <div class="col-xl-4 col-md-4">
     <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
      <form action="/exam/import" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="exam_id" value="{{$exam->id}}">
        <label>Import exam</label>
        <input type="file"  name="excelfile"required>
        <input type="submit" class="btn btn-primary" value="import">
      </form>
     </div>
      <h3 class="text-center">OR</h3>
      <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
    <form method="POST" action=""id="subfor" style="width:100%">
         <div class="form-group" >
            <label>@lang('home.question')</label>
            <textarea class="form-control" id="question" name="question" required></textarea>
         </div>
         <div class="form-group" >
            <label>@lang('home.option1')</label>
            <input type="text" class="form-control" id="option1" name="option1" required autocomplete="off">
          </div>
          <div class="form-group" >
            <label>@lang('home.option2')</label>
            <input type="text" class="form-control" id="option2" name="option2" required autocomplete="off">
          </div>
          <div class="form-group" >
            <label>@lang('home.option3')</label>
            <input type="text" class="form-control" id="option3" name="option3" required autocomplete="off">
          </div>
          <div class="form-group" >
            <label>@lang('home.option4')</label>
            <input type="hidden" value="{{$exam->id}}" id="examid" name="examid">
            <input type="text" class="form-control" id="option4" name="option4" required autocomplete="off">
          </div>
          <div class="form-group" >
            <label>@lang('home.correctanswer')</label>
            <select  id="correctanswer" class="form-control">
                <option value="1">@lang('home.option1')</option>
                <option value="2">@lang('home.option2')</option>
                <option value="3">@lang('home.option3')</option>
                <option value="4">@lang('home.option4')</option>
            </select>
          </div>
          <div class="form-group" >
            <label>@lang('home.grade')</label>
            <input type="number" class="form-control" min="1" max="50" id="mark" name="mark" required autocomplete="off">
          </div>
            <button type="submit" class="btn btn-primary" id="savequestion" ><i class="fa fa-check"></i></button>
    </form>
     </div>
      </div>
    <div class="col-xl-8 col-md-8">
      <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
    <a class="btn btn-primary" href="/exam/">endexam</a>
    <table  class="questions table text-center table-bordered" style="width:100%">
       <thead>
         <th class="text-center">#</th>
         <th class="text-center">@lang('home.question')</th>
         <th class="text-center">@lang('home.option1')</th>
         <th class="text-center">@lang('home.option2')</th>
         <th class="text-center">@lang('home.option3')</th>
         <th class="text-center">@lang('home.option4')</th>
         <th class="text-center">@lang('home.correctanswer')</th>
         <th class="text-center">@lang('home.grade')</th>
         <th class="text-center"></th>
       </thead>
       <tbody>
            <?php $questions=App\question::where('exam_id',$exam->id)->orderby('id','Desc')->get();?>
            @foreach ($questions as $k => $question)
            <tr>
                <td>{{$k+1}}</td>
                <td>{{$question->question}}</td>
                <td>{{$question->option1}}</td>
                <td>{{$question->option2}}</td>
                <td>{{$question->option3}}</td>
                <td>{{$question->option4}}</td>
                <td>{{$question->correctanswer}}</td>
                <td>{{$question->mark}}</td>
                <td><a class="btn btn-danger {{$question->id}}" title="{{$question->id}}"><i class="fa fa-trash"></i></a>
                <a class="btn btn-primary {{$question->id}} edit" title="{{$question->id}}" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-edit"></i></a></td>

            </tr>
            @endforeach
       </tbody>
    </table>
    </div>
    </div>
 </div>
</div>
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> --}}

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

          </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    //     window.onbeforeunload = function(event)
    // {
    //     return confirm("Confirm refresh");
    // };
        $("#subfor").submit(function(e){
               e.preventDefault();
               var question=$('#question').val();
               var option1=$('#option1').val();
               var option2=$('#option2').val();
               var option3=$('#option3').val();
               var option4=$('#option4').val();
               var correctanswer=$('#correctanswer').val();
               var mark=$('#mark').val();
               var exam_id=$('#examid').val();
                $.ajax({
                 type:'post',
                 url:'/question',
                 data:{exam_id:exam_id,question:question,option1:option1,option2:option2,option3:option3,option4:option4,correctanswer:correctanswer,mark:mark},
                 dataType:'json',
                success:function(data){
                  $('#question').val('');
                  $('#option1').val('');
                  $('#option2').val('');
                  $('#option3').val('');
                  $('#option4').val('');
               $('#correctanswer').val('');
               $('#mark').val('');
               $("table.questions").load(" table.questions>*");
            },
            error:function(data)
            {
             $.each(data.responseJSON.errors, function(i, item) {
              alert(item);
          });
            }
          });
        });
          $(document).on('click','.btn-danger',function(e){
          e.preventDefault();
                var id=$(this).attr('title');
                $.ajax({
                 type:'delete',
                 url:'/question/'+id,
                 dataType:'json',
                 success:function(data){
                    $('.btn-danger.'+id).parents('tr').remove();
                 }
               });
            });
          $(document).on('click','.btn-primary.edit',function(e){
            e.preventDefault();
            var id=$(this).attr('title');
            $.ajax({
                 type:'get',
                 url:'/question/'+id,
                 dataType:'json',
                success:function(data){
                    var opt1=false; var opt2=false; var opt3=false; var opt4=false;
                if(data.data.correctanswer==1)
                {
                    $('.modal-body').html('<form method="POST" action="" id="updatefor" style="width:100%"><div class="form-group" ><label>Question</label><textarea class="form-control" id="question1" name="question"  required>'+data.data.question+'</textarea> </div><div class="form-group" ><label>Option1</label><input type="text" class="form-control"  id="option11" name="option1" value="'+data.data.option1+'" required autocomplete="off"></div> <div class="form-group" ><label>Option2</label><input type="text" class="form-control" id="option21" value="'+data.data.option2+'" name="option2" required autocomplete="off"></div> <div class="form-group" ><label>Option3</label><input type="text" class="form-control" id="option31" value="'+data.data.option3+'" name="option3" required autocomplete="off"></div><div class="form-group" > <label>Option4</label><input type="hidden" value="'+data.data.exam_id+'" id="examid1" name="examid"> <input type="text" class="form-control" id="option41" value="'+data.data.option4+'" name="option4" required autocomplete="off"> </div><div class="form-group" ><label>Correctanswer</label><select  id="correctanswer1" class="form-control"><option value="1" {{"selected"}} >option1</option><option value="2"  >option2</option><option value="3" >option3</option><option value="4">option4</option></select></div><div class="form-group" ><label>Mark</label><input type="number" class="form-control" min="1" max="50" id="mark1" name="mark" value="'+data.data.mark+'" required autocomplete="off"></div><button type="submit" class="btn btn-primary" id="updatequestion" ><i class="fa fa-check"></i></button></form>');
                }
                else if(data.data.correctanswer==2)
                {
                    $('.modal-body').html('<form method="POST" action="" id="updatefor" style="width:100%"><div class="form-group" ><label>Question</label><textarea class="form-control" id="question1" name="question"  required>'+data.data.question+'</textarea> </div><div class="form-group" ><label>Option1</label><input type="text" class="form-control"  id="option11" name="option1" value="'+data.data.option1+'" required autocomplete="off"></div> <div class="form-group" ><label>Option2</label><input type="text" class="form-control" id="option21" value="'+data.data.option2+'" name="option2" required autocomplete="off"></div> <div class="form-group" ><label>Option3</label><input type="text" class="form-control" id="option31" value="'+data.data.option3+'" name="option3" required autocomplete="off"></div><div class="form-group" > <label>Option4</label><input type="hidden" value="'+data.data.exam_id+'" id="examid1" name="examid"> <input type="text" class="form-control" id="option41" value="'+data.data.option4+'" name="option4" required autocomplete="off"> </div><div class="form-group" ><label>Correctanswer</label><select  id="correctanswer1" class="form-control"><option value="1" if(data.data.correctanswer==1){selected} >option1</option><option value="2" {{"selected"}}>option2</option><option value="3" >option3</option><option value="4">option4</option></select></div><div class="form-group" ><label>Mark</label><input type="number" class="form-control" min="1" max="50" id="mark1" name="mark" value="'+data.data.mark+'" required autocomplete="off"></div><button type="submit" class="btn btn-primary" id="updatequestion" ><i class="fa fa-check"></i></button></form>');

                }
                else if(data.data.correctanswer==3)
                {
                    $('.modal-body').html('<form method="POST" action="" id="updatefor" style="width:100%"><div class="form-group" ><label>Question</label><textarea class="form-control" id="question1" name="question"  required>'+data.data.question+'</textarea> </div><div class="form-group" ><label>Option1</label><input type="text" class="form-control"  id="option11" name="option1" value="'+data.data.option1+'" required autocomplete="off"></div> <div class="form-group" ><label>Option2</label><input type="text" class="form-control" id="option21" value="'+data.data.option2+'" name="option2" required autocomplete="off"></div> <div class="form-group" ><label>Option3</label><input type="text" class="form-control" id="option31" value="'+data.data.option3+'" name="option3" required autocomplete="off"></div><div class="form-group" > <label>Option4</label><input type="hidden" value="'+data.data.exam_id+'" id="examid1" name="examid"> <input type="text" class="form-control" id="option41" value="'+data.data.option4+'" name="option4" required autocomplete="off"> </div><div class="form-group" ><label>Correctanswer</label><select  id="correctanswer1" class="form-control"><option value="1" >option1</option><option value="2"  >option2</option><option value="3" {{"selected"}} >option3</option><option value="4" >option4</option></select></div><div class="form-group" ><label>Mark</label><input type="number" class="form-control" min="1" max="50" id="mark1" name="mark" value="'+data.data.mark+'" required autocomplete="off"></div><button type="submit" class="btn btn-primary" id="updatequestion" ><i class="fa fa-check"></i></button></form>');

                }
                else if(data.data.correctanswer==4)
                {
                    $('.modal-body').html('<form method="POST" action="" id="updatefor" style="width:100%"><div class="form-group" ><label>Question</label><textarea class="form-control" id="question1" name="question"  required>'+data.data.question+'</textarea> </div><div class="form-group" ><label>Option1</label><input type="text" class="form-control"  id="option11" name="option1" value="'+data.data.option1+'" required autocomplete="off"></div> <div class="form-group" ><label>Option2</label><input type="text" class="form-control" id="option21" value="'+data.data.option2+'" name="option2" required autocomplete="off"></div> <div class="form-group" ><label>Option3</label><input type="text" class="form-control" id="option31" value="'+data.data.option3+'" name="option3" required autocomplete="off"></div><div class="form-group" > <label>Option4</label><input type="hidden" value="'+data.data.exam_id+'" id="examid1" name="examid"> <input type="text" class="form-control" id="option41" value="'+data.data.option4+'" name="option4" required autocomplete="off"> </div><div class="form-group" ><label>Correctanswer</label><select  id="correctanswer1" class="form-control"><option value="1" >option1</option><option value="2"  >option2</option><option value="3">option3</option><option value="4"{{"selected"}} >option4</option></select></div><div class="form-group" ><label>Mark</label><input type="number" class="form-control" min="1" max="50" id="mark1" name="mark" value="'+data.data.mark+'" required autocomplete="off"></div><button type="submit" class="btn btn-primary" id="updatequestion" ><i class="fa fa-check"></i></button></form>');

                }
                $("#updatefor").submit(function(e){
               e.preventDefault();
               var question=$('#question1').val();
               var option1=$('#option11').val();
               var option2=$('#option21').val();
               var option3=$('#option31').val();
               var option4=$('#option41').val();
               var correctanswer=$('#correctanswer1').val();
               var mark=$('#mark1').val();
               var exam_id=$('#examid1').val();
                $.ajax({
                 type:'put',
                 url:'/question/'+data.data.id,
                 data:{exam_id:exam_id,question:question,option1:option1,option2:option2,option3:option3,option4:option4,correctanswer:correctanswer,mark:mark},
                 dataType:'json',
                success:function(data){
                  $('.modal').css('display','none');
                  $('.modal').attr('aria-hidden','true');
                  $('.modal').removeClass('show in');
                  $('.modal-backdrop').remove();
                  $("table.questions").load(" table.questions>*");
                  $('body').removeClass('modal-open')
                  $('.btn-primary.'+data.data.id).parents('tr').children('td:not(:last)').remove();
                  $('.btn-primary.'+data.data.id).parents('tr').prepend('<td>'+data.data.id+'</td><td>'+data.data.question+'</td><td>'+data.data.option1+'</td><td>'+data.data.option2+'</td><td>'+data.data.option3+'</td><td>'+data.data.option4+'</td><td>'+data.data.correctanswer+'</td><td>'+data.data.mark+'</td>');
                  $('#question').val('');
                  $('#option1').val('');
                  $('#option2').val('');
                  $('#option3').val('');
                  $('#option4').val('');
                  $('#correctanswer').val('');
                  $('#mark').val('');
                 }
                  });
                });
                }
                });
           });

    });
    </script>
@endsection

