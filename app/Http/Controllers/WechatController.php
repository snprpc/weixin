<?php

namespace App\Http\Controllers;

use Handle\JudjeStyleHandler;
use Illuminate\Http\Request;
use Log;
use EasyWeChat\Kernel\Messages\Text;

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
        // $app->server->push(MessageLogHandler::class);
        // $app->server->push(MessageReplyHandler::class);
        $app->server->push(function($message){
            switch ($message['MsgType']) {
                case 'event':
                    return '收到事件消息';
                    break;
                case 'text':
                    return '收到文字消息';
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                case 'file':
                    return '收到文件消息';
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
        });
        $buttons = [
        [
            "name"      =>  "我的所有",
            "sub_button"=>  [
                [
                    "type"  =>  "view",
                    "name"  =>  "文章",
                    "url"   =>  "http://119.23.206.250"
                ],
                [
                    "type"  =>  "view",
                    "name"  =>  "电台",
                    "url"   =>  "http://119.23.206.250"
                ],

            ],

        ],
        [
            "name"      =>  "线下活动",
            "type"      =>  "view",
            "url"       =>  "http://119.23.206.250",
        ],
        [
            "name"      =>  "关于我们",
            "sub_button"=>  [
                [
                    "type"  =>  "click",
                    "name"  =>  "商业合作",
                    "key"   =>  "shangyehuodong"
                ],
                [
                    "type"  =>  "click",
                    "name"  =>  "小报告",
                    "key"   =>  "xiaobaogao"
                ],
                [
                    "type"  =>  "click",
                    "name"  =>  "联系我们",
                    "key"   =>  "lianxiwomen"
                ],
            ],
        ],
        ];
        $app->menu->create($buttons);
        return $app->server->serve();
    }
}
