<?php 
// +----------------------------------------------------------------------
// | LDF [ DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 http://www.yolaila.top All rights reserved.
// +----------------------------------------------------------------------
// | Author: LDF <898303969@qq.com>
// +----------------------------------------------------------------------
namespace app\home\widget;
use think\Controller;
class Base extends Controller{
    
    public function header(){
        
        return $this->fetch('public/header');
    }
    
    public function bodyNav(){
        
        return $this->fetch('public/bodyNav');
    }
    
    public function foot(){
        
        return $this->fetch('public/foot');
    }
}