<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
class publicController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    public function myinformation()
    {
        return view('admin.setting.myinformation');
    }
    public function information(Request $request)
    {
      $user =User::find(auth()->user()->id);
      $user->name=$request->name;
      $user->email=$request->email;
      if($request->image){
        $user->image=sorteimage('storage/user',$request->image);
      }
      else{
        $user->image=$user->image;
      }
      $user->save();
      return back();
    }
    public function changepassword(Request $request)
    {
        $this->validate($request,[
             'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
      $user =User::find(auth()->user()->id);
      if (Hash::check($request->oldpassword,$user->password )) {
        $user->password=Hash::make($request->password);
        $user->save();
       }


     return back();

    }

}
