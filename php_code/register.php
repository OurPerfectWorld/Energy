<?php
/**
 * @Title: 客户端注册时，向中央服抛用户的数据保存
 * @Author: Minato
 * @Date: 2016-03-03
 * 
 */
define("DEBUG", TRUE);
require_once('header.api.php');
require_once('user.class.php');

//临时打log
// $filename = ERRORLOG."register_".date('Ymd').".log";
// $data = date("Y-m-d H:i:s")."\ninterface:".$_SERVER['PHP_SELF']." ,client params:\n".print_r($_GET,true)."\n\n";
// file_put_contents($filename, $data,FILE_APPEND);

//组装数据
$userInfo = array(
	'c_account' 	=> trim($_GET['c_account']),
	'c_os_code' 	=> $_GET['c_os_code'],
	'c_pass_md5' 	=> urldecode($_GET['c_pass_md5']),
	'c_email' 	=> '',
	'c_phone_num' => '',//目前注册时没有手机号码的 trim($_GET['phone_num']),
	'c_createtime' => date("Y-m-d H:i;s"),
);

//注册过程,要防止批量涮注册哦
if ($_GET['binding'] == 1) { //暂时用不着
    $obj = new user('binding');
    $ret = $obj-> binding($userInfo);
    exit(json_encode($ret));
	
}else{
    $obj = new user('register');
    $ret = $obj-> register($userInfo);
//    echo(json_encode($ret));
    exit(json_encode($ret));
}


//end script
