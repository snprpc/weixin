<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Factory;
class MsgController extends Controller
{
    //
    public function test_post(Request $request) {
        print $request;

    }

    public function text(Request $request) {
        // 一些配置
        $config = [
            'app_id' => 'wx8ac5d4e87ef72f88',
            'secret' => '8afd403fec8b641825ed5b59961d81aa',

            'response_type' => 'array',

            'log' => [
              'level' => 'debug',
              'file' => __DIR__.'/../storage/logs/wechat.log',
            ],
        ];
        // 使用配置来初始化一个公众号应用实例。
        $app =  Factory::officialAccount($config);
        $app->server->push(function(){
            $text = new EasyWeChat\Kernel\Messages\Text();
            $text->content = '您好！展老大。';
            return $text;
        });
    }
}
