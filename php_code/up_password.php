<?php
/**
 * @Title: 客户端修改密码时中央服请求检查用户数据是否正确
 * @Author: hcht
 * @Date: 2013-07-27
 * 
 */

require_once('header.api.php');
require_once('user.class.php');

//组装数据
$userInfo = array(
	'c_os_code' 		=> $_GET['c_os_code'],
	'c_account' 		=> trim($_GET['c_account']),
	'c_pass_md5' 		=> trim(urldecode($_GET['c_pass_md5'])),
	'c_new_pass_md5' 	=> trim(urldecode($_GET['c_new_pass_md5'])),
);

$obj = new user('up_password');
$ret = $obj-> upPassword($userInfo);
//echo urldecode(print_r($ret,true));
exit(json_encode($ret));

//end script