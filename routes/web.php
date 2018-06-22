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
// Temp Routes
Route::get('/test_post',function(){
    return view('post_form');
});
Route::post('/test_post/print','MsgController@test_post');


Route::any('/server','WechatController@server');

// 消息接口
// Route::post('/server','MsgController@text');

Route::get('/', function () {
    return view('welcome');
});
