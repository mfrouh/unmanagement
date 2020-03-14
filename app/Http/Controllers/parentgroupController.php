<?php

namespace App\Http\Controllers;

use App\parentgroup;
use Illuminate\Http\Request;

class parentgroupController extends Controller
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
        return view('admin.parentgroup.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.parentgroup.create');
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
        ]);
        $parentgroup=new parentgroup();
        $parentgroup->name=$request->name;
        $parentgroup->save();
        return redirect('/parentgroup');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\parentgroup  $parentgroup
     * @return \Illuminate\Http\Response
     */
    public function show(parentgroup $parentgroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\parentgroup  $parentgroup
     * @return \Illuminate\Http\Response
     */
    public function edit(parentgroup $parentgroup)
    {
        return view('admin.parentgroup.edit',compact('parentgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\parentgroup  $parentgroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, parentgroup $parentgroup)
    {
        $this->validate($request,[
            'name'=>'required',
          ]);
          $parentgroup->name=$request->name;
          $parentgroup->save();
          return redirect('/parentgroup');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\parentgroup  $parentgroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(parentgroup $parentgroup)
    {
        $parentgroup->delete();
        return back();
    }
}
