<?php 
use think\query;

// +----------------------------------------------------------------------
// | LDF [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 http://yolaila.top All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: LDF <898303969@qq.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 *@param 无限树形分离函数（非递归方式）
 *@param array $list 分类二位数组
 *@param string $id 分类id
 *@param string $pid 分类父级id
 *@param string $child 分类子字段
 *@return array
 *@author 麦当苗儿 <zuojiazi@vip.qq.com>
 **/
function list_to_tree($list, $pk='id', $pid = 'pid', $child = 'child', $root = 0) {
    // 创建Tree
    $tree = array();
    if(is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] =& $list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId =  $data[$pid];
            if ($root == $parentId) {
                $tree[] =& $list[$key];
            }else{
                if (isset($refer[$parentId])) {
                    $parent =& $refer[$parentId];
                    $parent[$child][] =& $list[$key];
                }
            }
        }
    }
    return $tree;
}

/**
 * 获取当前request参数数组,去除值为空
 * @return array
 */
function get_query(){
    $param=request()->except(['s']);
    $rst=[];
    foreach($param as $k=>$v){
        if(!empty($v)){
            $rst[$k]=$v;
        }
    }
    return $rst;
}

/**
 * 去除字符串所有空格、换行等
 * @param 字符串 $str
 * @return mixed
 */
function del_all_trim($str,$replace_str=1){
    $search = [" ","　","\n","\r","\t"];
    $replace = [
        1=>["","","","",""],
        2=>[',',',',',',',',',']
    ];
    return str_replace($search, $replace[$replace_str], $str);
}

/**
 * 把含有空格、换行、中文逗号、强制装换成英文逗号
 * @param unknown $str
 * @return mixed
 */
function comma_change($str){
    return empty($str)?'':preg_replace("/(\n)|(\s)|(\t)|(\')|(')|(，)/",',',$str);
}

/**
 * 限制字符串长度输出
 * @param 字符串 $text
 * @param 字符串输出长度 $length
 * @return 规定字符串加...
 */
function subtext($text, $length){
    if(mb_strlen($text, 'utf8') > $length)
        return mb_substr($text, 0, $length, 'utf8').'...';
        return $text;
}

/**
 * 默认片
 * @param string $type默认为无图片图；2为默认头像
 * @return string 完整图片imgurl
 */
function default_img($type=1){
    switch ($type){
        case 1:$img_name = 'no_img.jpg';
        break;
        case 2:$img_name = 'headicon.png';
        break;
        case 3:$img_name = 'no_img_1.jpg';
        break;
        case 4:$img_name = 'wechat_menu.png';
        break;
    }
    return __ROOT__.'/public/default-img/'.$img_name;
}

/**
 * 
 * @param string $has_slash 是否有斜线
 * @return string 域名协议
 */
function get_host($has_slash=false){
    $url = "";
    if(array_key_exists("HTTPS",$_SERVER) && $_SERVER['HTTPS'] == "on"){
        $url = "https://";
    }
    else{
        $url = "http://";
    }
    $url .= $_SERVER['HTTP_HOST'];
    if($has_slash){
        $url .="/";
    }
    return $url;
}

/**
 * 获取目录地址
 * @return string
 */
function get_dir($has_begin_slash=false,$has_end_slash=true){
    $php_self = $_SERVER['PHP_SELF'];
    $dir_name = dirname($php_self);
    $dir_name = substr($dir_name,1,strlen($dir_name));
    if(is_bool($dir_name) && !$dir_name){
        $dir_name = "";
    }
    else {
        if($has_begin_slash){
            $dir_name = "/".$dir_name;
        }
        if($has_end_slash){
            $dir_name = $dir_name."/";
        }   
    }
    return $dir_name;
}

/**
 * 获取根目录
 * @return  /根目录名称/
 */
function get_root_dir(){
    return substr(request()->root(),0,strrpos(request()->root(),'/')+1);
}

/**
 * 获取毫秒
 */
function msectime() {
    list($tmp1, $tmp2) = explode(' ', microtime());
    return (float)sprintf('%.0f', (floatval($tmp1) + floatval($tmp2)) * 1000);
}

/**
 * 数组分页函数 核心函数 array_slice
 * 用此函数之前要先将数据库里面的所有数据按一定的顺序查询出来存入数组中
 * $count  每页多少条数据
 * $page  当前第几页
 * $array  查询出来的所有数组
 * order 0 - 不变   1- 反序
 */
