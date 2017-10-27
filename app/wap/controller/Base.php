<?php
// +----------------------------------------------------------------------
// | YFCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015-2016 http://www.rainfer.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: rainfer <81818832@qq.com>
// +----------------------------------------------------------------------
namespace app\wap\controller;
use think\Controller;
use think\Db;

//权限认证
class Base extends Controller {
	//初始化
	protected $last_action;
	protected $user_id;
	protected function _initialize(){
        parent::_initialize();
		//未登陆，不允许直接访问
		$aid_s=session('aid');
		$admin_info = db('admin')->where('admin_id',$aid_s)->find();
		if (!empty($admin_info['admin_pid']) && $admin_info['admin_pid']!=0){
		    $this->user_id = $admin_info['admin_pid'];
		}
		else{
		    $this->user_id = session('aid');
		}
 		if(empty($aid_s)){
			$this->redirect('admin/Login/login');
		} 
		//已登录，不需要验证的权限
		$not_check = array('Sys/clear','Index/index');//不需要检测的控制器/方法

		//当前操作的请求                 模块名/方法名
		//不在不需要检测的控制器/方法时,检测
		if(!in_array(CONTROLLER_NAME.'/'.ACTION_NAME, $not_check)){
			$auth = new Auth();
			if(!$auth->check(CONTROLLER_NAME.'/'.ACTION_NAME,session('aid')) && session('aid')!= 1){
				$this->error('没有权限');
			}
		}
		//获取有权限的菜单tree
		$menus=cache('menus_admin_'.session('aid'));
		if(empty($menus)){
			$auth = new Auth();
			//print_r($rule_id);die;
			$data = Db::name('auth_rule')->where('status',1)->order('sort asc')->select();
			foreach ($data as $k=>$v){
				if(!$auth->check($v['name'], session('aid')) && session('aid') != 1){
					unset($data[$k]);
				}
			}
			$menus=node_merge($data);
			//cache('menus_admin_'.session('aid'),$menus);
		}
		//print_r($menus);die;
		$this->assign('menus',$menus);
		//当前方法倒推到顶级菜单数组
		$menus_curr=get_menus_admin();
		//如果$menus_curr为空,则根据'控制器/方法'取status=0的menu
		if(empty($menus_curr)){
			$rst=Db::name('auth_rule')->where(array('status'=>0,'name'=>CONTROLLER_NAME.'/'.ACTION_NAME))->order('level desc,sort')->limit(1)->select();
			if($rst){
				$pid=$rst[0]['pid'];
				//再取父级
				$rst=Db::name('auth_rule')->where('id',$pid)->find();
				$menus_curr=get_menus_admin($rst['name']);
			}
		}
		$this->assign('menus_curr',$menus_curr);
		//取当前操作菜单父ID
		if(count($menus_curr)>=4){
			$pid=$menus_curr[1];
			$id_curr=$menus_curr[2];
		}elseif(count($menus_curr)>=2){
			$pid=$menus_curr[count($menus_curr)-2];
			$id_curr=end($menus_curr);
		}else{
			$pid='0';
			$id_curr=(count($menus_curr)>0)?end($menus_curr):'';
		}
		//取$pid下子菜单
		$menus_child=Db::name('auth_rule')->where(array('status'=>1,'pid'=>$pid))->order('sort')->select();
		$this->assign('menus_child',$menus_child);
		$this->assign('id_curr',$id_curr);
		$this->assign('admin_avatar',session('admin_avatar'));
	}
	
	protected function saveData($table_name,$data,$jump_url,$param_data=[],$user=true){
	    if ($user){
	        $data['user_id'] = $this->user_id;
	    }
        if (empty($data['id'])){
            unset($data['id']);
            $data['create_time'] = time();
            $data['update_time'] = time();
            $save_result = db($table_name)->insertGetId($data);
        }
        else{
            $data['update_time'] = time();
            $save_result = db($table_name)->update($data);
        }
        if ($save_result) {
            return [
                'code'=>1,
                'msg'=>'保存成功',
                'url'=>url($jump_url,$param_data)
            ];
        } else {
            return [
                'code'=>0,
                'msg'=>'非法操作',
            ];
        }
	}
	
	public function getDataList($table_name,$ajax_page,$show_page,$condition=[],$field='id',$sort='desc'){
	    $condition = [
	        'user_id'=>$this->user_id,
	    ];
	    $data_list=db($table_name)->order($field,$sort)->where($condition)->paginate(config('paginate.list_rows'),false,['query'=>get_query()]);
	    $show=$data_list->render();
	    $show=preg_replace("(<a[^>]*page[=|/](\d+).+?>(.+?)<\/a>)","<a href='javascript:ajax_page($1);'>$2</a>",$show);
	    
	    $this->assign($show_page,$data_list);
	    $this->assign('page',$show);
	    //print_r($school_list);die;
	    if(request()->isAjax()){
	        return $this->fetch($ajax_page);
	    }else{
	        return $this->fetch();
	    }
	}
	
	public function delData(){
	    $user_id = $this->user_id;
	    $table_name = request()->param('table_name');
	    if (!request()->isAjax()){
	        $this->error('提交方式不正确');
	    }
	    else{
	        $ids = input('post.ids/a');
	        if (empty($ids)){
	            return [
	                'code'=>0,
	                'msg'=>'请选择要删除的数据'
	            ];
	        }
	        $result = db($table_name)->delete($ids);
	        if ($result){
	            return [
	                'code'=>1,
	                //'url'=>'location.reload()'
	            ];
	        }
	    }
	}
}