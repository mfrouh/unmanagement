$(function() {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $.each(localStorage, function(i, item) {
      if(i==$('.sparkline11-list a.'+i).attr('type'))
      {
        $('.sparkline11-list a.'+i).css('border','5px solid red');
      }
    });
    $('a.btn-danger').click(function(){
      var id=$(this).attr('title');
      valu=$(this).attr('type');
      $('.sparkline11-list a.re'+valu).css('border','5px solid red');
      localStorage.setItem( 're'+valu, $(this).attr('type'));
    });
    $('a.btn-default').click(function(){
      valu=$(this).attr('type');
      if(localStorage.getItem('re'+valu))
      {
        localStorage.removeItem('re'+valu);
        $('.sparkline11-list a.re'+valu).css('border','5px solid #337ab7');
      }
    });
    $('.sparkline11-list a').click(function(){
      var id=$(this).attr('title');
      $('.sparkline11-list table.'+id).siblings('.sparkline11-list table').addClass('hide');
      $('.sparkline11-list table.'+id).removeClass('hide');
    });
    $('table a').click(function(){
      var id=$(this).attr('title');
      $('.sparkline11-list table.'+id).siblings('.sparkline11-list table').addClass('hide');
      $('.sparkline11-list table.'+id).removeClass('hide');
    });
$('input:radio').on('change', function() {
        $('input:radio').each(function() {
            if ($(this).is(':checked') == true) {
                localStorage.setItem( $(this).attr('class'), $(this).val());
                $('.sparkline11-list a.na'+$(this).attr('class')).css('background','green');
            }
        });
      });
         $.each(localStorage, function(i, item) {
           if(i==$('input[type=radio].'+i).attr('class')){
          var itemValue=  item;
          if (itemValue !== null) {
          $("input[type=radio][value=\""+itemValue+"\"]."+i).click();
          }
           }
          });


    $(window).load(function(e){
      var timeer=$('#start').attr('title');
      var exam=$('#exam_id').val();
      var au=$('#au').val();
             $.ajax({
                 type:'post',
                 url:'/sessionexam',
                 data:{timeer:timeer,exam:exam,au:au},
                 dataType:'json',
                 success:function(data){
                  if(data.success=="foundnotend"){
                    localStorage.setItem(au+"__"+exam+"endtime",data.data);

                  }
                   if(data.success=="foundend"){
                    clearInterval(time);
                    $('#timer').hide();
                    $('input').removeAttr('required');
                    $('#subforma').submit();

                   }
                 }
               });
      var sec = 60*timeer;
      var now =new Date();
      var y =new Date();
      var endsec =new Date();
      var end= new Date( now.getTime() + sec);
      endsec.setMinutes(now.getMinutes() + sec/60);
      var hh= localStorage.getItem(au+"__"+exam+"endtime");
      var time = setInterval(myTimer, 1000);
      function myTimer() {
       now++;
      if(localStorage.getItem(au+"__"+exam+"cont")){
        var old= localStorage.getItem(au+"__"+exam+"cont");
        var hu = localStorage.getItem(au+"__"+exam+"end") - old;
       if(hh && hh>0){
        var g = hh;
        }else
        {
         var g = localStorage.getItem(au+"__"+exam+"end") - old;
        }
         hh--;
        old++;
        localStorage.setItem(au+"__"+exam+"cont", old);
        var ar=Array(0,1,2,3,4,5,6,7,8,9);
        var mint;
        var seconds;
        var ho;
       if(jQuery.inArray(Math.floor(g/60),ar) !== -1)
       {
          mint="0"+Math.floor(g/60);

       }else
       {
        if(Math.floor(g/60)>= 60 )
         {
          ho=Math.floor(g/60)/60;
          if(jQuery.inArray(Math.floor(g/60)%60,ar) !== -1){
          mint="0"+Math.floor(ho)+":"+"0"+Math.floor(g/60)%60;
          }
          else
          {
            mint="0"+Math.floor(ho)+":"+Math.floor(g/60)%60;
          }
         }else
         {
          mint="00:"+Math.floor(g/60);
         }

       }
       if(jQuery.inArray(g%60,ar) !== -1)
       {
        seconds="0"+g%60;
       }else
       {
        seconds=g%60;
       }
        document.getElementById('timer').innerHTML =  mint+":"+seconds ;
        if(g == 0)
        {
          clearInterval(time);
          $('#timer').hide();
          $('input').removeAttr('required');
          $('#subforma').submit();

        }

      }else
      {
        localStorage.setItem(au+"__"+exam+"cont", now);
        localStorage.setItem(au+"__"+exam+"end", end.getTime());
        localStorage.setItem(au+"__"+exam+"thr", endsec);
      }

 }

});


});