function page_array($count,$page,$array,$order=0){
    $page=(empty($page))?'1':$page; #判断当前页面是否为空 如果为空就表示为第一页面
    $start=($page-1)*$count; #计算每次分页的开始位置
    if($order==1){
        $array=array_reverse(empty($array)?[]:$array);
    }
    $pagedata=[];
    $pagedata=array_slice(empty($array)?[]:$array,$start,$count);
    return $pagedata; #返回查询数据
}

/**
 * 分页及显示函数
 * $count_page 
 * $url 当前url
 */
function show_page_ui($count_page,$url,$page_class='page-ui'){
    $page=empty(input('page'))?1:input('page');
    $uppage=($page > 1)?$page-1:1;
    $nextpage=($page < $count_page)?$page+1:$count_page;
    if($count_page==1 || $count_page==0 || empty($count_page))return null;
    $str="<ul class='pagination'>";
    $str.="<li class='disabled'><span>共  {$count_page}  页 / 第 {$page} 页</span></li>";
    $str.="<li><a class='{$page_class}' data-page='1' href='$url?page=1'>首页  </a></span>";
    $str.="<li><a class='{$page_class}' data-page='{$uppage}' href='$url?page={$uppage}'> 上一页  </a></li>";
    $str.="<li><a class='{$page_class}' data-page='{$nextpage}' href='$url?page={$nextpage}'>下一页  </a></li>";
    $str.="<li><a class='{$page_class}' data-page='{$count_page}' href='$url?page={$count_page}'>尾页  </a></li>";
    $str.='</ul>';
    return $str;
}

/**
 * 删除老文件
 * @param string|array $new_imgs - 新文件路径列表
 * @param string|array $old_imgs - 旧文件路径列表
 */
function del_old_file($new_imgs,$old_imgs){
    //1、判断$new_imgs和$old_imgs是否为字符串，为字符串时分割“,”转换为数组
    $new_imgs_array = is_exit_str($new_imgs)?explode(",",$new_imgs):[$new_imgs];
    $old_imgs_array = is_exit_str($old_imgs)?explode(",",$old_imgs):[$old_imgs];
    $is_del = false;
    //2、判断$new_imgs是否在$old_imgs图片中存在，不存在删除、已存在时不删除
    //3、有删除操作返回true,无删除操作返回false
    $del_result = false;
    //去掉图片表头
    $domain=request()->domain().get_root_dir();
    if (!empty($new_imgs_array) && !empty($old_imgs_array)) {
        foreach ($old_imgs_array as $old_imgs_key=>$old_imgs_value){
            if (!in_array($old_imgs_value,$new_imgs_array)){
                //获取图片绝对路劲
                $old_dir=str_replace($domain,'',$old_imgs_value);
                $del_result = @unlink($old_dir);
                if ($del_result){
                    $is_del = true;
                }
            }
        }
    }
    return $is_del;
}

/**
 * 判断字段存在且是字符串
 * @param string|$val
 * @return bool
 */
function is_exit_str($val){
    if (isset($val) && is_string($val)){
        return true;
    }
    else{
        return false;
    }
}

/**
 * 设置全局配置到文件
 *
 * @param $key
 * @param $value
 * @return boolean
 */
function config_setbykey($key, $value){
    $file = ROOT_PATH.'data/conf/config.php';
    $cfg = array();
    if (file_exists($file)) {
        $cfg = include $file;
    }
    $item = explode('.', $key);
    switch (count($item)) {
        case 1:
            $cfg[$item[0]] = $value;
            break;
        case 2:
            $cfg[$item[0]][$item[1]] = $value;
            break;
    }
    return file_put_contents($file, "<?php\nreturn " . var_export($cfg, true) . ";");
}

/**
 * 获取url参数；
 */
function get_url_param(){
    $param_data = parse_url(request()->url());
    $param_array = explode('&', $param_data['query']);
    $params = [];
    foreach ($param_array as $param_val){
        $param_temp = explode('=', $param_val);
        $params[$param_temp[0]] = $param_temp[1];
    }
    return $params;
}

/**
 * @access public
 * @param array $list 查询结果
 * @param string $field 排序的字段名
 * @param string $sortby 排序类型 （asc正向排序 desc逆向排序 nat自然排序）
 * @return array
 */
