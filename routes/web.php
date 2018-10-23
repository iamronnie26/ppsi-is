<?php

use App\Post;
use Illuminate\Http\Request;
use App\Http\Middleware\Admin;
use App\Http\Middleware\POC;
use App\Http\Middleware\Recept;
use App\Http\Middleware\Supervisor;
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
Route::get('/',"HomeController@index");
   // Authentication Routes...
   $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
   Route::post('login', 'Auth\LoginController@login');
   $this->post('logout', 'Auth\LoginController@logout')->name('logout');

   // Registration Routes...
   $this->get('user/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
   $this->post('register', 'Auth\RegisterController@register');

   // Password Reset Routes...
   $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
   $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
   $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
   $this->post('password/reset', 'Auth\ResetPasswordController@reset');


Route::middleware('admin')->prefix('admin')->group(function(){
    Route::get('/users', 'PostsController@index')->name('posts.index');
    Route::get('/posts/details/{id}', 'PostsController@details')->name('posts.details');
    Route::get('/posts/add', 'PostsController@add')->name('posts.add');
    Route::post('/posts/insert', 'PostsController@insert')->name('posts.insert');
    Route::get('/posts/edit/{id}', 'PostsController@edit')->name('posts.edit');
    Route::post('/posts/update/{id}', 'PostsController@update')->name('posts.update');
    Route::get('/posts/delete/{id}', 'PostsController@delete')->name('posts.delete');
    Route::get('/posts/data', 'PostsController@anyData')->name('posts.data');
    Route::get('/posts/employee/{id}','PostsController@loadEmployeeDetails')->name('posts.employee');
    //CRUD for applicants
    Route::get('/dashboard', 'ApplicantController@index')->name('applicants.index');
    Route::get('/applicants/add', 'ApplicantController@add')->name('applicants.add');
    Route::post('/applicants/insert', 'ApplicantController@insert')->name('applicants.insert');
    Route::get('/applicants/edit/{id}', 'ApplicantController@edit')->name('applicants.edit');
    Route::post('/applicants/update/{id}', 'ApplicantController@update')->name('applicants.update');
    Route::get('/applicants/data/delete/{id}', 'ApplicantController@delete')->name('applicants.delete');
    Route::get('/applicants/delete/{id}', 'ApplicantController@delete')->name('applicants.delete');
    Route::get('/applicants/all/delete/{id}', 'ApplicantController@delete')->name('applicants.delete');
    Route::get('/applicants/today/delete/{id}', 'ApplicantController@delete')->name('applicants.delete');

    Route::get('/applicants/all/edit/{id}', 'ApplicantController@edit')->name('applicants.edit');

    route::get("/applicants/data","ApplicantController@anyData")->name('applicants.data');
    Route::get("/applicants/data_all", 'ApplicantController@anyData_all')->name('applicants.data_all');

    Route::get('/contactPersons', 'ContactPersonController@index')->name('contactPersons.index');
    Route::get('/contactPersons/details/{id}', 'ContactPersonController@details')->name('contactPersons.details');
    Route::get('/contactPersons/add', 'ContactPersonController@add')->name('contactPersons.add');
    Route::post('/contactPersons/insert', 'ContactPersonController@insert')->name('contactPersons.insert');
    Route::get('/contactPersons/edit/{id}', 'ContactPersonController@edit')->name('contactPersons.edit');
    Route::post('/contactPersons/update/{id}', 'ContactPersonController@update')->name('contactPersons.update');
    Route::get('/contactPersons/delete/{id}', 'ContactPersonController@delete')->name('contactPersons.delete');
    Route::get('/contactPersons/data', 'ContactPersonController@anyData')->name('contactPersons.data');

    Route::get('/department', 'DepartmentController@index')->name('department.index');
    Route::get('/department/details/{id}', 'DepartmentController@details')->name('department.details');
    Route::get('/department/add', 'DepartmentController@add')->name('department.add');
    Route::post('/department/insert', 'DepartmentController@insert')->name('department.insert');
    Route::get('/department/edit/{id}', 'DepartmentController@edit')->name('department.edit');
    Route::post('/department/update/{id}', 'DepartmentController@update')->name('department.update');
    Route::get('/department/delete/{id}', 'DepartmentController@delete')->name('department.delete');
    Route::get('/department/all/delete/{id}', 'DepartmentController@delete')->name('department.delete');
    route::get("/department/data","DepartmentController@anyData")->name('department.data');

    Route::get('/designation', 'DesignationController@index')->name('designation.index');
    Route::get('/designation/details/{id}', 'DesignationController@details')->name('designation.details');
    Route::get('/designation/add', 'DesignationController@add')->name('designation.add');
    Route::post('/designation/insert', 'DesignationController@insert')->name('designation.insert');
    Route::get('/designation/edit/{id}', 'DesignationController@edit')->name('designation.edit');
    Route::post('/designation/update/{id}', 'DesignationController@update')->name('designation.update');
    Route::get('/designation/delete/{id}', 'DesignationController@delete')->name('designation.delete');
    route::get("/designation/data","DesignationController@anyData")->name('designation.data');

    Route::get('/businesspartners', 'BusinessPartnersController@index')->name('businesspartners.index');
    Route::get('/businesspartners/details/{id}', 'BusinessPartnersController@details')->name('businesspartners.details');
    Route::get('/businesspartners/add', 'BusinessPartnersController@add')->name('businesspartners.add');
    Route::post('/businesspartners/insert', 'BusinessPartnersController@insert')->name('businesspartners.insert');
    Route::get('/businesspartners/edit/{id}', 'BusinessPartnersController@edit')->name('businesspartners.edit');
    Route::post('/businesspartners/update/{id}', 'BusinessPartnersController@update')->name('businesspartners.update');
    Route::get('/businesspartners/delete/{id}', 'BusinessPartnersController@delete')->name('businesspartners.delete');
    route::get("/businesspartners/data","BusinessPartnersController@anyData")->name('businesspartners.data');

    Route::get('/siteEndorse', 'SiteEndorseController@index')->name('siteEndorse.index');
    Route::get('/siteEndorse/details/{id}', 'SiteEndorseController@details')->name('siteEndorse.details');
    Route::get('/siteEndorse/add', 'SiteEndorseController@add')->name('siteEndorse.add');
    Route::post('/siteEndorse/insert', 'SiteEndorseController@insert')->name('siteEndorse.insert');
    Route::get('/siteEndorse/edit/{id}', 'SiteEndorseController@edit')->name('siteEndorse.edit');
    Route::post('/siteEndorse/update/{id}', 'SiteEndorseController@update')->name('siteEndorse.update');
    Route::get('/siteEndorse/delete/{id}', 'SiteEndorseController@delete')->name('siteEndorse.delete');
    route::get("/siteEndorse/data","SiteEndorseController@anyData")->name('siteEndorse.data');
    Route::get('/applicants/all', 'ApplicantController@all')->name('applicants.all');
    Route::get('/applicants/today', 'ApplicantController@today')->name('applicants.today');
});


Route::prefix('recept')->middleware(['recept'])->group(function(){
    route::get("/applicants/data","ApplicantController@anyData")->name('applicants.data');
    Route::get("/applicants/data_all", 'ApplicantController@anyData_all')->name('applicants.data_all');
    Route::get('/applicants/all/edit/{id}', 'ReceptionistController@edit')->name("recept.edit");
    Route::post('/add', 'ReceptionistController@add')->name('recept.add');
    Route::put('/insert', 'ReceptionistController@insert')->name('recept.insert');
    Route::get('/edit/{id}', 'ReceptionistController@edit')->name('recept.edit');
    Route::post('/passInterview','ReceptionistController@edit')->name('recept.passInterview');
    Route::post('/update/{id}', 'ReceptionistController@update')->name('recept.update');
    Route::get('/delete/{id}', 'ReceptionistController@delete')->name('recept.delete');

    Route::get('/summary/today','ReceptionistController@summary')->name('recept.summary');
    Route::get('/summary/weekly-report','ReceptionistController@weeklyReport')->name('recept.weekly');
    Route::get('/summary/monthly','ReceptionistController@monthlyReport')->name('recept.monthly');

    Route::get('/recept/today', 'ReceptionistController@today')->name('recept.today');
    route::get('/recept/all', 'ReceptionistController@all')->name('recept.all');

    route::get("/data","ReceptionistController@anyData_today")->name('recept.data');
    route::get('/data_all', 'ReceptionistController@anyData')->name('recept.data_all');
    route::get("/dashboard", 'ReceptionistController@count_recept')->name('recept.index');
    route::get('/today', 'ReceptionistController@count_receptToday')->name('recept.today');
    Route::get('/anyData_today', 'ReceptionistController@anyData_today')->name('recept.anyData_today');
    Route::get('/all', 'ReceptionistController@count_receptAll')->name('recept.all');
    Route::get('/recept/today','ReceptionistController@anyData_today')->name('recept.today');
    Route::post('/reEndorsement','ReceptionistController@reEndorsement')->name('recept.reEndorsement');
    //Route::post('/activeFile','ReceptionistController@activeFile')->name('recept.activeFile');

    Route::get('/intern', 'InternController@index')->name('intern.index');
    Route::get('/intern/details/{id}', 'InternController@details')->name('intern.details');
    Route::get('/intern/add', 'InternController@add')->name('intern.add');
    Route::post('/intern/insert', 'InternController@insert')->name('intern.insert');
    Route::get('/intern/edit/{id}', 'InternController@edit')->name('intern.edit');
    Route::post('/intern/update/{id}', 'InternController@update')->name('intern.update');
    Route::get('/intern/delete{id}', 'InternController@delete')->name('intern.delete');
    Route::get('/intern/all', 'InternController@all')->name('intern.all');
    Route::get('/intern/all/edit/{id}', 'InternController@edit')->name('intern.edit');

    Route::get('/intern/today/edit/{id}', 'InternController@edit')->name('intern.edit');

    Route::get('/intern/today', 'InternController@today')->name('intern.today');

    //Datatables
    Route::post('/applicant/search','ReceptionistController@searchApplicant')->name('recept.applicantSearch');
    Route::get("/intern/data","InternController@anyData")->name('intern.data');
    Route::get("/intern/data_today", 'InternController@anyData_today')->name('intern.data_today');
});

Route::prefix('poc')->middleware(['poc'])->group(function(){
    Route::get('/dashboard','POCsController@index')->name('poc.dashboard');
    Route::get('/details/{id}','POCsController@show')->name('poc.details');
    Route::get('/showups/{view}','POCsController@showups')->name('poc.showups');
    Route::get('/interviews','POCsController@interviews')->name('poc.interviews');
    Route::post('/search','POCsController@search')->name('poc.search');
    Route::put('/update/{id}','POCsController@update')->name('poc.update');
    Route::get('/process/{id}','POCsController@processApplication')->name('poc.process');
    Route::get("/dashboard/all","POCsController@allApplicants")->name("poc.all");

    //Datatable data
    Route::get("/index/all","POCsController@allApplicantsIndex")->name("poc.index.all");
    Route::get('/index/today','POCsController@todaysApplicants')->name('poc.index.today');
    Route::get('/data','POCsController@showDataTableAll')->name('poc.data');
    Route::get('/interviews/data','POCsController@interviewsDataTableAll')->name('poc.interviewsAll');
    Route::get("/data/today","POCsController@pocDataTableToday")->name("poc.data.today");
    Route::post('/passInterview','POCsController@passInterview')->name('poc.passInterview');
    Route::get('/interviewer/{id}','POCsController@interviewer')->name('poc.interviewer');
});

    Route::prefix('supervisor')->middleware(['auth','supervisor'])->group(function(){
    Route::get('/dashboard', 'InternController@index_supervisor')->name('supervisor.dashboard');
    Route::get('/data_all', 'InternController@anyDataSupervisor')->name('supervisor.data_all');
    Route::get('/today', 'InternController@today_supervisor')->name('supervisor.today');
    Route::get('/dataToday', 'InternController@anyDataSupervisor')->name('supervisor.dataToday');
    Route::get('/all', 'InternController@all_supervisor')->name('supervisor.all');
    Route::get('/dataAll', 'InternController@anyDataAllSupervisor')->name('supervisor.dataAll');
    // Route::get('/delete/{id}', 'InternController@supervisor')->name('intern.delete');
    // Route::get('/edit/{id}', 'InternController@supervisor')->name('intern.edit');
});

Route::prefix('logistic')->middleware('logistic')->group(function(){
    Route::get('/dashboard', 'LogisticController@index') ->name('logistic.index');
    Route::get('/data', 'LogisticController@anyData')->name('logistic.data');
    Route::get('/remarks', 'LogisticController@remarks') ->name('logistic.remarks');
    Route::get('/production', 'LogisticController@production') ->name('logistic.production');
    Route::get('/all', 'LogisticController@all')->name('logistic.all');
    Route::get('/today', 'LogisticController@today')->name('logistic.today');
    Route::get('/edit/{id}', 'LogisticController@edit')->name('logistic.edit');
    Route::get('/update/{id}', 'LogisticController@update')->name('logistic.update');
    Route::get('/productivity', 'LogisticController@productivity')->name('logistic.productivity');
    Route::get('/report','LogisticController@report')->name('logistic.report');
    Route::get('/dataPassed', 'LogisticController@hired')->name('logistic.dataPassed');
    Route::get('/dataFailed', 'LogisticController@failed')->name('logistic.dataFailed');
    Route::get('/dataHO', 'LogisticController@ho')->name('logistic.dataHO');
    Route::get('/dataDNGY', 'LogisticController@dngy')->name('logistic.dataDNGY');
    Route::get('/dataNA', 'LogisticController@na')->name('logistic.dataNA');
    Route::get('/dataCBR', 'LogisticController@cbr')->name('logistic.dataCBR');
    Route::get('/intern', 'LogisticController@index_intern')->name('logistic.intern');
    Route::get('/intern/dataIntern', 'LogisticController@intern')->name('intern.dataIntern');
    Route::get('/training', 'LogisticController@index_training')->name('logistic.training');
    Route::get('/training/dataTraining', 'LogisticController@training')->name('training.dataTraining');
    Route::get('/today', 'LogisticController@today')->name('logistic.today');
    Route::get('/dataAll', 'LogisticController@allData')->name('logistic.dataAll');
    Route::get('/internal', 'LogisticController@index_internal')->name('logistic.internal');
    Route::get('/internal/dataInternal', 'LogisticController@internal')->name('internal.dataInternal');

});


Route::prefix('encoder')->middleware('encoder')->group(function(){
    //Routes
    Route::get('/dashboard','EncodersController@index')->name('encoder.index');
    Route::get('/all','EncodersController@indexAll')->name('encoder.indexAll');
    Route::get('/interns','EncodersController@internsToday')->name('encoder.internsToday');
    Route::get('/interns/all','EncodersController@internsAll')->name('encoder.internsAll');
    Route::get('/intern/{id}/details','EncodersController@editIntern')->name('intern.edit');
    Route::get('/{id}/details','EncodersController@edit')->name('encoder.edit');
    Route::put('/{id}','EncodersController@update')->name('encoder.appUpdate');

    //Datatable Routes
    Route::get('/dt_applicants_index','EncodersController@dt_applicants_index')->name('encoder.dt_appIndex');
    Route::get('/dt_applicants_indexAll','EncodersController@dt_applicants_indexAll')->name('encoder.dt_appIndexAll');
    Route::get('/dt_applicants_internsToday','EncodersController@dt_interns_today')->name('encoder.dt_interns_today');
    Route::get('/dt_applicants_internsAll','EncodersController@dt_interns_all')->name('encoder.dt_interns_all');
});



######################## Unpublished #########################################################################
Route::get('/interview', 'InterviewController@index')->name('interview.index');
Route::get('/interview/details{id}', 'InterviewController@details')->name('interview.details');
Route::get('/interview/add', 'InterviewController@add')->name('interview.add');
Route::post('/interview/insert', 'InterviewController@insert')->name('interview.insert');
Route::get('/interview/edit/{id}', 'InterviewController@edit')->name('interview.edit');
Route::post('/interview/update/{id}', 'InterviewController@update')->name('interview.update');
Route::get('/interview/delete/{id}', 'InterviewController@delete')->name('interview.delete');

Route::get('/tq', 'TQController@index')->name('tq.index');
Route::get('/tq/details/{id}', 'TQController@details')->name('tq.details');
Route::get('/tq/add', 'TQController@add')->name('tq.add');
Route::post('/tq/insert', 'TQController@insert')->name('tq.insert');
Route::get('/tq/edit/{id}', 'TQController@edit')->name('tq.edit');
Route::post('/tq/update/{id}', 'TQController@update')->name('tq.update');
Route::get('/tq/delete/{id}', 'TQController@delete')->name('tq.delete');

Route::get('/home', 'HomeController@index')->name('home');

//pdf file
Route::Get('/pdfview', 'ReceptionistController@pdfview')->name('pdfview');
Route::Get('/pdfview_logistics', 'LogisticController@pdfview')->name('pdfview_logistics');

Route::get('/test',function(){
	return App\ContactPerson::find(1)->designation;
});



Route::get('pagenotfound', ['as' => 'notfound', 'uses' => 'HomeController@pagenotfound']);

Route::get('/team',function(){
    return view('team');
});