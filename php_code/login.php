<?php

/**
 * @Title: 统一登录接口
 * @Author: Minato
 * @Date: 2016-03-04
 * 
 * 	返回0：正确返回
 * 	返回1：platform、username 不完整
 * 	返回2：sessionid 不完整
 * 	返回3：平台验证不通过
 */
define('DEBUG', FALSE);
require_once('header.api.php');
require_once('user.class.php');


$userInfo = array(
	'c_account' 	=> trim($_GET['c_account']),
	'c_os_code' 	=> $_GET['c_os_code'],
	'c_pass_md5' 	=> urldecode($_GET['c_pass_md5']),
);
$obj = new user('login');
$ret = $obj-> login($userInfo);
echo(json_encode($ret));

