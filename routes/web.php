<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/lang/{lang}', function ($lang) {
    if(auth()->check()){
    auth()->user()->lang=$lang;
    auth()->user()->save();
    return back();
    }
    else
    {
        if(session()->get('lang'))
        {
            session()->put('lang',$lang);
            return back();
        }
    }
});

Route::group(['middleware' => 'lang'], function () {

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();
Route::resource('group', 'GroupController');
Route::resource('parentgroup', 'parentgroupController');
Route::resource('sub_group', 'SubGroupController');
Route::resource('subject', 'SubjectController');
Route::resource('section', 'SectionController');
Route::resource('sectiongroup', 'SectiongroupController');
Route::resource('student', 'studentController');
Route::resource('teacher', 'teacherController');
Route::resource('teacherassistant', 'TeacherassistantDetailsController');
Route::resource('studentclass', 'StudentclassController');
Route::resource('content', 'ContentController');
Route::resource('exam', 'ExamController');
Route::resource('sectioncontent', 'SectioncontentController');
Route::resource('sectionexam', 'SectionexamController');
Route::resource('question', 'QuestionController');
Route::get('/createquestion/{id}', 'ExamController@createquestion');
Route::get('/createsectionquestion/{id}', 'SectionexamController@createquestion');
Route::get('/doexam/{id}', 'actionstudentController@doexam');
Route::post('/exam/storeexam', 'actionstudentController@storeexam');
Route::get('/resultexam/{id}', 'actionstudentController@resultexam')->name('resultexam');
Route::get('/results', 'actionstudentController@exams');
Route::get('/sectionresults', 'actionstudentController@sectionexams');
Route::get('/result/{id}', 'actionteacherController@resultexam');
Route::get('/resultexams', 'actionteacherController@exams');
Route::get('/details/{examid}/{userid}', 'actionteacherController@details');
Route::get('/resultsection/{id}', 'actionteacherassistantController@resultexam');
Route::get('/resultsectionexams', 'actionteacherassistantController@exams');
Route::get('/sectiondetails/{examid}/{userid}', 'actionteacherassistantController@details');
Route::get('/myinformation', 'publicController@myinformation');
Route::put('/information', 'publicController@information');
Route::put('/changepassword', 'publicController@changepassword');
Route::get('/exams', 'actionstudentController@myexams');
Route::get('/sectionexams', 'actionstudentController@mysectionexams');
Route::get('/mytable', 'actionstudentController@mytable');
Route::get('/mysubjectcontent/{id}', 'actionstudentController@mysubjectcontent');
Route::get('/mysectioncontent/{id}', 'actionstudentController@mysectioncontent');
Route::get('/table/{id}', 'adminController@table');
Route::post('/savetable', 'TableController@savetable');
Route::post('/savesectiontable', 'TableController@savesectiontable');
Route::get('/setting', 'adminController@setting');
Route::post('/addsetting', 'adminController@addsetting');
Route::get('/restuser', 'adminController@restuser');
Route::post('/addrestuser', 'adminController@addrestuser');
Route::get('/restgroup', 'adminController@restgroup');
Route::post('/addrestgroup', 'adminController@addrestgroup');
Route::post('/sessionexam', 'actionstudentController@sessionexam');
Route::get('/subjecttable', 'TableController@testteachertable');
Route::get('/sectiontable', 'TableController@testteacherassistanttable');
Route::get('/groupsize', 'adminController@groupsize');
Route::post('/addgroupsize', 'adminController@addgroupsize');
Route::get('/coursesize', 'adminController@coursesize');
Route::post('/addcoursesize', 'adminController@addcoursesize');

Route::get('/register', function(){
    return abort('404');
});
Route::get('/mysubjecttable','actionteacherController@mytable');
Route::get('/mysectiontable','actionteacherassistantController@mytable');

Route::get('/home', 'HomeController@index')->name('home');
});
