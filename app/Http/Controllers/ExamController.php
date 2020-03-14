<?php

namespace App\Http\Controllers;

use App\exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware(['checkrole:teacher']);
    }
    public function index()
    {
        return view('teacher.exam.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('teacher.exam.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          =>   'required',
            'duration'      =>   'required',
            'subject_id'    =>   'required',
            'gradepass'     =>   "required",
            'start'         =>   "required",
            'end'           =>   "required",
          ]);
          $exam               =  new exam();
          $exam->name         =  $request->name;
          $exam->duration     =  $request->duration;
          $exam->gradepass    =  $request->gradepass;
          $exam->start        =  $request->start;
          $exam->end          =  $request->end;
          $exam->subject_id   =  $request->subject_id;
          $exam->user_id      =  auth()->user()->id;
          $exam->save();
          return redirect('/createquestion/'.$exam->id);
    }
    public function createquestion($id)
    {
        $exam=exam::findorfail($id);
        return view('teacher.exam.question',compact('exam'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(exam $exam)
    {
        if($exam->user_id==auth()->user()->id){

          return view('teacher.exam.edit',compact('exam'));
        }
        return abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, exam $exam)
    {
        $this->validate($request,[
            'name'           =>'required',
            'duration'       =>'required',
            'subject_id'     =>'required',
            'gradepass'      =>"required",
            'start'          =>"required",
            'end'            =>"required",
          ]);
          $exam->name         =  $request->name;
          $exam->duration     =  $request->duration;
          $exam->gradepass    =  $request->gradepass;
          $exam->start        =  $request->start;
          $exam->end          =  $request->end;
          $exam->subject_id   =  $request->subject_id;
          $exam->user_id      =  auth()->user()->id;
          $exam->save();
          return redirect('/createquestion/'.$exam->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(exam $exam)
    {
       if($exam->user_id==auth()->user()->id){
        $exam->delete();
        return back();
       }
       return abort('404');
    }

}
