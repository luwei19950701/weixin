<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use EasyWeChat\Factory;

use Overtrue\Socialite\User as SocialiteUser;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $config = [
            'app_id' => 'wx2e66e13530979fa2',
            'secret' => '2424a3425e17e193268bb0c081b7cc8a',

            // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
            'response_type' => 'array',

//            'log' => [
//                'level' => 'debug',
//                'file' => __DIR__.'/wechat.log',
//            ],
        ];

        $app = Factory::officialAccount($config);

        dd($app->user);
        return view('home');
    }

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        \Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $app = app('wechat.official_account');

        $officialAccount = EasyWeChat::officialAccount($app);
        dd($officialAccount->user->get('oqV071J_F4ixcaTgmaMpGtl8bgXk'));
        return $app->server->serve();
    }

//    public function testUser(){
//        $user = new SocialiteUser([
//            'id' => array_get($user, 'openid'),
//            'name' => array_get($user, 'nickname'),
//            'nickname' => array_get($user, 'nickname'),
//            'avatar' => array_get($user, 'headimgurl'),
//            'email' => null,
//            'original' => [],
//            'provider' => 'WeChat',
//        ]);
//    }
}
