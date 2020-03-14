<?php

namespace App\Http\Controllers;

use App\content;
use Illuminate\Http\Request;

class SectioncontentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware(['checkrole:teacherassistant']);
    }
    public function index()
    {
        return view('teacherassistant.content.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacherassistant.content.create');
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
            'title'=>'required',
            'content'=> 'required',
            'subject_id'=> 'required',
            'sectiongroup'=>"required",
          ]);
          $content = new content();
          $content->title       =  $request->title;
          $content->content     =  $request->content;
          $content->subject_id  =  $request->subject_id;
          $content->user_id      =  auth()->user()->id;
          if ($request->sectiongroup) {
            $content->sectiongroup=json_encode($request->sectiongroup);
         }
          $content->save();
          return redirect('/sectioncontent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(content $content)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content=content::find($id);
        if($content->user_id==auth()->user()->id){

        return view('teacherassistant.content.edit',compact('content'));
        }
        return abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=> 'required',
            'subject_id'=> 'required',
            'sectiongroup'=>'required'
          ]);
          $content              =content::find($id);
          $content->title       =  $request->title;
          $content->content     =  $request->content;
          $content->subject_id  =  $request->subject_id;
          $content->user_id      =  auth()->user()->id;
          if ($request->sectiongroup) {
            $content->sectiongroup=json_encode($request->sectiongroup);
         }
          $content->save();
          return redirect('/sectioncontent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content=content::find($id);
        if($content->user_id==auth()->user()->id){
        $content->delete();
        return back();
        }
        return abort('404');
    }
}
