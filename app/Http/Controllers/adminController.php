<?php

namespace App\Http\Controllers;

use App\coursesize;
use App\groupsize;
use App\restgroup;
use App\restuser;
use App\setting;

use Illuminate\Http\Request;

class adminController extends Controller
{
 public function __construct()
 {
     return $this->middleware(['checkrole:admin']);
 }

 public function addsetting(Request $request)
 {
     $setting5=setting::count();
     $setting1=setting::first();
     if($setting5==0){
     $setting=new setting();
     $setting->courseplace=$request->courseplace;
     $setting->sectionplace=$request->sectionplace;
     $setting->save();
     createtable($request->courseplace,$request->sectionplace);
     return response()->json(['success'=>'success ']);
     }
     else {
     $setting=setting::find($setting1->id);
     $setting->courseplace=$request->courseplace;
     $setting->sectionplace=$request->sectionplace;
     $setting->save();
     createtable($request->courseplace,$request->sectionplace);
     return response()->json(['success'=>'success']);

     }
 }
 public function addrestuser(Request $request)
 {
     $restuser5=restuser::where('user_id',$request->user)->count();
     $restuser1=restuser::where('user_id',$request->user)->first();
     if($restuser5==0){
     $restuser=new restuser();
     $restuser->user_id=$request->user;
     if($request->days!=null){
     $restuser->days=json_encode($request->days);
     }
     else {
      $restuser->days='["0"]';
     }
     if($request->time!=null){
         $restuser->time=json_encode($request->time);
      }
     else {
          $restuser->time='["0"]';
     }
     $restuser->save();
     return response()->json(['success'=>'success ']);
     }
     else {
     $restuser=restuser::find($restuser1->id);
     $restuser->user_id=$request->user;
     if($request->days!=null){
         $restuser->days=json_encode($request->days);
      }
     else {
          $restuser->days='["0"]';
     }
     if($request->time!=null){
         $restuser->time=json_encode($request->time);
      }
     else {
          $restuser->time='["0"]';
     }
     $restuser->save();
     return response()->json(['success'=>'success']);

     }
 }
 public function addrestgroup(Request $request)
 {
     $restgroup5=restgroup::where('group_id',$request->group)->count();
     $restgroup1=restgroup::where('group_id',$request->group)->first();
     if($restgroup5==0){
     $restgroup=new restgroup();
     $restgroup->group_id=$request->group;
     if($request->days!=null){
     $restgroup->days=json_encode($request->days);
     }
     else {
     $restgroup->days='["0"]';
     }
     if($request->time!=null){
     $restgroup->time=json_encode($request->time);
     }
     else {
     $restgroup->time='["0"]';
     }
     $restgroup->save();
     return response()->json(['success'=>'success ']);
     }
     else {
     $restgroup=restgroup::find($restgroup1->id);
     $restgroup->group_id=$request->group;
     if($request->days!=null){
     $restgroup->days=json_encode($request->days);
     }
     else {
     $restgroup->days='["0"]';
     }
     if($request->time!=null){
     $restgroup->time=json_encode($request->time);
     }
     else {
     $restgroup->time='["0"]';
     }
     $restgroup->save();
     return response()->json(['success'=>'success']);

     }
 }
 public function setting()
 {
     return view('admin.admin.setting');
 }
 public function restgroup()
 {
     return view('admin.admin.restgroup');
 }
 public function restuser()
 {
     return view('admin.admin.restuser');
 }
 public function groupsize()
 {
     if(setting::count()==1){
     return view('admin.admin.groupsize');
     }
     return abort('404');
 }
 public function coursesize()
 {

    if(setting::count()==1){
     return view('admin.admin.coursesize');
    }
    return abort('404');
 }
 public function addgroupsize(Request $request)
 {
     $restgroup5=groupsize::where('group_id',$request->group)->count();
     $restgroup1=groupsize::where('group_id',$request->group)->first();
     if($restgroup5==0){
     $restgroup=new groupsize();
     $restgroup->group_id=$request->group;
     if($request->table!=null){
        $restgroup->table=json_encode($request->table);
     }
     else{
        $restgroup->table='["0"]';
     }
     $restgroup->save();
     return response()->json(['success'=>'success ']);
     }
     else {
     $restgroup=groupsize::find($restgroup1->id);
     $restgroup->group_id=$request->group;
     if($request->table!=null){
        $restgroup->table=json_encode($request->table);
     }
     else{
        $restgroup->table='["0"]';
     }
     $restgroup->save();
     return response()->json(['success'=>'success']);

     }
 }
 public function addcoursesize(Request $request)
 {
     $restgroup5=coursesize::where('subject_id',$request->course)->count();
     $restgroup1=coursesize::where('subject_id',$request->course)->first();
     if($restgroup5==0){
     $restgroup=new coursesize();
     $restgroup->subject_id=$request->course;
     if($request->table!=null){
        $restgroup->table=json_encode($request->table);
     }
     else{
        $restgroup->table='["0"]';
     }
     $restgroup->save();
     return response()->json(['success'=>'success ']);
     }
     else {
     $restgroup=coursesize::find($restgroup1->id);
     $restgroup->subject_id=$request->course;
     if($request->table!=null){
        $restgroup->table=json_encode($request->table);
     }
     else{
        $restgroup->table='["0"]';
     }
      $restgroup->save();
     return response()->json(['success'=>'success']);

     }
 }

}
