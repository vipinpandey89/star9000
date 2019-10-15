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

Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');






// Admin Url here all detail //

Route::match(['get','post'],'/admin','AdminController@index');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){

Route::get('/bacheca','AdminController@dasbhoard');
Route::get('/dashboard','AdminController@dasbhoard');

Route::get('lista-segretaria','AdminController@ListSecretary');

Route::match(['get','post'],'aggiungi-segretaria','AdminController@AddSecretary');

Route::get('deletesecretary/{id}','AdminController@DeleteSecretary');

Route::match(['get','post'],'modifica-segretaria/{id}','AdminController@EditSecretary');

Route::get('visite','AdminController@ListExamination');

Route::match(['get','post'],'aggiungi-visita ','AdminController@AddExamination');

Route::get('delete-examination/{id}','AdminController@ExaminationDelete');

Route::match(['get','post'],'modifica-visite/{id}','AdminController@EditExamination');

Route::match(['get','post'],'calendario','AppointmentController@index');

Route::get('assegna-stanza','AdminController@RoomList');

Route::match(['get','post'],'aggiungi-stanza','AdminController@AddRoome');

Route::get('delete-room/{id}','AdminController@DeleteRoom');

Route::match(['get','post'],'modifica-stanza/{id}','AdminController@EditRooms');

Route::get('elenco-medico','AdminController@DoctorList');

Route::match(['get','post'],'aggiungi-medico','AdminController@AddDoctor');

Route::match(['get','post'],'modifica-medico/{id}','AdminController@EditDoctor');

Route::match(['get','post'],'profilo-visite','AdminController@SetExamination');

Route::get('responsedata','AppointmentController@ResponseData');
Route::get('doctorresponsedata','DoctorAppointmentController@ResponseData');
Route::get('doctor-appointments','DoctorAppointmentController@List');

Route::get('ajaxresponse/{id}','AppointmentController@AjaxResponse');

Route::post('ajaxset-appointment','AppointmentController@AjaxSetAppointment');
Route::post('create-patient','AppointmentController@CreatePatient');

Route::post('cancel-appointment','AppointmentController@CancelAppointment');

Route::post('cancel-recurrence-appointment','AppointmentController@CancelRecurrenceAppointment');
Route::get('getdoctoravailability','AppointmentController@getdoctoravailability');

Route::get('doctor-leaves','AdminController@DoctorLeaves');

Route::get('test-digital-pad','AdminController@TestDigital');

Route::get('/admin-logout','AdminController@AdminLogout');
Route::get('paziente','PatientController@index');
Route::match(['get','post'],'aggiungi-paziente','PatientController@AddPatient');
Route::match(['get','post'],'modifica-paziente/{id}','PatientController@EditPatient');
Route::get('/privacydoc','PatientController@Privacydoc');
Route::post('/saveprivacy','PatientController@SavePrivacy');
Route::match(['get','post'],'privacy','PrivacyController@index');
Route::match(['get','post'],'/eyevisit/{patid}/{id}','PatientController@eyevisit');
Route::get('/gestire-il-paziente','PatientController@managepatient');
Route::get('/dailypatientupdate','PatientController@dailypatientupdate');
Route::get('/getpatient/{id}','PatientController@getpatient');
Route::get('/savecomment', 'PatientController@savecomment');
Route::post('/savemedicine','PatientController@savemedicine');
Route::get('/intervento/{type}','PatientController@intervento');
Route::get('/intervento','PatientController@intervento');
Route::match(['get','post'],'aggiungi-intervento','PatientController@AddIntervento');
Route::match(['get','post'],'modifica-intervento/{id}','PatientController@EditIntervento');
Route::get('/saveintervento','PatientController@saveintervento');
//eye visit tabs
Route::get('/schede-eye-visit','PatientController@eyevisittabs');
Route::get('/ingressi-scheda/{id}','PatientController@tabsInput');

Route::match(['get','post'],'aggiungi-scheda','PatientController@addtab');
Route::match(['get','post'],'modifica-scheda/{id}','PatientController@edittab');
Route::match(['get','post'],'aggiungi-ingressi/{tabid}','PatientController@addInput');
Route::match(['get','post'],'modifica-ingressi/{tabid}/{id}','PatientController@editInput');
Route::get('/elimina-scheda/{id}','PatientController@deletetab');
Route::get('/elimina-ingressi/{tabid}/{id}','PatientController@deleteinput');

});