function list_sort_by($list, $field, $sortby = 'asc'){
    if (is_array($list)){
        $refer = $resultSet = [];
        foreach ($list as $i => $data){
            $refer[$i] = &$data[$field];
        }
        switch ($sortby){
            case 'asc': // 正向排序
                asort($refer);
                break;
            case 'desc': // 逆向排序
                arsort($refer);
                break;
            case 'nat': // 自然排序
                natcasesort($refer);
                break;
        }
        foreach ($refer as $key => $val){
            $resultSet[] = &$list[$key];
        }
        return $resultSet;
    }
    return false;
}

/**
 * 一维数组转化url参数
 * @param array $arr
 */
function array_to_param($arr){
    $param_str = '';
    if ($arr){
        foreach ($arr as $k=>$v){
            $param_arr[] =$k.'='.$v;
        }
       $param_str = '?'.implode('&', $param_arr);
    }
    return $param_str;
}

/**
 * 是否存在控制器
 * @param string $path 控制器路径
 * @param string $name 待判定控制器名
 * @return boolean
 */
function has_controller($path,$name){
    $arr=\ReadClass::readDir($path);
    if((!empty($arr[$name])) && $arr[$name]['class_name']==$name){
        return true;
    }else{
        return false;
    }
}
/**
 * 是否存在方法
 * @param string $path 控制器路径
 * @param string $name 待判定控制器名
 * @param string $action 待判定方法名
 * @return boolean
 */
function has_action($path,$name,$action){ 
    $arr=\ReadClass::readDir($path); 
    if((!empty($arr[$name])) && $arr[$name]['class_name']==$name ){
        $method_name=array();
        foreach($arr[$name]['method'] as $v){
            $method_name[]=$v['name'];
        }
        return !in_array($action, $method_name)?2:3;
    }
    return 1;    
}

/**
 * 返回按层级加前缀的菜单数组
 * @author  LDF
 * @param array $menu 待处理菜单数组
 * @param string $id_field 主键id字段名
 * @param string $pid_field 父级字段名
 * @param string $lefthtml 前缀
 * @param int $pid 父级id
 * @param int $lvl 当前lv
 * @param int $leftpin 左侧距离
 * @return array
 */
function menu_left($menu,$id_field='id',$pid_field='pid',$lefthtml = '─' , $pid=0 , $lvl=0, $leftpin=0){
    $arr=[];
    foreach ($menu as $v){
        if($v[$pid_field]==$pid){
            $v['lvl']=$lvl + 1;
            $v['leftpin']=$leftpin;
            $v['lefthtml']='├'.str_repeat($lefthtml,$lvl);
            $arr[]=$v;
            $arr= array_merge($arr,menu_left($menu,$id_field,$pid_field,$lefthtml,$v[$id_field], $lvl+1 ,$leftpin+$leftpin));
        }
    }
    return $arr;
}

/**
 * 树形表格显示级数（阶梯型）
 * @param 树形名称 $name
 * @param 树形级数 $levle
 * @return string
 */
function levle_name($name,$levle=0){
    $str='';
    if ($levle==0){
       return '╠'.$name;
    }
    else{
       for ($i=0;$i<$levle;$i++){
           $str.='═';
       }
       return '╠'.$str.$name;
    }
}

/**
 * 实时显示提示信息
 * @param  string $msg 提示信息
 * @param  string $class 输出样式（success:成功，error:失败）
 * @author huajie <banhuajie@163.com>
 */
function showmsg($msg, $class = ''){
    echo "<script type=\"text/javascript\">showmsg(\"{$msg}\", \"{$class}\")</script>";
    flush();
    ob_flush();
}

/**
 * 从身份证中提取生日,包括15位和18位身份证
 * @return array;
 */

function get_IDcard_info($id_card){
    $result['flag']='';//0标示成年，1标示未成年
    $result['tdate']='';//生日，格式如：2012-11-15
    if(strlen($id_card)==18){
        $tyear=intval(substr($id_card,6,4));
        $tmonth=intval(substr($id_card,10,2));
        $tday=intval(substr($id_card,12,2));
        if($tyear>date("Y")||$tyear<(date("Y")-100)){
            $result['flag']=0;
        }elseif($tmonth<0||$tmonth>12){
            $result['flag']=0;
        }elseif($tday<0||$tday>31){
            $result['flag']=0;
        }
        else{
            $result['tdate']=$tyear."-".$tmonth."-".$tday;
            if((time()-mktime(0,0,0,$tmonth,$tday,$tyear))>18*365*24*60*60){
                $result['flag']=0;
            }else{
                $result['flag']=1;
            }
        }
    }
    elseif(strlen($id_card)==15){
        $tyear=intval("19".substr($id_card,6,2));
        $tmonth=intval(substr($id_card,8,2));
        $tday=intval(substr($id_card,10,2));
        if($tyear>date("Y")||$tyear<(date("Y")-100)){
            $result['flag']=0;
        }elseif($tmonth<0||$tmonth>12){
            $result['flag']=0;
        }elseif($tday<0||$tday>31){
            $result['flag']=0;
        }else{
            $result['tdate']=$tyear."-".$tmonth."-".$tday;
            if((time()-mktime(0,0,0,$tmonth,$tday,$tyear))>18*365*24*60*60){
                $result['flag']=0;
            }else{
                $result['flag']=1;
            }
        }
    }
    return $result;
}

