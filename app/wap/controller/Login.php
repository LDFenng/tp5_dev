<?php  
namespace app\system\controller;
use think\Controller;
use think\Cache;
// use think\Request;
// use think\Db;
class Login extends Controller{
    
    public function login(){
        //已登录,跳转到首页

        return $this->fetch();
    }
    
    //登陆验证
    public function checkLogin(){
        if (!request()->isAjax()){
            $this->error("提交方式错误！",url('Login/login'));
        }else{
            $admin_username=input('admin_username');
            $password=input('admin_pwd');
            $admin_condition = [
                'admin_username'=>$admin_username,
                'login_type'=>'sys'
            ];
            $admin=db('admin')->where($admin_condition)->find();
            if (!$admin||encrypt_password($password,$admin['admin_pwd_salt'])!==$admin['admin_pwd']){
                $this->error('用户名或者密码错误，重新输入',url('Login/login'));
            }
            else{
                //检查是否弱密码
                session('admin_weak_pwd', false);
                $weak_pwd_reg = [
                    '/^[0-9]{0,6}$/',
                    '/^[a-z]{0,6}$/',
                    '/^[A-Z]{0,6}$/'
                ];
                foreach ($weak_pwd_reg as $reg) {
                    if (preg_match($reg, $password)) {
                        session('admin_weak_pwd', true);
                        break;
                    }
                }
                //登录后更新数据库，登录IP，登录次数,登录时间
                $data=[
                    'admin_last_ip'=>$admin['admin_ip'],
                    'admin_last_time'=>$admin['admin_time'],
                    'admin_ip'=>request()->ip(),
                    'admin_time'=>time(),
                ];
                //dump($data);
                db('admin')->where('admin_username',$admin_username)->setInc('admin_hits',1);
                db('admin')->where('admin_username',$admin_username)->update($data);
                session('admin_id',$admin['admin_id']);
                $this->success('恭喜您，登陆成功',url('AuthManage/index'));
            }
        }
    }
    /*
     * 退出登录
     */
    public function logout(){
        session('aid',null);
        Cache::clear();
        session(null);
        $this->redirect('Login/login');
    }
    
    //清除缓存
    public function clear(){
        Cache::clear();
        $this->success ('清理缓存成功');
    }
}