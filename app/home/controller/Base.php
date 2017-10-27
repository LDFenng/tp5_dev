<?php
// +----------------------------------------------------------------------
// | LDF [ DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 http://www.yolaila.top All rights reserved.
// +----------------------------------------------------------------------
// | Author: LDF <898303969@qq.com>
// +----------------------------------------------------------------------
namespace app\home\controller;
use think\Controller;

class Base extends Controller{
    
    protected function _initialize(){
        parent::_initialize();
        if (!defined('__ROOT__')) {
            $_root = rtrim(dirname(rtrim(request()->baseFile(), '/')), '/');
            define('__ROOT__', (('/' == $_root || '\\' == $_root) ? '' : $_root));
        }
        
    }
}