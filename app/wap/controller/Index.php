<?php  
namespace app\wap\controller;
use think\Controller;
use think\Request;
use think\Validate;
class Index extends Controller{
   
    public function index($uid,$school_id=null){
        $project_condition = [
            'user_id'=>$uid,
            'is_enabled'=>1,
            'is_delete'=>0,
            'pid'=>0
        ]; 
        //需加学校的ID
        $project_list = db('project_info')->where($project_condition)->
        field(['user_id','remark','is_enabled','sort','levle','create_time','update_time','is_delete'],true)->select();
        $max_levle = db('project_info')->where($project_condition)->max('levle');
        if ($project_list){
            foreach ($project_list as $project_key=>$project_val){
                $project_list[$project_key]['value'] = $project_val['id'];
                $project_list[$project_key]['text'] = $project_val['title'];
                unset($project_list[$project_key]['id']);
                unset($project_list[$project_key]['title']);
            }
            
            $project_data = list_to_tree($project_list, $pk='value', $pid = 'pid', $child = 'children');
            //print_r(json_encode($project_data));die;
        }
        $project_info = [
            'max_levle'=>$max_levle,
            'project_data'=>json_encode($project_data)
        ];
        $school_info = db('school')->where('id',$school_id)->find();
        
        $this->assign('school_info',$school_info);
        $this->assign('project_data',$project_data);
        return $this->fetch();
    }
    
    public function saveVisitor(){
        if (!request()->isAjax()){
            $this->error('非法操作',url('index'),['uid'=>request()->param('uid'),'school_id'=>request()->param('school_id')]);
        }
        else{
            $rule = [
                ['name','require|max:25','姓名必须填|名称最多不能超过25个字符'],
                ['phone',['require','length'=>11,'regex'=>'/^(13[0-9]{9})|(15[0-9]{9})|(18[0-9]{9})|(17[0-9]{9})/','unique'=>'student_booking'],'手机号码必须填|手机号码长度错误|手机号码格式错误|手机号码必须唯一'],
                ['project_id','请选择咨询项目']
            ];
            $data = request()->param();
            $validate = new Validate($rule);
            $result = $validate->check($data);
            if(!$result){
                return [
                    'code'=>0,
                    'msg'=>$validate->getError()
                ];
            }
            $save_data = [
                'user_id'=>request()->param('uid'),
                'name'=>request()->param('name'),
                'sort_spell'=>pinyin(request()->param('name'),true),
                'phone'=>request()->param('phone'),
                'project_id'=>request()->param('project_ids'),
                'school_id'=>request()->param('school_id'),
                'is_sign'=>0,
                'create_time'=>time(),
                'update_time'=>time()
            ];
            $save_result = db('student_visit')->insert($save_data);
            if ($save_result){
                return [
                    'code'=>1,
                    'msg'=>'盛世明德感谢您的到访'
                ];
            }            
        }
    }

}