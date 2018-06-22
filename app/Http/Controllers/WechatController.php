<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
class WechatController extends Controller
{
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function server()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $app = app('wechat.official_account');
        // 关注成功信息
        $current = $app->menu->current();
        $app->server->push(function($message){
            return $current->toArray();
        });

        return $app->server->serve();
    }



}
