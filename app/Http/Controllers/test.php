<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\parentgroup;
use App\group;
use App\studentgroup;
use App\teachergroup;
use App\teacherassistantgroup;
use App\User;
use App\section;
use App\course;
use App\setting;
use App\restgroup;
use App\restuser;
use App\sectiontable;
use App\teachertable;
use Hash;
use App\groupsize;
use App\sectiongroup;
use App\coursesize;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole:4');

    }
    public function teachers()
    {
        return view('admin.teacher');
    }
    public function teacherassistants()
    {
        return view('admin.teacherassistant');
    }
    public function students()
    {
        return view('admin.student');
    }
    public function groups()
    {
        return view('admin.group');
    }
    public function parentgroups()
    {
        return view('admin.parentgroup');
    }
    public function studentgroups()
    {
        return view('admin.studentgroup');
    }
    public function teachergroups()
    {
        return view('admin.teachergroup');
    }
    public function teacherassistantgroups()
    {
        return view('admin.teacherassistantgroup');
    }
    public function teachertable()
    {
        return view('admin.teachertable');
    }
    public function testteachertable()
    {
        return view('admin.testteachertable');
    }
    public function testteacherassistanttable()
    {
        return view('admin.testteacherassistanttable');
    }
    public function groupsize()
    {
        return view('admin.groupsize');
    }
    public function coursesize()
    {
        return view('admin.coursesize');
    }
    public function showtable($id)
    {
        return view('admin.showtable')->with('id',$id);
    }
    public function showusertable($id)
    {
        return view('admin.showusertable')->with('id',$id);
    }
    public function showteachertable($id)
    {
        return view('admin.showteachertable')->with('id',$id);
    }





    public function deleteteacherassistantgroup($id)
    {
        $teacherassistantgroup=teacherassistantgroup::find($id);
        $teacherassistantgroup->delete();
        return response()->json(['success'=>'success delete teacherassistantgroup']);
    }
    public function deleteuser($id)
    {
        $user=User::find($id);
        $user->delete();
        return response()->json(['success'=>'success delete ']);
    }
    public function deleteteachergroup($id)
    {
        $teachergroup=teachergroup::find($id);
        $teachergroup->delete();
        return response()->json(['success'=>'success delete teachergroup']);
    }
    public function deletestudentgroup($id)
    {
        $studentgroup=studentgroup::find($id);
        $studentgroup->delete();
        return response()->json(['success'=>'success delete studentgroup']);
    }
    public function deletegroup($id)
    {
        $group=group::find($id);
        $group->delete();
        return response()->json(['success'=>'success delete group']);
    }
    public function deleteparentgroup($id)
    {
        $parentgroup=parentgroup::find($id);
        $parentgroup->delete();
        return response()->json(['success'=>'success delete group']);
    }






    public function addteacherassistantgroup(Request $request)
    {
        $teacherassistantgroup=new teacherassistantgroup();
        $teacherassistantgroup->user_id=$request->user;
        $teacherassistantgroup->group_id=$request->groupname;
        $teacherassistantgroup->save();
        return response()->json(['success'=>'success add teacherassistantgroup']);
    }
    public function adduser(Request $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role_id=$request->role;
        $user->password=Hash::make($request->password);
        $user->save();
        return response()->json(['success'=>'success add ']);
    }
    public function addteachergroup(Request $request)
    {
        $teachergroup=new teachergroup();
        $teachergroup->user_id=$request->user;
        $teachergroup->group_id=$request->groupname;
        $teachergroup->save();
        return response()->json(['success'=>'success add teachergroup']);
    }
    public function addstudentgroup(Request $request)
    {
        $studentgroup=new studentgroup();
        $studentgroup->user_id=$request->user;
        $studentgroup->group_id=$request->groupname;
        $studentgroup->save();
        return response()->json(['success'=>'success add studentgroup']);
    }
    public function addgroup(Request $request)
    {
        $group=new group();
        $group->name=$request->nameg;
        $group->parentgroup_id=$request->namepg;
        $group->countofsection=$request->countofsection;
        $group->save();
        for ($i=1; $i <=$request->countofsection ; $i++) {
            $sectiongroup=new sectiongroup();
            $sectiongroup->name=$i;
            $sectiongroup->group_id=$group->id;
            $sectiongroup->save();
        }
        return response()->json(['success'=>'success add group']);
    }
    public function addparentgroup(Request $request)
    {
        $parentgroup=new parentgroup();
        $parentgroup->name=$request->name;
        $parentgroup->save();
        return response()->json(['success'=>'success add parentgroup']);
    }
    public function setting()
    {
        return view('admin.setting');
    }
    public function course()
    {
        return view('admin.course');
    }
    public function section()
    {
        return view('admin.section');
    }
    public function restgroup()
    {
        return view('admin.restgroup');
    }
    public function restuser()
    {
        return view('admin.restuser');
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
        dd($request->days);
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
    public function addgroupsize(Request $request)
    {
        $restgroup5=groupsize::where('group_id',$request->group)->count();
        $restgroup1=groupsize::where('group_id',$request->group)->first();
        if($restgroup5==0){
        $restgroup=new groupsize();
        $restgroup->group_id=$request->group;
        $restgroup->table=json_encode($request->table);
        $restgroup->save();
        return response()->json(['success'=>'success ']);
        }
        else {
        $restgroup=groupsize::find($restgroup1->id);
        $restgroup->group_id=$request->group;
        $restgroup->table=json_encode($request->table);
        $restgroup->save();
        return response()->json(['success'=>'success']);

        }
    }
    public function addcoursesize(Request $request)
    {
        $restgroup5=coursesize::where('course_id',$request->course)->count();
        $restgroup1=coursesize::where('course_id',$request->course)->first();
        if($restgroup5==0){
        $restgroup=new coursesize();
        $restgroup->course_id=$request->course;
        $restgroup->table=json_encode($request->table);
        $restgroup->save();
        return response()->json(['success'=>'success ']);
        }
        else {
        $restgroup=coursesize::find($restgroup1->id);
        $restgroup->course_id=$request->course;
        $restgroup->table=json_encode($request->table);
        $restgroup->save();
        return response()->json(['success'=>'success']);

        }
    }
    public function deletesetting($id)
    {
        $setting=setting::find($id);
        $setting->delete();
        return response()->json(['success'=>'success ']);
    }
    public function deleterestgroup($id)
    {
        $restgroup=restgroup::find($id);
        $restgroup->delete();
        return response()->json(['success'=>'success ']);
    }
    public function deletegroupsize($id)
    {
        $restgroup=groupsize::find($id);
        $restgroup->delete();
        return response()->json(['success'=>'success ']);
    }
    public function deletecoursesize($id)
    {
        $restgroup=coursesize::find($id);
        $restgroup->delete();
        return response()->json(['success'=>'success ']);
    }
    public function deleterestuser($id)
    {
        $restuser=restuser::find($id);
        $restuser->delete();
        return response()->json(['success'=>'success ']);
    }
    public function addcourse(Request $request)
    {
        $course=new course();
        $course->name=$request->name;
        $course->user_id=$request->user;
        $course->group_id=$request->group;
        $course->teacherassistant=json_encode($request->teacherassistant);
        $course->save();
        $numberofsection=group::where('id',$request->group)->first();
        for ($i=1; $i <=$numberofsection->countofsection ; $i++) {
            $section=new section();
            $section->name=$request->name.$i;
            $arr=array();
            $arr=$request->teacherassistant;
            $rand=array_rand($request->teacherassistant,1);
            $section->user_id=$arr[$rand];
            $section->group_id=$request->group;
            $sectiongroup=sectiongroup::where('group_id',$request->group)->where('name',$i)->first();
            $section->sectiongroup_id=$sectiongroup->id;
            $section->course_id=$course->id;
            $section->save();
        }
        return response()->json(['success'=>'success']);
    }
    public function deletecourse($id)
    {
        $course=course::find($id);
        $course->delete();
        return response()->json(['success'=>'success']);
    }
    public function addsection(Request $request)
    {
        $section=new section();
        $section->name=$request->name;
        $section->user_id=$request->user;
        $section->course_id=$request->course;
        $section->save();
        return response()->json(['success'=>'success ']);
    }
    public function deletesection($id)
    {
        $section=section::find($id);
        $section->delete();
        return response()->json(['success'=>'success']);
    }
    public function savetable(Request $request)
    {
        $countplace=setting::first();
        for ($t = 1; $t<=$countplace['courseplace']; $t++){

            for ($i = 1; $i <= 6; $i++){
                $day =["sat", "sun","mon", "thus", "wed","thur"];
                    for ($j=1; $j <=5 ; $j++)
                    {

                     $y=$day[$i-1];
                     $table=teachertable::where('tableid',$t)->where('tid',$j)->first();
                     $table->$y=NULL;
                     $table->save();

                    }
                }
            }
        for ($t = 1; $t <= $countplace['courseplace']; $t++){

            for ($i = 1; $i <= 6; $i++){
                $day =["sat", "sun","mon", "thus", "wed","thur"];
                    for ($j=1; $j <=5 ; $j++)
                    {

                     $y=$day[$i-1];
                     $table=teachertable::where('tableid',$t)->where('tid',$j)->first();
                     $table->$y=$request->input("$t$y$j");
                     $table->save();

                    }
                }
            }
     return back();
    }
    public function savesectiontable(Request $request)
    {
        $countplace=setting::first();
        for ($t = 1; $t<=$countplace['sectionplace']; $t++){

            for ($i = 1; $i <= 6; $i++){
                $day =["sat", "sun","mon", "thus", "wed","thur"];
                    for ($j=1; $j <=5 ; $j++)
                    {

                     $y=$day[$i-1];
                     $table=sectiontable::where('tableid',$t)->where('tid',$j)->first();
                     $table->$y=NULL;
                     $table->save();

                    }
                }
            }
        for ($t = 1; $t <= $countplace['sectionplace']; $t++){

            for ($i = 1; $i <= 6; $i++){
                $day =["sat", "sun","mon", "thus", "wed","thur"];
                    for ($j=1; $j <=5 ; $j++)
                    {

                     $y=$day[$i-1];
                     $table=sectiontable::where('tableid',$t)->where('tid',$j)->first();
                     $table->$y=$request->input("$t$y$j");
                     $table->save();

                    }
                }
            }
     return back();
    }
}
