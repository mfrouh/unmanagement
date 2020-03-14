<?php

namespace App\Http\Controllers;

use App\sectiongroup;
use Illuminate\Http\Request;

class SectiongroupController extends Controller
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
        return view('admin.sectiongroup.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sectiongroup.create');
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
            'group_id'=>'required',
        ]);
        $sectiongroup=new sectiongroup();
        $sectiongroup->name=$request->name;
        $sectiongroup->group_id=$request->group_id;
        $sectiongroup->save();
        return redirect('/sectiongroup');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sectiongroup=sectiongroup::find($id);
        return view('admin.sectiongroup.edit',compact('sectiongroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'group_id'=>'required',
        ]);
        $sectiongroup=sectiongroup::find($id);
        $sectiongroup->name=$request->name;
        $sectiongroup->group_id=$request->group_id;
        $sectiongroup->save();
        return redirect('/sectiongroup');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sectiongroup=sectiongroup::find($id);
        $sectiongroup->delete();
        return back();
    }
}
