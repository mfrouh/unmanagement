<?php

namespace App\Http\Controllers;

use App\group;
use App\groupsize;
use App\restgroup;
use App\sectiongroup;
use Illuminate\Http\Request;

class GroupController extends Controller
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
        return view('admin.group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.group.create');
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
          'countofsection'=> 'required',
          'parentgroup'=> 'required',
        ]);
        $group=new group();
        $group->name=$request->name;
        $group->countofsection=$request->countofsection;
        $group->parentgroup_id=$request->parentgroup;
        $group->save();
        for ($i=1; $i <=$request->countofsection ; $i++) {
            $sectiongroup=new sectiongroup();
            $sectiongroup->name=$request->name.$i;
            $sectiongroup->group_id=$group->id;
            $sectiongroup->save();
        }
        $groupsize=new groupsize();
        $groupsize->group_id=$group->id;
        $groupsize->table='["1"]';
        $groupsize->save();
        $restgroup=new restgroup();
        $restgroup->group_id=$group->id;
        $restgroup->days='["0"]';
        $restgroup->time='["0"]';
        $restgroup->save();
        return redirect('/group');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(group $group)
    {
        return view('admin.group.edit',compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, group $group)
    {
        $this->validate($request,[
            'name'=>'required',
            'countofsection'=> 'required',
            'parentgroup'=> 'required',
          ]);
          $group->name=$request->name;
          $group->countofsection=$request->countofsection;
          $group->parentgroup_id=$request->parentgroup;
          $group->save();
          return redirect('/group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(group $group)
    {
        $group->delete();
        return back();
    }
}
