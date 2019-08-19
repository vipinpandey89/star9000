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

Route::get('ajaxresponse/{id}','AppointmentController@AjaxResponse');

Route::get('doctor-leaves','AdminController@DoctorLeaves');

Route::get('test-digital-pad','AdminController@TestDigital');

Route::get('/admin-logout','AdminController@AdminLogout');

});