/**
 * 获取文件信息(可获取中文)
 * @param unknown 文件路径
 * @return array
 */
function path_info($filepath){
    $path_parts = [];
    $path_parts ['dirname'] = rtrim(substr($filepath, 0, strrpos($filepath, '/')),"/")."/";
    $path_parts ['basename'] = ltrim(substr($filepath, strrpos($filepath, '/')),"/");
    $path_parts ['extension'] = substr(strrchr($filepath, '.'), 1);
    $path_parts ['filename'] = ltrim(substr($path_parts ['basename'], 0, strrpos($path_parts ['basename'], '.')),"/");
    return $path_parts;
}

/**
 * 格式化字节大小
 * @param  number $size      字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 * @author LDF <898303969@qq.com>
 */
function format_bytes($size, $delimiter = '') {
    $units = array(' B', ' KB', ' MB', ' GB', ' TB', ' PB');
    for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
    return round($size, 2) . $delimiter . $units[$i];
}

/**
 * 取代url函数；自带分页参数
 * @param 原有url参数 $url
 * @param url参数 array $param
 * @return url
 */
function new_url($url,$param=[]){
    $param_data=array_merge(['id'=>request()->param('id',null),'page'=>request()->param('page',null),'page_num'=>request()->param('page_num',10)],$param);
    return url($url,$param_data);
}

/**
 * 检测当前数据库中是否含指定表
 *
 * @author LDF <898303969@qq.com>
 *
 * @param $table : 不含前缀的数据表名
 * @return bool
 */
function db_is_valid_table_name($table)
{
    return in_array($table, db_get_tables());
}

/**
 * 返回不含前缀的数据库表数组
 *
 * @author LDF <898303969@qq.com>
 *
 * @return array
 */
function db_get_tables(){
    $db_prefix =config('database.prefix');
    $list  = \think\Db::query('SHOW TABLE STATUS FROM '.config('database.database'));
    $list  = array_map('array_change_key_case', $list);
    $tables = array();
    foreach($list as $k=>$v){
        if(stripos($v['name'],strtolower(config('database.prefix')))===0){
            $tables [] = strtolower(substr($v['name'], strlen($db_prefix)));
        }
    }
    return $tables;
}

/**
 * 返回数据表的sql
 *
 * @author LDF <898303969@qq.com>
 *
 * @param $table : 不含前缀的表名
 * @return string
 */
function db_get_insert_sqls($table){
    $db_prefix =config('database.prefix');
    $db_prefix_re = preg_quote($db_prefix);
    $db_prefix_holder = '<--db-prefix-->';
    $export_sqls = array();
    $export_sqls [] = "DROP TABLE IF EXISTS $db_prefix_holder$table";
    switch (config('database.type')) {
        case 'mysql' :
            if (!($d = \think\Db::query("SHOW CREATE TABLE $db_prefix$table"))) {
                $this->error("'SHOW CREATE TABLE $table' Error!");
            }
            $table_create_sql = $d [0] ['Create Table'];
            $table_create_sql = preg_replace('/' . $db_prefix_re . '/', $db_prefix_holder, $table_create_sql);
            $export_sqls [] = $table_create_sql;
            $data_rows = \think\Db::query("SELECT * FROM $db_prefix$table");
            $data_values = array();
            foreach ($data_rows as &$v) {
//                 foreach ($v as &$vv) {
//                     //TODO mysql_real_escape_string替换方法
//                     $vv = "'" . @mysql_real_escape_string($vv) . "'";
//                 }
                $data_values [] = '(' . join(',', $v) . ')';
            }
            if (count($data_values) > 0) {
                $export_sqls [] = "INSERT INTO `$db_prefix_holder$table` VALUES \n" . join(",\n", $data_values);
            }
            break;
    }
    return join(";\n", $export_sqls) . ";";
}

