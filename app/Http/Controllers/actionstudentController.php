<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\exam;
use App\question;
use App\studentresultexam;
use App\examsetting;
use Carbon\Carbon;

use App\Charts\UserChart;
class actionstudentController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['checkrole:student']);
    }
    public function doexam($id)
    {


        $rand_seed = Cookie::get(auth()->user()->id.$id.'rand_seed');
        if (!$rand_seed) {
            $rand_seed = mt_rand();
            Cookie::queue(auth()->user()->id.$id.'rand_seed', $rand_seed, 40);
        };

        $exam=exam::where('id',$id)->first();
        $examcount=exam::where('id',$id)->count();
        $studentresultexam=studentresultexam::where('exam_id',$id)->where('user_id',auth()->user()->id)->first();
        $studentresultexamcount=studentresultexam::where('exam_id',$id)->where('user_id',auth()->user()->id)->count();
        if($examcount>0){
        $questions=question::where('exam_id',$id)->orderByRaw("RAND({$rand_seed})")->limit('1')->take(10)->get();
        if(count($questions)>0
           && $studentresultexamcount==0
           && $exam->start <=now()
           && $exam->end >=now()
           && $exam->subject->studentclass_id==auth()->user()->student_details->studentclass_id
           )
           {
           return view('student.exam.doexam')->with('questions',$questions);
        }

        elseif(count($questions)>0 && $studentresultexamcount!=0)
        {
            $studentresultexam1=studentresultexam::where('exam_id',$id)->where('user_id',auth()->user()->id)->first();
            $chart = new UserChart;
            $chart->labels(['CorrectAnswer', 'WrongAnswer','NotAnswer']);
            $chart->dataset('My dataset', 'pie', [count(json_decode($studentresultexam1->correct,true)),count(json_decode($studentresultexam1->wrong,true)),count(json_decode($studentresultexam1->notanswer,true))])->backgroundColor(['green','red','blue']);
            $chart->title($studentresultexam1->exam->name, 14,'#111',true," sans-serif")	;
            $chart->displayAxes(false);
           return view('student.exam.result')->with('studentresultexam',$studentresultexam)->with('chart',$chart);
        }

        elseif(count($questions)>0 &&  $studentresultexamcount==0 && $exam->start >=now() || $exam->end <=now() )
        {
            return abort('403','exam is disactive');
        }

        elseif(count($questions)>0 &&  $studentresultexamcount==0 && $exam->subject->studentclass_id!=auth()->user()->student_details->studentclass_id )
        {
            return abort('403','Not for you');
        }

        elseif(count($questions)==0)
        {
         return abort('403','not have questions');
        }

      }
       return abort('404');
    }
    public function storeexam(Request $request)
    {
            $correct=array();
            $wrong=array();
            $correctk=array();
            $wrongk=array();
            $result=0;
            $exam_id=0;
            $total=0;
        foreach ($request->all() as $key => $value) {
            if(is_numeric($key))
            {
               $question=question::where('id',$key)->first();
               $exam_id=$question->exam_id;
              if($question->correctanswer==$value){
                $correct[$key]= $value;
                $correctk[]= $key;
                $result +=$question->mark;
              }
              if($question->correctanswer!=$value){
                $wrong[$key]= $value;
                $wrongk[]= $key;
            }
            }
        }
        $question1=question::where('exam_id',$request->exam_id)->get();
        foreach ($question1 as $k => $value) {
            $total+= $value->mark;
        }
        $notanswer =array();
        $questionnot=question::where('exam_id',$request->exam_id)->whereNotIn('id',$correctk)->whereNotIn('id',$wrongk)->get();
        foreach ($questionnot as $k => $value) {
            $notanswer[]= $value->id;
        }
        $questions=question::where('exam_id',$request->exam_id)->get();
        $st=studentresultexam::where('user_id',auth()->user()->id)->where('exam_id',$request->exam_id)->count();
        if($st==0){
        $exam=exam::find($request->exam_id);
        $studentresultexam=new studentresultexam();
        $studentresultexam->exam_id=$request->exam_id;
        $studentresultexam->user_id=auth()->user()->id;
        $studentresultexam->result=$result;
        $studentresultexam->correct=json_encode($correct);
        $studentresultexam->wrong=json_encode($wrong);
        $studentresultexam->notanswer=json_encode($notanswer);
        $studentresultexam->total=$total;
        $studentresultexam->score=($result/$total)*100;
        if($exam->gradepass > ($result/$total)*100){
        $studentresultexam->state='fail';
        }
        if($exam->gradepass <= ($result/$total)*100)
        {
            $studentresultexam->state='pass';
        }
        $studentresultexam->save();
        }
        return redirect()->route('resultexam',['id'=>$request->exam_id]);
    }
    public function resultexam($id)
    {
        $studentresultexam1=studentresultexam::where('exam_id',$id)->where('user_id',auth()->user()->id)->firstorfail();
        $chart = new UserChart;
        $chart->labels(['CorrectAnswer', 'WrongAnswer','NotAnswer']);
        $chart->dataset('My dataset', 'pie', [count(json_decode($studentresultexam1->correct,true)),count(json_decode($studentresultexam1->wrong,true)),count(json_decode($studentresultexam1->notanswer,true))])->backgroundColor(['green','red','blue']);
        $chart->title($studentresultexam1->exam->name, 14,  '#111',true," sans-serif")	;
        $chart->displayAxes(false);
       return view('student.exam.result')->with('studentresultexam',$studentresultexam1)->with('chart',$chart);
    }
    public function exams()
    {
       return view('student.exam.results');
    }
    public function myexams()
    {
       return view('student.exam.exams');
    }
    public function mytable()
    {
        return view('student.table.mytable');
    }
    public function sessionexam(Request $request)
    {
        $arr=[0,1,2,3,4,5,6,7,8,9];
        $day=0;$hour=0;$minute=0;$second=0;
        $date=Carbon::now()->addMinutes($request->timeer);
        if(in_array($date->get('day'),$arr))
        {
          $day="0".$date->get('day');
        }
        else
        {
            $day=$date->get('day');
        }
        if(in_array($date->get('hour'),$arr))
        {
          $hour="0".$date->get('hour');
        }
        else
        {
            $hour=$date->get('hour');
        }
        if(in_array($date->get('minute'),$arr))
        {
          $minute="0".$date->get('minute');
        }
        else
        {
            $minute=$date->get('minute');
        }
        if(in_array($date->get('second'),$arr))
        {
          $second="0".$date->get('second');
        }
        else
        {
            $second=$date->get('second');
        }
        $totalend=$day.$hour.$minute.$second;
        $examf=examsetting::where('user_id',auth()->user()->id)->where('exam_id',$request->exam)->count();
        $ex=examsetting::where('user_id',auth()->user()->id)->where('exam_id',$request->exam)->first();
     if($examf==0){
        $examsetting=new examsetting();
        $examsetting->name=auth()->user()->id."__".$request->exam;
        $examsetting->user_id=auth()->user()->id;
        $examsetting->exam_id=$request->exam;
        $examsetting->end=$totalend=$day.$hour.$minute.$second;
        $examsetting->save();
        return response()->json(['success'=>'ok','data'=>$examsetting]);
    }
    else{
        $arr=[0,1,2,3,4,5,6,7,8,9];
        $day;$hour;$minute;$second;
        $date=Carbon::now();
        if(in_array($date->get('day'),$arr))
        {
          $day="0".$date->get('day');
        }
        else
        {
            $day=$date->get('day');
        }
        if(in_array($date->get('hour'),$arr))
        {
          $hour="0".$date->get('hour');
        }
        else
        {
            $hour=$date->get('hour');
        }
        if(in_array($date->get('minute'),$arr))
        {
          $minute="0".$date->get('minute');
        }
        else
        {
            $minute=$date->get('minute');
        }
        if(in_array($date->get('second'),$arr))
        {
          $second="0".$date->get('second');
        }
        else
        {
            $second=$date->get('second');
        }
        $totalnow=$day.$hour.$minute.$second;
        // $tnowsec=$day*60*60*24+$hour*60*60+$minute*60+$second;
       if( $totalnow >= $ex->end){
        return response()->json(['success'=>'foundend','data'=>$totalnow]);
       }
       else
       {
        $ag = str_split($ex->end, strlen($ex->end)/4);

         $tnowsec=$day*60*60*24+$hour*60*60+$minute*60+$second;
         $tnowsecend=$ag[0]*60*60*24+$ag[1]*60*60+($ag[2])*60+$ag[3];
        return response()->json(['success'=>'foundnotend','data'=>($tnowsecend-$tnowsec)]);
       }
    }
    }
    public function mysubjectcontent($id)
    {
       $arr=array();
      foreach (auth()->user()->student_details->studentclass->subject as $key => $value) {
           $arr[]=$value->id;
        }
      if (in_array($id,$arr)) {
        return view('student.content.mysubjectcontent',compact('id'));
      }
      return abort('404');
    }

}
