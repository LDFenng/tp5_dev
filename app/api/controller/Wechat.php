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
use EasyWeChat\Message\Text;
use EasyWeChat\Message\Image;
use EasyWeChat\Message\Video;
use EasyWeChat\Message\Voice;
use EasyWeChat\Message\News;
use EasyWeChat\Message\Location;
use EasyWeChat\MiniProgram\MiniProgram;
//权限认证
class Wechat extends Controller {
  
    /**
     * 用户ID
     * @var
     */ 
    protected $user_id; 
    /**
     * 微信ID
     * @var
     */
    protected $wechat_id;
    /**
     * 发送方ID（用户ID）
     * @var
     */
    protected $open_id;
    /**
     * 微信服务端验证以及信息推送接口（唯一入口）
     * @param 微信公众号本地id
     * @param 用户uid 
     */
    public function checkWechat($id,$uid){
        $options=$this->wechatOption($id);
        $wechat_api = new wechatApi($options);
       if (!empty(input('echostr'))){
           //微信验证
           $wechat_api->server->serve();
       }
       else{
           //事件或者信息处理
           $wechat_api->server->setMessageHandler(function($message){
               $to_user_name=$message->ToUserName;    //接收方帐号（该公众号 ID）
               $this->open_id=$message->FromUserName;  //发送方帐号（OpenID, 代表用户的唯一标识）
               $create_time=$message->CreateTime;    //消息创建时间（时间戳）
               $msg_id=$message->MsgId;         //消息 ID（64位整型）
               // 注意，这里的 $message 不仅仅是用户发来的消息，也可能是事件
               // 当 $message->MsgType 为 event 时为事件
               $param_data=request()->param();
               $this->user_id=$param_data['uid'];
               $this->wechat_id=$param_data['id'];
               switch ($message->MsgType){
                   //事件
                   case 'event':
                       //事件类型
                       switch ($message->Event){
                           case 'subscribe':  //关注事件（被动回复）
                               return $this->msgReplyHandle(null,1,null,true);
                               break;
                           case 'unsubscribe':  //取消关注  注销数据？？？
                               $updata=[
                                    'update_time'=>time(),
                                    'subscribe'=>0
                               ];
                               db('wechat_user')->where([
                                   'admin_id'=>$this->user_id,
                                   'wechat_id'=>$this->wechat_id,
                                   'openid'=>$this->open_id
                               ])->setField($updata);
                               break;
                           case 'SCAN': //二维码识别事件
                               
                               break;
                           case 'CLICK':  //点击事件 （菜单事件）
                               $menu_id=$message->EventKey; //菜单ID
                               return $this->msgReplyHandle($menu_id);
                               break;
                           case 'VIEW': //跳转事件（菜单事件）
                               //验证url合法性？
                               $url=$message->EventKey;
                               //return new Text(['content'=>'你跳转事件']);
                           case 'scancode_waitmsg': //调用扫一扫（菜单事件）
                               //return new Text(['content'=>'你扫了二维码']);
                               break;
                           case 'pic_photo_or_album':  //调用相机或者相册（菜单事件）
                               //return new Text(['content'=>'你调用了相机或者相册']);
                               break;
                           case 'location_select':  //获取地理位置（菜单事件）
                               $location_x=$message->Latitude;     //23.137466   地理位置纬度
                               $location_y=$message->Longitude;   //113.352425  地理位置经度
                               $precision=$message->Precision;   //119.385040  地理位置精度
                               $label_name=$message->Label;    //详细地名
                               $scale=$message->Scale;       //地图缩放大小
                               return new Location([
                                    'latitude'=>$location_x,
                                    'longitude'=>$location_y,
                                    'scale'=>$scale,
                                    'label'=>$label_name,
                                    'precision'=>$precision,
                                ]);
                               break;
                           case 'media_id':  //获取图片（菜单事件）
                               $menu_id=$message->EventKey;
                               return $this->msgReplyHandle($menu_id);
                               break;
                           case 'view_limited':  //获取图文（菜单事件）
                               $menu_id=$message->EventKey;
                               return $this->msgReplyHandle($menu_id);                             
                               break;
                           case 'miniprogram':  //进入小程序  （菜单事件）
                               return new Text(['content'=>'你进入了小程序 ！']);
                               break;
                           case 'user_scan_product_enter_session': //用户进入公众号推送事件
                               return new Text(['content'=>' ']);
                               break;
                           case 'user_scan_product_async':   //地理位置信息异步推送
                               return new Text(['content'=>' ']);
                               break;
                           case 'user_scan_product_verify_action':  //商品审核结果推送
                               return new Text(['content'=>' ']);
                               break;
                               
                           default: return new Text(['content'=>'抱歉！暂未提供此服务']);    
                       }
                       break;
                   //接收用户发送过来的信息    
                    case 'text':
                        $key_words=$message->Content;
                        //根据获取到的内容进行关键字进行相应回复
                        /**
                         * 1.优先匹配关键字回复
                         * 2.都不存在时，匹配自动回复规则
                         */
                        return $this->msgReplyHandle(null,5,['key_words'=>$key_words]);
                        break;
                    case 'location':
                        $location_x=$message->Location_X;  //地理位置纬度
                        $location_y=$message->Location_Y;  //地理位置经度
                        $scale=$message->Scale;       //地图缩放大小
                        $label=$message->Label;       //地理位置信息
                        $precision=$message->Precision;   //119.385040  地理位置精度
                        return new Location([
                            'latitude'=>$location_x,
                            'longitude'=>$location_y,
                            'scale'=>$scale,
                            'label'=>$label,
                            'precision'=>$precision,
                        ]);
                        break;  
                    case 'link':
                        $title=$message->Title;        //消息标题
                        $description=$message->Description;  //消息描述
                        $url=$message->Url;          //消息链接
                        return new News([
                            'title'       => $title,
                            'description' => $description,
                            'url'         => $url,
                            'image'       => request()->domain(). default_img()
                        ]);
                        break;                        
                    case 'image':
                        $pic_url=$message->PicUrl;  //链接识别图片？？？
                        //return new Text(['content'=>'抱歉！暂未提供此服务']);  
                        //break;
                    case 'voice':
                        $media_id=$message->MediaId;       // 语音消息媒体id，可以调用多媒体文件下载接口拉取数据。
                        $format=$message->Format;        // 语音格式，如 amr，speex 等
                        $recognition=$message->Recognition; //* 开通语音识别后才有
                        //return new Text(['content'=>'抱歉！暂未提供此服务']);  
                        //break;
                    case 'video':
                        $media_id=$message->MediaId;       //视频消息媒体id，可以调用多媒体文件下载接口拉取数据。
                        $thumb_media_id=$message->ThumbMediaId;  //视频消息缩略图的媒体id，可以调用多媒体文件下载接口拉取数据。
                        //break;
                    case 'shortvideo':   //小视频 10秒
                        $media_id=$message->MediaId;       //视频消息媒体id，可以调用多媒体文件下载接口拉取数据。
                        $thumb_media_id=$message->ThumbMediaId;  //视频消息缩略图的媒体id，可以调用多媒体文件下载接口拉取数据。 
                        //break;                        
                    default:
                        return $this->msgReplyHandle();
                        break;
               }
           });  
           $wechat_api->server->serve();
       }
    }
    