/**
 * 获取表的默认值
 * @param string $table_name
 * @return array
 */
function get_defaultVal($table_name){
    $filed_data =\think\Db::query("SHOW FULL COLUMNS FROM ".$table_name."");
    $data_info = [];
    foreach ($filed_data as $filed_val){
        $data_info[$filed_val['Field']]=$filed_val['Default'];
    }
    return $data_info;
}

/**
 * 返回默认时间
 * @param string $type 默认‘1’返回： 年-月-日；‘2’返回：年-月-日 时:分；‘3’返回：时:分
 * @param string $format 默认‘1’返回：时间、日期；‘2’返回：时间戳
 * @param number $days 默认‘0’是此刻时间；负数表示获取几天前的时间；正数表示获取几天后的时间
 * @return 时间
 */
function default_time($days=0,$type='1',$format='1'){
    if ($days==0 || empty($days)){
        $stamp_time = time();
    }
    else{
        $stamp_time = strtotime($days. 'days');
    }
    if ($format==1){
        switch ($type){
            case '1':
                return date('Y-m-d',$stamp_time);
                break;
            case '2':
                return date('Y-m-d H:i',$stamp_time);
                break;
            case '3':
                return date('H:i',$stamp_time);
                break;
        }
    }
    else{
        return $stamp_time;
    }
}

/**
 * 强制下载
 * @author LDF <898303969@qq.com>
 * @param string $filename
 */
function force_download_content($filename, $content)
{
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Transfer-Encoding: binary");
    header("Content-Disposition: attachment; filename=$filename");
    echo $content;
    exit ();
}

/**
 * 获取某年某月的天数
 * @param 默认当月 $month
 * @param 默认取本年 $year
 */
function get_month_num($month=null,$year=null){
    $m=empty($month)?date('m'):$month;
    $y=empty($year)?date('Y'):$year;
    return date('t',strtotime("$y-$m"));
}

/**
 * 通用时间比较条件
 * @param 开始时间 $start_time
 * @param 结束时间 $end_time
 * @return boolean|string[]|number[]|number[][]
 */
function time_condition($start_time=null,$end_time=null){
    if (empty($start_time) && empty($end_time)){
        $condition=false;
    }
    elseif (!empty($start_time) && empty($end_time)){
        $condition=['>=',strtotime($start_time. '00:00:00')];
    }
    elseif (empty($start_time) && !empty($end_time)){
        $condition=['<=',strtotime($end_time. '23:59:59')];
    }
    elseif (!empty($start_time) && !empty($end_time)){
        $condition=['between',[strtotime(input('start_time',null). '00:00:00'),strtotime(input('end_time',null). '23:59:59')]];
    }
    return $condition;
}

/**
 * 判断数组是否全为数字
 * @param unknown $arr
 */
function is_array_num($arr){
    $is_num = true;   
    foreach ($arr as $v){       
       if (!is_numeric($v)){
            $is_num = false;
        }
    }
    return $is_num;
}

/*
 * 下划线转驼峰
 */
function convert_underline($str){
    $str = preg_replace_callback('/([-_]+([a-z]{1}))/i',function($matches){
        return strtoupper($matches[2]);
    },$str);
        return $str;
}

/*
 * 驼峰转下划线
 */
function hump_to_line($str){
    $str = preg_replace_callback('/([A-Z]{1})/',function($matches){
        return '_'.strtolower($matches[0]);
    },$str);
        return $str;
}

/**
 * 判断是否为json格式
 * @param $string 字符串
 * @return boolean
 */
function is_json($string) {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}

/**
 * 判断是否为偶数 偶数返回true
 * @param 整数字 $num
 */
function odd_or_even($num){
    //判断是否是数字
    if (intval($num)%2==0){
        return true;
    }else{
        return false;
    }
}

/**
 * 获取性别
 * @return title
 */
function getSex($sex){
    return $sex=($sex==1)?'男':'女';
}

/*
 * 删除指定目录中的所有目录及文件（或者指定文件）
 * 可扩展增加一些选项（如是否删除原目录等）
 * 删除文件敏感操作谨慎使用
 * @param $dir 目录路径
 * @param array $file_type指定文件类型
 */
