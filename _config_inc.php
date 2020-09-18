<?php 
/* Initial Timezoone */
date_default_timezone_set('Asia/Phnom_Penh');
/* Application path */
define('BASE_PATH', str_replace("\\", "/", dirname(__FILE__)).'/'); 
$selfPath  = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
$selfPath .= $_SERVER['HTTP_HOST'].'/';
$selfPath .= trim(str_replace($_SERVER['DOCUMENT_ROOT'],'',BASE_PATH),"/");
//define('BASE_URL',$selfPath); 
define('BASE_URL',$selfPath.''); 
// define('ADMIN_URL',BASE_URL . 'pn-admin/'); 
unset($selfPath);