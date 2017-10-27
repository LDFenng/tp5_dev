<?php 
// +----------------------------------------------------------------------
// | LDF [ DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 http://www.yolaila.top All rights reserved.
// +----------------------------------------------------------------------
// | Author: LDF <898303969@qq.com>
// +-------------------------------------------------------------------------------------------------------------------------------------------
namespace app\api\controller;
use think\Controller;
use think\Db;
use EasyWeChat\Foundation\Application as wechatApi;
use app\admin\controller\wechat;
/**
 * 网页授权登陆
 * @author 89830
 */
class Oauth extends Controller {
    
    public function oauthWechat($uid){
        
        $wechat_api=new \EasyWeChat\Foundation\Application();
        $response = $wechat_api->oauth->scopes(['snsapi_userinfo']);
    }
}