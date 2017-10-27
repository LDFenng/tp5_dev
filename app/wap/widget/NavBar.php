<?php  
namespace app\wap\widget;
use think\Controller;
//use think\Request;
class NavBar extends Controller{
    
    public function header(){
        
        $logo = "__PUBLIC__/libs/img/logo.png";
        $this->assign('logo',$logo);
        return $this->fetch('public/header');
    }
    
    public function footer(){
        return $this->fetch('public/footer');
    }
}
