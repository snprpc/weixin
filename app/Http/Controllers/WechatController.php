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
        $app->server->push(function($message){
            return '欢迎关注我！';
        });
        $button = [
            [
            "name": "文章",
            "sub_button":[
                [
                "type":"click",
                "name":"影评",
                "key": "yingping"
                ],
                [
                "type":"click",
                "name":"散文",
                "key":"sanwen"
                ],
                [
                "type":"click",
                "name":"微小说",
                "key":"weixiaoshuo"
                ]
            ]
            ],
            [
            "name": "关于我们",
            "sub_button": [
                [
                "type": "click",
                "name": "线下活动",
                "key": "xianxiahuodong"
                ],
                [
                "type": "click",
                "name": "商业合作",
                "key": "shangyehuodong"
                ]]
            ]
        ];
        $app->menu->create($buttons);
        return $app->server->serve();
    }
}
