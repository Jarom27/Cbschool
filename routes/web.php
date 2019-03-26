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

Route::get('/','IndexController@getIndex');
Route::get('/Notice','NoticeController@VistaListadoDeNoticias');
Route::get('/Notice/show/{title}','NoticeController@VistaSoloUnaNoticia');
Route::get('/About',"IndexController@getAbout");
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => "auth"], function () {
    Route::get('/home/panel',"HomeController@Panel");
    Route::get('/home/add',"NoticeController@getVistaAdd");
    Route::get("/home/edit/{title}","NoticeController@getVistaEdit");
    Route::post('/home/add', "NoticeController@AlmacenarNoticia");
    Route::delete('/home/delete',["as"=>"borrar","uses"=>"NoticeController@DeleteNoticiayRecursos"]);
    Route::put('/home/edit',["as"=>"edit","uses"=>"NoticeController@Update"]);
});
