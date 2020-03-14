<?php

namespace App\Http\Controllers;
use App\exam;
use App\studentresultexam;
use App\Charts\UserChart;
use App\question;
use Illuminate\Http\Request;

class actionteacherController extends Controller
{
    public function __construct()
    {
         return $this->middleware(['checkrole:teacher']);
    }
    public function resultexam($id)
    {
      $correct=array();
      $wrong=array();
      $notanswer=array();
        $examstud=studentresultexam::where('exam_id',$id)->get();
         foreach ($examstud as $key => $value) {
           foreach(json_decode($value->correct) as $c =>$f)
           {
            $correct[]=$c;
           }
           foreach(json_decode($value->wrong) as $j =>$g)
           {
            $wrong[]=$j;
           }
           foreach(json_decode($value->notanswer) as $l)
           {
            $notanswer[]=$l;
           }
         }
        $examstudent1=studentresultexam::where('exam_id',$id)->where('state','pass')->count();
        $examstudent2=studentresultexam::where('exam_id',$id)->where('state','fail')->count();
        $exam=exam::where('id',$id)->firstorfail();
        if($exam->subject->user_id==auth()->user()->id){
        $chart = new UserChart;
        $chart->labels(['PassStudent', 'FailStudent']);
        $chart->dataset('My dataset', 'pie', [$examstudent1,$examstudent2])->backgroundColor(['green','red']);
        $chart->title($exam->name, 14,  '#111'," sans-serif")	;
        $chart->displayAxes(false);
        $chart1 = new UserChart;
        $chart1->labels(['correct', 'wrong','notanswer']);
        $chart1->dataset('Questions', 'pie', [count($correct),count($wrong),count($notanswer)])->backgroundColor(['green','red','blue']);
        $chart1->title($exam->name, 14,  '#111'," sans-serif")	;
        $chart1->displayAxes(false);
        return view('teacher.exam.result')->with('exam',$exam)->with('chart1',$chart1)->with('chart',$chart)->with('wrong',$wrong)->with('correct',$correct)->with('notanswer',$notanswer)->with('id',$id);
        }
        return abort('404');
    }

    public function exams()
    {
       return view('teacher.exam.results');
    }
    public function details($examid,$userid)
    {
      $examstudent=studentresultexam::where('exam_id',$examid)->where('user_id',$userid)->first();
      $questions=question::where('exam_id',$examid)->get();
      return view('teacher.exam.detailsresultexam')->with('examstudent',$examstudent)->with('questions',$questions);
    }
    public function mytable()
    {
        return view('teacher.table.mytable');

    }

}

