<?php

namespace App\Http\Controllers;

use App\group;
use App\section;
use App\sectiongroup;
use App\subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware(['checkrole:admin']);
    }
    public function index()
    {
        return view('admin.subject.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subject.create');
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
            'name'=>'required',
            'group_id'=> 'required',
            'user_id'=>'required',
            'teacherassistant'=>'required',
          ]);
          $subject            =  new subject();
          $subject->name      =  $request->name;
          $subject->group_id  =  $request->group_id;
          $subject->user_id   =  $request->user_id;
          $subject->teacherassistant=json_encode($request->teacherassistant);
          $subject->save();
          $numberofsection=group::where('id',$request->group_id)->first();
          for ($i=1; $i <= $numberofsection->countofsection ; $i++) {
              $section=new section();
              $section->name=$request->name.$i;
              $arr=array();
              $arr=$request->teacherassistant;
              $rand=array_rand($request->teacherassistant,1);
              $section->user_id=$arr[$rand];
              $sectiongroup=sectiongroup::where('group_id',$request->group_id)->where('name',$i)->first();
              $section->sectiongroup_id=$sectiongroup->id;
              $section->subject_id=$subject->id;
              $section->save();
          }
          return redirect('/subject');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(subject $subject)
    {
        return view('admin.subject.edit',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subject $subject)
    {
        $this->validate($request,[
            'name'=>'required',
            'group_id'=> 'required',
            'user_id'=>'required',
            'teacherassistant'=>'required',
          ]);
          $subject->name      =  $request->name;
          $subject->group_id  =  $request->group_id;
          $subject->user_id   =  $request->user_id;
          $subject->teacherassistant=json_encode($request->teacherassistant);
          $subject->save();
          $numberofsection=group::where('id',$request->group_id)->first();
          $section=section::where('subject_id',$subject->id)->delete();
          for ($i=1; $i <=$numberofsection->countofsection ; $i++) {
              $section=new section();
              $section->name=$request->name.$i;
              $arr=array();
              $arr=$request->teacherassistant;
              $rand=array_rand($request->teacherassistant,1);
              $section->user_id=$arr[$rand];
              $sectiongroup=sectiongroup::where('group_id',$request->group_id)->where('name',$i)->first();
              $section->sectiongroup_id=$sectiongroup->id;
              $section->subject_id=$subject->id;
              $section->save();
          }
          return redirect('/subject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(subject $subject)
    {
        $subject->delete();
        return back();
    }
}