    private function wechatOption($id=null){
        $id=empty($id)?$this->wechat_id:$id;
        if (cache($this->user_id.'wechat_config'.$this->wechat_id)){
            return cache($this->user_id.'wechat_config'.$this->wechat_id);
        }
        $wechat_info=db('wechat_info')->where(['admin_id'=>$this->user_id,'id'=>$id])->find();
        $wechat_config= [
            /**
            * Debug 模式，bool 值：true/false
            * 当值为 false 时，所有的日志都不会记录
            */
            'debug'  => true,
            /**
             * 账号基本信息，请从微信公众平台/开放平台获取
            */
            'app_id'  => $wechat_info['app_id'],         // AppID
            'secret'  => $wechat_info['secret'],     // AppSecret
            'token'   => $wechat_info['token'],          // Token
            'aes_key' => $wechat_info['aes_key'],      // EncodingAESKey，安全模式下请一定要填写！！！
            /**
             * 日志配置
            *
            * level: 日志级别, 可选为：
            *         debug/info/notice/warning/error/critical/alert/emergency
            * permission：日志文件权限(可选)，默认为null（若为null值,monolog会取0644）
            * file：日志文件位置(绝对路径!!!)，要求可写权限
            */
            'log' => [
                'level'      => 'debug',
                'permission' => 0777,
                'file'       => 'runtime/wechat_'.$wechat_info['id'].'/log/easywechat.log',
            ],
            /**
             * OAuth 配置
            *
            * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
            * callback：OAuth授权完成后的回调页地址
            */
            'oauth' => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => '/examples/oauth_callback.php',
            ],
            /**
             * 微信支付
            */
            'payment' => [
                'merchant_id'        => 'your-mch-id',
                'key'                => 'key-for-signature',
                'cert_path'          => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！
                'key_path'           => 'path/to/your/key',      // XXX: 绝对路径！！！！
                // 'device_info'     => '013467007045764',
                // 'sub_app_id'      => '',
                // 'sub_merchant_id' => '',
                // ...
            ],
            /**
             * Guzzle 全局设置
            *
            * 更多请参考： http://docs.guzzlephp.org/en/latest/request-options.html
            */
            'guzzle' => [
                'timeout' => 30.0, // 超时时间（秒）
                //'verify' => false, // 关掉 SSL 认证（强烈不建议！！！）
            ],
        ];
        cache($this->user_id.'wechat_config'.$this->wechat_id,$wechat_config,7200);
        return $wechat_config;
    }
    
    /**
     * 信息回复处理
     */
    private function msgReplyHandle($menu_id=null,$reply_type=1,$param_data=[],$is_subscribe=false,$is_staff=false,$openId=[]){
        $options=$this->wechatOption();
        $wechat_api = new wechatApi($options);
        /*关注事件*/
        if($is_subscribe){
            $user_id=db('wechat_user')->where(['admin_id'=>$this->user_id,'wechat_id'=>$this->wechat_id,'openid'=>$this->open_id])->value('id');
            if ($user_id){
                $updata=['update_time'=>time(),'subscribe'=>1,'subscribe_time'=>time()];
                db('wechat_user')->where(['admin_id'=>$this->user_id,'wechat_id'=>$this->wechat_id,'id'=>$user_id])->setField($updata);
            }
            else{
                $user_info=$wechat_api->user->get($this->open_id)->toArray();
                if ($user_info){
                    $user_info['tagid_list']=json_encode($user_info['tagid_list']);
                    $user_info['admin_id']=$this->user_id;
                    $user_info['group_id']=-2;
                    $user_info['wechat_id']=$this->wechat_id;
                    $user_info['create_time']=time();
                    $user_info['update_time']=time();
                    db('wechat_user')->insert($user_info);
                } 
            }
        }
        if (empty($menu_id)){
            $reply_condition=[
                'admin_id'=>$this->user_id,
                'reply_type'=>$reply_type,
                'wechat_id'=>$this->wechat_id,
                'is_enabled'=>1
            ];
            $is_who=false;$you_who=false;
            if (!empty($param_data)){
                if (!empty($param_data['key_words'])){
                    if ($param_data['key_words']=='我是谁'
                        || $param_data['key_words']=='我是谁？' 
                        || $param_data['key_words']=='我是谁?'
                        || $param_data['key_words']=='我是誰'
                        || $param_data['key_words']=='我是誰？'
                        || $param_data['key_words']=='我是誰?'){
                        $is_who=true;
                    }
                    elseif ($param_data['key_words']=='你是谁'
                        || $param_data['key_words']=='你是谁？' 
                        || $param_data['key_words']=='你是谁?'
                        || $param_data['key_words']=='你是誰'
                        || $param_data['key_words']=='你是誰？'
                        || $param_data['key_words']=='你是誰?'
                        || $param_data['key_words']=='您是谁'
                        || $param_data['key_words']=='您是谁？' 
                        || $param_data['key_words']=='您是谁?'
                        || $param_data['key_words']=='您是誰'
                        || $param_data['key_words']=='您是誰？'
                        || $param_data['key_words']=='您是誰?'){
                        $is_who=true;
                        $you_who=true;
                    }
                    $reply_condition['key_words']=['like',"%{$param_data['key_words']}%"];
                }
            }
            $data_list=db('wechat_msg_reply')->where($reply_condition)->order('sort asc')->select();
            if ($data_list){
                $data_count=(count($data_list)>1)?rand(0,count($data_list)-1):0;
                $data_info=$data_list[$data_count]; //多个随机获取一条数据
                $msg_type=$data_info['msg_type'];
            }
            if (!$data_list && $is_who){
                if ($you_who){
                    return new Text(['content'=>'你是猴子派来的？这么弱智你也问？？晚安！']);  //啊？这里只有我呀！没有你是谁呀！看清楚，这里有叫你是谁的？
                }
                //回复用户信息
                $fans_condition=[
                    'admin_id'=>$this->user_id,
                    'wechat_id'=>$this->wechat_id,
                    'openid'=>$this->open_id
                ];
                $fans_info=db('wechat_user')->where($fans_condition)->field(true)->find();
                if ($fans_info){
                    if($fans_info['sex']==1){
                        $sex='男';
                    }
                    elseif ($fans_info['sex']==2){
                        $sex='女';
                    }
                    else{
                        $sex='未知';;
                    }
                    return new Text(['content'=>
                        "你的名字：{$fans_info['nickname']}\n性别：{$sex}\n".
                        "所在地：{$fans_info['country']}{$fans_info['province']}{$fans_info['city']}\n".
                        "您于：".date('Y-m-d H:i:s',$fans_info['subscribe_time'])."关注了我，谢谢亲哦！"
                    ]);
                }
                else{
                    return new Text(['content'=>'hello！很高兴认识您']);
                }
            }
            else{
                //自动回复
                $reply_condition=[
                    'admin_id'=>$this->user_id,
                    'reply_type'=>3,
                    'wechat_id'=>$this->wechat_id,
                    'is_enabled'=>1
                ];
                $data_info=db('wechat_msg_reply')->where($reply_condition)->order('sort asc')->find();
                $msg_type=$data_info['msg_type'];
            }
        }
        else{
            $menu_condition=[
                'admin_id'=>$this->user_id,
                'even_type'=>1,
                'is_enabled'=>1,
                'wechat_id'=>$this->wechat_id,
                'id'=>$menu_id
            ];
            $data_info=db('wechat_menu')->where($menu_condition)->find();
            $msg_type=$data_info['msg_type'];
        }
        switch ($msg_type){
            case 1:  //文本
               return new Text(['content'=>$data_info['content']]);
               break;
            case 2: //图片
               $data_condition=[
                    'admin_id'=>$this->user_id,  
                    'media_id'=>$data_info['img_id'], 
                    'wechat_id'=>$this->wechat_id,
                    'type'=>1 
               ]; 
               $wechat_media_id=db('wechat_media_id')->where($data_condition)->value('wechat_media_id');
               if ($wechat_media_id){
                    return new Image(['media_id'=>$wechat_media_id]);
               }
               else{
                    return new Text(['content'=>'您的关注是我最大的动力']);
               }
               break;
            case 3: //图文
               $news_condition=[
               'admin_id'=>$this->user_id,
               'id'=>['in',explode(',', $data_info['news_ids'])],
               'is_display'=>1
               ];
               $news_list=db('news')->where($news_condition)->limit(8)->order('sort asc')->field('content',true)->select();
               if ($news_list){
                   foreach ($news_list as $news_val){
                       $news[] = new News([
                           'title'       => $news_val['title'],
                           'description' => $news_val['summary'],
                           'url'         => empty($news_val['jump_url'])?url('wap/News/newsList',['uid'=>$this->user_id,'id'=>$news_val['id'],'category_id'=>$news_val['category_id'],'block_id'=>$news_val['block_id']]):$news_val['jump_url'],
                           'image'       => $news_val['cover_img']
                       ]);
                   }
                   return $news;
               }
               else{
                   return new Text(['content'=>'您的关注是我最大的动力']);
               }
               break;
            case 4:  //视频
               $data_condition=[
                   'admin_id'=>$this->user_id,
                   'media_id'=>$data_info['video_id'],
                   'wechat_id'=>$this->wechat_id,
                   'type'=>4
               ];
               $wechat_media_id=db('wechat_media_id')->where($data_condition)->value('wechat_media_id');
               if ($wechat_media_id){
                   $video_condition=[
                       'admin_id'=>$this->user_id,
                       'id'=>$data_info['video_id'],
                       'is_enabled'=>1
                   ];
                   $video_info=db('video_data')->where($video_condition)->find();
                   return new Video([
                   'title' => $video_info['name'],
                   'media_id' => $wechat_media_id,
                   'description' => $video_info['describe']
               ]);
               }
               else{
                   return new Text(['content'=>'您的关注是我最大的动力']);
               }
               break;
            case 5:  //音频
               $data_condition=[
                   'admin_id'=>$this->user_id,
                   'media_id'=>$data_info['voice_id'],
                   'wechat_id'=>$this->wechat_id,
                   'type'=>3
               ];
               $wechat_media_id=db('wechat_media_id')->where($data_condition)->value('wechat_media_id');
               if ($wechat_media_id){
                    return new Voice(['media_id' => $wechat_media_id]);
               }
               else{
                    return new Text(['content'=>'您的关注是我最大的动力']);
               }                                           
               break;
            default:
                    return new Text(['content'=>'您的关注是我最大的动力']);
                break;
        } 
    }
}