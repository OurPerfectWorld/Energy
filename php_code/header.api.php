<?php
//由于api接口不需求使用session,并且也不需要使用进程控制

error_reporting(0);//屏蔽错误信息
//error_reporting(E_ALL);//test

//合并数据
$_GET = array_merge( $_GET, $_POST );
$_POST = array();
$allGetData = http_build_query($_GET);
foreach ($_GET as $k=>$v)
{
	$$k = trim(htmlspecialchars($v,ENT_QUOTES));
	$_GET[$k] = $$k;
}

require_once 'plat_config.php';//这行一定要在获取参数下面
require_once("sign.class.php");

//验证传的key
//验证sign后，验证MD5
if(empty($sign) || !sign::validateSign($_GET,$sign,GLOBAL_REG_INFO_KEY))
{	
	//验证失败
		
	//写入日志文件
//	$filename = _API_LOG_ROOT."api_sign_".date('Ym').".log";
//	$data = date("Y-m-d H:i:s")." sign验证失败 [加：".$newSign." -> 传:".$_GET['sign']."]，参数: ".$allGetData."\n";
//	file_put_contents($filename, $data,FILE_APPEND);

	echo '-1';
//	exit("-1");
}
unset($allGetData);

//定义时区
$timeZone = 'Asia/Shanghai';
date_default_timezone_set( $timeZone );

