<?php
// +----------------------------------------------------------------------
// | LDF [ DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 http://www.yolaila.top All rights reserved.
// +----------------------------------------------------------------------
// | Author: LDF <898303969@qq.com>
// +----------------------------------------------------------------------
namespace app\home\controller;
class Index extends Base{
    
    public function index(){
        $slide_condition=[
            'is_enabled'=>1,
            'scene'=>['in',['3','4','5','6','7','8','10']]
        ];
        $slide_list=db('slide')->where($slide_condition)->order('sort asc,create_time desc')->limit(10)->field(true)->select();
        if ($slide_list){
            $top_slide=[];
            $advert_slide=[];
            $bottom_slide=[];
            foreach ($slide_list as $slide_key=>$slide_val){
                if (!empty($slide_val['animate_data'])){
                    $slide_list[$slide_key]['animate_data']=json_decode($slide_val['animate_data'],true);
                }
                if ($slide_val['scene']==3){
                    $top_slide[]=$slide_val;
                }
                elseif ($slide_val['scene']==10){
                    $advert_slide[]=$slide_val;
                }
                elseif ($slide_val['scene']==6){
                    $bottom_slide[]=$slide_val;
                }
            }
            $this->assign('top_slide',$top_slide);
            $this->assign('advert_slide',$advert_slide);
            $this->assign('bottom_slide',$bottom_slide);
        } 
        //资讯
        $news_info=db('news')->where('is_display',1)->order('is_set_top desc,sort asc,create_time desc')->field('title,sub_title,cover_img,summary')->find();
        $this->assign('news_info',$news_info);
        //资讯模块
        $block_list=db('news_block')->where('is_enabled',1)->order('is_set_top desc,sort asc,create_time desc')->field('title,remark,id')->select();
        $this->assign('block_list',$block_list);
        return $this->fetch();
    }
}
