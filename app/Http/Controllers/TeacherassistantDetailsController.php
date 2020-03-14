<?php

namespace App\Http\Controllers;

use App\restuser;
use App\User;
use Illuminate\Http\Request;

class TeacherassistantDetailsController extends Controller
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
        return view('admin.teacherassistant.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacherassistant.create');
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
            'email'=> 'required|email',
            'phone_number'=>"required|min:11|max:11",
            'data_of_birth'=>'date',
            'address'=>'required',
            'gender'=>'required',
            'password'=>'confirmed|required'
          ]);
          $user=new User();
          $user->name=$request->name;
          $user->email=$request->email;
          $user->role='teacherassistant';
          $user->phone_number=$request->phone_number;
          $user->date_of_birth=$request->date_of_birth;
          $user->password=bcrypt($request->password);
          $user->address=$request->address;
          $user->gender=$request->gender;
          $user->save();
          $restuser=new restuser();
          $restuser->user_id=$user->id;
          $restuser->days='["0"]';
          $restuser->time='["0"]';
          $restuser->save();
          return redirect('/teacherassistant');

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
        $teacherassistant=User::find($id);
        return view('admin.teacherassistant.edit',compact('teacherassistant'));
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
            'email'=> 'required|email',
            'phone_number'=>"required|min:11|max:11",
            'data_of_birth'=>'date',
            'address'=>'required',
            'gender'=>'required',
            'password'=>'confirmed|required'
          ]);
          $user= User::find($id);
          $user->name=$request->name;
          $user->email=$request->email;
          $user->role='teacherassistant';
          $user->phone_number=$request->phone_number;
          $user->date_of_birth=$request->date_of_birth;
          $user->address=$request->address;
          $user->password=bcrypt($request->password);
          $user->gender=$request->gender;
          $user->save();
          return redirect('/teacherassistant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return back();
    }
}
