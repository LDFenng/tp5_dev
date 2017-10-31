<?php
return array (
  'img_config' => 
  array (
    'type' => 
    array (
      0 => '.png',
      1 => '.jpg',
      2 => '.jpeg',
      3 => '.gif',
      4 => '.bmp',
    ),
    'size' => 2097152,
    'save_path' => 'data/upload/{sid}/img/{yyyy}{mm}{dd}/{time}{rand:6}',
    'thumb_path' => 'data/upload/{sid}/thumb_img/',
    'get_path' => 'data/upload/{sid}/img/',
    'compress_enable' => true,
  ),
  'video_config' => 
  array (
    'type' => 
    array (
      0 => '.flv',
      1 => '.swf',
      2 => '.mkv',
      3 => '.avi',
      4 => '.rm',
      5 => '.rmvb',
      6 => '.mpeg',
      7 => '.mpg',
      8 => '.ogg',
      9 => '.ogv',
      10 => '.mov',
      11 => '.wmv',
      12 => '.mp4',
      13 => '.webm',
      14 => '.mp3',
      15 => '.wav',
      16 => '.mid',
    ),
    'size' => 52428800,
    'save_path' => 'data/upload/{sid}/video/{yyyy}{mm}{dd}/{time}{rand:6}',
    'get_path' => 'data/upload/{sid}/video/',
  ),
  'audio_config' => 
  array (
    'type' => 
    array (
      1 => '.mp3',
      2 => '.amr',
    ),
    'size' => 31457280,
    'save_path' => 'data/upload/{sid}/audio/{yyyy}{mm}{dd}/{time}{rand:6}',
    'get_path' => 'data/upload/{sid}/audio/',
  ),
  'file_config' => 
  array (
    'type' => 
    array (
      0 => '.rar',
      1 => '.zip',
      2 => '.tar',
      3 => '.gz',
      4 => '.7z',
      5 => '.bz2',
      6 => '.cab',
      7 => '.iso',
      8 => '.doc',
      9 => '.docx',
      10 => '.xls',
      11 => '.xlsx',
      12 => '.ppt',
      13 => '.pptx',
      14 => '.pdf',
      15 => '.txt',
      16 => '.md',
      17 => '.xml',
    ),
    'get_type' => 
    array (
      0 => '.flv',
      1 => '.swf',
      2 => '.mkv',
      3 => '.avi',
      4 => '.rm',
      5 => '.rmvb',
      6 => '.mpeg',
      7 => '.mpg',
      8 => '.ogg',
      9 => '.ogv',
      10 => '.mov',
      11 => '.wmv',
      12 => '.mp4',
      13 => '.webm',
      14 => '.mp3',
      15 => '.wav',
      16 => '.mid',
      17 => '.rar',
      18 => '.zip',
      19 => '.tar',
      20 => '.gz',
      21 => '.7z',
      22 => '.bz2',
      23 => '.cab',
      24 => '.iso',
      25 => '.doc',
      26 => '.docx',
      27 => '.xls',
      28 => '.xlsx',
      29 => '.ppt',
      30 => '.pptx',
      31 => '.pdf',
      32 => '.txt',
      33 => '.md',
      34 => '.xml',
    ),
    'size' => 2097152,
    'save_path' => 'data/upload/{sid}/file/{yyyy}{mm}{dd}/{time}{rand:6}',
    'get_path' => 'data/upload/{sid}/file/',
  ),
  'geetest' => 
  array (
    'geetest_on' => false,
    'captcha_id' => '1b0f34dcd079b492ec89799d7b3a4dfd',
    'private_key' => 'c18ed640683d091aa49c1f8a5a85a3cd',
  ),
  'is_verify' => false,
  'verify' => 
  array (
    'fontSize' => '25',
    'useZh' => false,
    'expire' => '60',
    'useNoise' => true,
    'imageH' => 42,
    'imageW' => 250,
    'length' => '3',
    'useCurve' => true,
  ),
  'login_config' => 
  array (
    'effective_time' => '40',
  ),
  'url_route_on' => true,
  'url_route_must' => false,
  'route_complete_match' => false,
  'auth_config' => 
  array (
    'auth_on' => true,
    'auth_type' => 1,
  ),
  'log_config' => 
  array (
    'log_hold_time' => 30,
    'is_open_log' => true,
    'is_match' => true,
    'is_CN' => false,
    'no_log_table' => 
    array (
      0 => 'officer_info',
    ),
  ),
  'not_check_action' => 
  array (
    0 => 'Sys/clear',
    1 => 'Index/index',
    2 => 'FileUpload/saveupload',
    3 => 'FileUpload/multiupload',
    4 => 'Ueditor/upload',
    5 => 'FileUpload/getImgdata',
    6 => 'OperateManage/ajaxfeedbackdata',
    7 => 'FileUpload/delMutildata',
    8 => 'FileUpload/ueditorconfig',
    9 => 'FileUpload/filemodal',
    10 => 'FileUpload/uploadfile',
    11 => 'FileUpload/uploadoneImg',
    13 => 'Test/index',
    14 => 'FileUpload/imgcompress',
  ),
  'pc_img_width' => 1024,
  'pc_img_quality' => 7,
  'water_config' => 
  array (
    'is_water' => true,
    'img_water' => 
    array (
      'is_img' => false,
      'img_locate' => 1,
      'alpha' => 100,
      'water_img_src' => '',
    ),
    'text_water' => 
    array (
      'is_text' => true,
      'text_locate' => 1,
      'text' => 'LDF',
      'size' => 35,
      'color' => '#000000',
      'angle' => 0,
      'font' => 'G:\\wamp64\\PHPTutorial\\WWW\\tp5_dev\\public\\pc-ui/font/1.ttf',
    ),
  ),
  'thumb_config' => 
  array (
    'is_thumb' => true,
    'max_width' => 150,
    'max_height' => 150,
    'thumb_type' => 2,
  ),
);