function del_file($dir,$file_type='') {
    $is_del=false;
    if(!is_array($dir) && is_dir($dir)){
        $files = scandir($dir);
        //打开目录 //列出目录中的所有文件并去掉 . 和 ..
        foreach($files as $filename){
            if($filename!='.' && $filename!='..'){
                if(!is_dir($dir.'/'.$filename)){
                    if(empty($file_type)){
                        $is_del=unlink($dir.'/'.$filename);
                    }else{
                        if(is_array($file_type)){
                            //正则匹配指定文件
                            if(preg_match($file_type[0],$filename)){
                                $is_del=unlink($dir.'/'.$filename);
                            }
                        }else{
                            //指定包含某些字符串的文件
                            if(false!=stristr($filename,$file_type)){
                                $is_del=unlink($dir.'/'.$filename);
                            }
                        }
                    }
                }else{
                    del_file($dir.'/'.$filename);
                    rmdir($dir.'/'.$filename);
                }
            }
        }
        return $is_del;
    }else{
        $domain=request()->domain().get_root_dir();
        $del_result=false;
        foreach ($dir as $path_url){
            $path_dir=str_replace($domain,'',$path_url);
            $del_result = @unlink($path_dir);
        }
        if ($del_result){
            $is_del = true;
        }
        return $is_del;
    }
}

/**
 * 获取文件绝对路径(url转换)
 * @param $url
 * @return mixed
 */
function absolute_path($url){
    $domain=request()->domain();
    $root_path=str_replace($domain,$_SERVER['DOCUMENT_ROOT'],$url);
    return str_replace("/","\\",$root_path);
}

/**
 * 求两个日期之间相差的天数
 * (针对1970年1月1日之后，求之前可以采用泰勒公式)
 * @param string $day1
 * @param string $day2
 * @return number
 */
function diff_between_days($day1, $day2,$is_date=true){
    if ($is_date){
        $second1 = strtotime($day1);
        $second2 = strtotime($day2);
    }
    else{
        $second1 =$day1;
        $second2 = $day2;
    }
    if ($second1 < $second2) {
        $tmp = $second2;
        $second2 = $second1;
        $second1 = $tmp;
    }
    return ($second1 - $second2) / 86400;
}

/**
 * 多个数组排列组合（二维数组）
 * @param $arr 组合数组
 */
function permutation_and_combination($arr){
    if (!empty($arr)){
        $arr_count=count($arr);
        if ($arr_count>1){
            //大于两个进行组合
            //创建临时数组保存组合数组
            $temp_data=[];
            $i=0;
            foreach ($arr[0] as $k_1=>$val_1){
                foreach ($arr[1] as $k_2=>$val_2){
                    $temp_data[0][$i]=$val_1.'_'.$val_2;
                    $i++;
                }
            }
            unset($arr[0]);
            unset($arr[1]);
            if (count($arr)>0){
                $new_arr=array_merge($temp_data,$arr);
                return permutation_and_combination($new_arr);
            }
            else{
                return $temp_data;
            }
        }
        else{
            return $arr;
        }
    }
}

/**
 * 随机字符串
 * @param number $min_length
 * @param number $max_length
 * @param number $type
 * @return string|unknown
 */
function get_rand($type=5,$min_length=6,$max_length=16) {
    //判断字符串长度
    $length=($min_length==$max_length)?$min_length:mt_rand($min_length,$max_length);
    // 密码字符集；可分：1.数字；2.大写字母；3.小写字母；4.大小写混合；5.大小写数字混合；6.大写字母数字混合；7.小写字母数字混合
    $chart_arr=[
        1=>'1234567890',
        2=>'QAZWSXEDCRFVTGBYHNUJMIKOLP',
        3=>'qazwsxedcrfvtgbyhnujmiklop',
        4=>'QAZWSXEDCRFVTGBYHNUJMIKOLPqazwsxedcrfvtgbyhnujmiklop',
        5=>'QAZWSXEDCRFVTGBYHNUJMIKOLP1234567890qazwsxedcrfvtgbyhnujmiklop',
        6=>'QAZWSXEDCRFVTGBYHNUJMIKOLP1234567890',
        7=>'qazwsxedcrfvtgbyhnujmiklop1234567890'
    ];
    $chars_str = $chart_arr[$type];
    $str='';
    for ( $i = 0; $i < $length; $i++ ){  
        // 这里提供两种字符获取方式
        // 第一种是使用 substr 截取$chars中的任意一位字符；
        // 第二种是取字符数组 $chars 的任意元素
        // $password .= substr($chars, mt_rand(0, strlen($chars_str) – 1), 1);
        $str .= $chars_str[ mt_rand(0, strlen($chars_str) - 1) ];
    }
    return $str;
} 



