<?php  
use think\Db;
use think\Session;
$wechat_config=[];
$wechat_list=Db::name('wechat_info')->where(['admin_id'=>Session::get('user_id'),'is_enabled'=>1])->field(true)->cache(true,7000)->select();
if ($wechat_list){   
    foreach ($wechat_list as $wechat_val){
        $wechat_option['debug']=true;  //当值为 false 时，所有的日志都不会记录
        $wechat_option['app_id']=$wechat_val['app_id'];  // AppID
        $wechat_option['secret']=$wechat_val['app_secret'];  // AppSecret
        $wechat_option['token']=$wechat_val['token'];   // Token
        $wechat_option['aes_key']=$wechat_val['aes_key'];  // EncodingAESKey，安全模式下请一定要填写！！！
        /**
         * 日志配置
         * level: 日志级别, 可选为：
         *         debug/info/notice/warning/error/critical/alert/emergency
         * permission：日志文件权限(可选)，默认为null（若为null值,monolog会取0644）
         * file：日志文件位置(绝对路径!!!)，要求可写权限
         */
        $wechat_option['log']=[
            'level'      => 'debug',
            'permission' => 0777,
            'file'       => 'runtime/log/wechat_'.$wechat_val['id'].'/easywechat.log',
        ];
        /**
         * OAuth 配置
         * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
         * callback：OAuth授权完成后的回调页地址
         */
        $wechat_option['oauth']=[
            'scopes'   => ['snsapi_userinfo'],
            'callback' => '',
        ];
        /**
         * 微信支付
         */
        $wechat_option['payment']=[
            'merchant_id'        => empty($wechat_val['mch_id'])?null:$wechat_val['mch_id'],
            'key'                => empty($wechat_val['signature_key'])?null:$wechat_val['signature_key'],
            'cert_path'          => empty($wechat_val['cert_path'])?null:$wechat_val['cert_path'], // XXX: 绝对路径！！！！
            'key_path'           => empty($wechat_val['key_path'])?null:$wechat_val['key_path'],  // XXX: 绝对路径！！！！
            // 'device_info'     => '013467007045764',
            // 'sub_app_id'      => '',
            // 'sub_merchant_id' => '',
            // ...
        ];
        /**
         * 小程序配置
         */
        $wechat_option['mini_program'] =[
            'app_id'   => 'wxd62fec84ebace71a',
            'secret'   => '8d6146304bdeeb2f15a5f6c07cb68c71',
            // token 和 aes_key 开启消息推送后可见
            'token'    => '12321asw12321',
            'aes_key'  => '4obMoDSGOiwP8pNu3MktOrTK7DPlsJGxi9ZOrsaKLoD'
        ];
        /**
         * Guzzle 全局设置
         *
         * 更多请参考： http://docs.guzzlephp.org/en/latest/request-options.html
         */
        $wechat_option['guzzle']=[
            'timeout' => 3.0, // 超时时间（秒）
            //'verify' => false, // 关掉 SSL 认证（强烈不建议！！！）
        ];
        $wechat_config['wechat_option_'.$wechat_val['id']]=$wechat_option;
    }
}
return $wechat_config;