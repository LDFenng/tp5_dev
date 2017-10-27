<?php 
use think\Db;
use think\Session;
/**
 * @author: helei
 * @createTime: 2016-07-15 17:19
 * @description:
 */

// 一下配置均为本人的沙箱环境，贡献出来，大家测试

// 个人沙箱帐号：
/*
 * 商家账号   naacvg9185@sandbox.com
 * 商户UID   2088102169252684
 * appId     2016073100130857
 */

/*
 * 买家账号    aaqlmq0729@sandbox.com
 * 登录密码    111111
 * 支付密码    111111
 */

$alipay_list=Db::name('alipay_config')->where(['is_enabled'=>1,'admin_id'=>Session::get('user_id')])->field(true)->cache(true,7000)->select();
$alipay_config=[];
if ($alipay_list){
    foreach ($alipay_list as $alipay_val){
        $limit=[
            in_array(1,explode(',', $alipay_val['limit_pay']))?'balance':null, // 余额
            in_array(2,explode(',', $alipay_val['limit_pay']))?'moneyFund':null,// 余额宝
            in_array(3,explode(',', $alipay_val['limit_pay']))?'debitCardExpress':null,// 	借记卡快捷
            in_array(4,explode(',', $alipay_val['limit_pay']))?'creditCard':null,//信用卡
            in_array(5,explode(',', $alipay_val['limit_pay']))?'creditCardExpress':null, // 信用卡快捷
            in_array(6,explode(',', $alipay_val['limit_pay']))?'creditCardCartoon':null,//信用卡卡通
            in_array(7,explode(',', $alipay_val['limit_pay']))?'credit_group':null,// 信用支付类型（包含信用卡卡通、信用卡快捷、花呗、花呗分期）
        ];
        foreach ($limit as $k=>$v){
            if (empty($v))unset($limit[$k]);
        }
        $limit=empty($limit)?[]:$limit;
        $alipay_config[$alipay_val['id']]=[
            'use_sandbox'               => true,// 是否使用沙盒模式
            
            'partner'                   => $alipay_val['partner_id'],
            'app_id'                    => $alipay_val['app_id'],
            'sign_type'                 => 'RSA2',// RSA  RSA2
            
            // 可以填写文件路径，或者密钥字符串  当前字符串是 rsa2 的支付宝公钥(开放平台获取)
            'ali_public_key'            => $alipay_val['ali_public_key'],
            
            // 可以填写文件路径，或者密钥字符串  我的沙箱模式，rsa与rsa2的私钥相同，为了方便测试
            'rsa_private_key'           => $alipay_val['rsa_private_key'],
            
            'limit_pay'                 => $limit,
            // 用户不可用指定渠道支付当有多个渠道时用“,”分隔
            // 与业务相关参数
            'notify_url'                => 'http://www.yolaila.top/demo/admin.php/ali',
            'return_url'                => 'http://www.yolaila.top/demo/',
            'return_raw'                => false,// 在处理回调时，是否直接返回原始数据，默认为 true
        ];
    }
}
return $alipay_config;
