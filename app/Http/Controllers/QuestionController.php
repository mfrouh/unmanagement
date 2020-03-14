<?php

namespace App\Http\Controllers;

use App\question;
use App\exam;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->role =='teacher' || auth()->user()->role =='teacherassistant') {
        $this->validate($request,[
        'question'=>'required',
        'option1'=>'required',
        'option2'=>'required',
        'option3'=>'required',
        'option4'=>'required',
        'correctanswer'=>'required',
        'mark'=>'required',
        'image'=>'',
        ]);
        $question =new question();
        $question->question=$request->question;
        $question->option1=$request->option1;
        $question->option2=$request->option2;
        $question->option3=$request->option3;
        $question->option4=$request->option4;
        $question->correctanswer=$request->correctanswer;
        $question->mark=$request->mark;
        $question->exam_id=$request->exam_id;
        $question->save();
        return response()->json(['success'=>'question add']);
        }
        return abort('404');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(question $question)
    {
        if (auth()->user()->role=='teacher' || auth()->user()->role=='teacherassistant') {
            return response()->json(['data'=>$question]);
        }
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(question $question)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, question $question)
    {
        if (auth()->user()->role=='teacher' ||auth()->user()->role=='teacherassistant') {
        $this->validate($request,[
            'question'=>'required',
            'option1'=>'required',
            'option2'=>'required',
            'option3'=>'required',
            'option4'=>'required',
            'correctanswer'=>'required',
            'mark'=>'required',
            'image'=>'',
            ]);
            $question->question=$request->question;
            $question->option1=$request->option1;
            $question->option2=$request->option2;
            $question->option3=$request->option3;
            $question->option4=$request->option4;
            $question->correctanswer=$request->correctanswer;
            $question->mark=$request->mark;
            $question->exam_id=$request->exam_id;
            $question->save();
            return response()->json(['success'=>'question add']);
        }
        return abort('404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question)
    {
        if (auth()->user()->role=='teacher' ||auth()->user()->role=='teacherassistant') {

        $question->delete();
        return response()->json(['success'=>'delete']);
        }
        return abort('404');
    }
}
