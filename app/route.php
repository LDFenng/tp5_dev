<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// return [
//     'wet/:uid' => 'api/Wechat/checkWechat',
// ];
use \think\Route;
Route::rule('wxjk/:id/:uid','api/Wechat/checkWechat','*',['ext'=>'']);
Route::rule('news/:uid/[:id]/[:category_id]/[:block_id]','wap/News/newsList','*');


//Route::any('fileUpload/[:u]','train_admin/FileUpload/uploadOneImg',['method'=>'get|post','ext'=>'fu']);