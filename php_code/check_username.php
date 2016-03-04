<?php
/**
 * @Title: 客户端检测账号是否存在
 * @Author: Minato
 * @Date: 2016-03-03
 * 
 */

require_once('header.api.php');
require_once('user.class.php');

//组装数据
$userInfo = array(
	'c_os_code' 		=> $_GET['c_os_code'],
	'c_account' 		=> trim($_GET['c_account']),
);

$obj = new user('check_username');
$ret = $obj-> checkUsername($userInfo);
//echo urldecode(print_r($ret,true));
exit(json_encode($ret));


//end script