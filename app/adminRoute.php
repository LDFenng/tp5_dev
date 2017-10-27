<?php 
use \think\Route;
// // action变量的值作为操作方法传入
// ':action/blog/:id' => 'index/blog/:action'
// // 变量传入index模块的控制器和操作方法
// ':c/:a'=> 'index/:c/:a'
//Route::miss('blog/miss'); //不存在时执行
$url_list=db('background_menu')->where('is_enabled',1)->field('id,pid,action_name,route_url')->select();
if ($url_list){
    //Route::rule(‘路由表达式’,‘路由地址’,‘请求类型’,‘路由参数（数组）’,‘变量规则（数组）’);
    $route_list=[];
    foreach ($url_list as $url_key=>$url_val){
        $route=empty($url_val['route_url'])?$url_val['pid'].$url_key.'/[:md]':$url_val['route_url'].'/[:md]';
        $route_list[$route]='admin/'.$url_val['action_name'];
    }
    Route::rule($route_list);
}
Route::rule('l','admin/Login/login');
Route::rule('v','admin/Login/loginVerify');
Route::rule('ali','admin/Pay/ailNotify');


