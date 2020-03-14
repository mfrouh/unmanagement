<?php

namespace App\Http\Controllers;

use App\section;
use Illuminate\Http\Request;

class SectionController extends Controller
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
        return view('admin.section.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.section.create');
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
            'sectiongroup_id'=> 'required',
            'user_id'=>'required',
            'subject_id'=>'required'
          ]);
          $section            =  new section();
          $section->name   =  $request->name;
          $section->sectiongroup_id  =  $request->sectiongroup_id;
          $section->subject_id  =  $request->subject_id;
          $section->user_id   =  $request->user_id;
          $section->save();
          return redirect('/section');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(section $section)
    {
        return view('admin.section.edit',compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, section $section)
    {
        $this->validate($request,[
            'name'=>'required',
            'sectiongroup_id'=> 'required',
            'user_id'=>'required',
            'subject_id'=>'required'
          ]);
          $section->name   =  $request->name;
          $section->sectiongroup_id  =  $request->sectiongroup_id;
          $section->subject_id  =  $request->subject_id;
          $section->user_id   =  $request->user_id;
          $section->save();
          return redirect('/section');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(section $section)
    {
        $section->delete();
        return back();
    }
}
