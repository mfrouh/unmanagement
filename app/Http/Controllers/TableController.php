<?php

namespace App\Http\Controllers;

use App\sectiontable;
use App\setting;
use App\subjecttable;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['checkrole:admin']);
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
    public function savetable(Request $request)
    {
        $countplace=setting::first();
        for ($t = 1; $t<=$countplace['courseplace']; $t++){

            for ($i = 1; $i <= 6; $i++){
                $day =["sat", "sun","mon", "thus", "wed","thur"];
                    for ($j=1; $j <=5 ; $j++)
                    {

                     $y=$day[$i-1];
                     $table=subjecttable::where('tableid',$t)->where('tid',$j)->first();
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
                     $table=subjecttable::where('tableid',$t)->where('tid',$j)->first();
                     $table->$y=$request->input("$t$y$j");
                     $table->save();

                    }
                }
            }
     return back();
    }
    public function testteachertable()
    {
        if(count(setting::all())==1){
        return view('admin.admin.testteachertable');
        }
        return abort('404');
    }
    public function testteacherassistanttable()
    {
        if(count(setting::all())==1){
        return view('admin.admin.testteacherassistanttable');
        }
        return abort('404');
    }
}
