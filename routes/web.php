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




// Route::get('/server',function(){
//     // 一些配置
//     $config = [
//         'app_id' => 'wx8ac5d4e87ef72f88',
//         'secret' => '8afd403fec8b641825ed5b59961d81aa',
//
//         'response_type' => 'array',
//
//         'log' => [
//           'level' => 'debug',
//           'file' => __DIR__.'/../storage/logs/wechat.log',
//         ],
//     ];
//     // 使用配置来初始化一个公众号应用实例。
//     $app =  EasyWeChat\Factory::officialAccount($config);
//     $response = $app->server->serve();
//
//     // 将响应输出
//     return $response;
// });

// 消息接口
Route::post('/server','MsgController@text');

Route::get('/', function () {
    return view('welcome');
});
