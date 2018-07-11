<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use EasyWeChat\Factory;

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

        dd($app);
        return view('home');
    }
}
