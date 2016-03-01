<?php
/**
 * @name 用户表相关的函数接口
 * @author Minato
 * @since 20160301
 */

//判断是否存在用户
function isExistUser ($c_account, $c_pass_md5, $fdb)
{
	$chkSql = "select c_id from ".DB_KEEP_USER_ACCOUNT." where c_account = '{$c_account}' and c_pass_md5 = '{$c_pass_md5}'";
	$chkQuery = mysql_query($chkSql, $fdb);

	$result = mysql_fetch_assoc($chkQuery);

	if ($result) {
		//exist user
		$c_id = $result['c_id'];
		return $c_id;
	}
	return false;
}

//创建用户
function createUser ($c_account, $c_pass_md5, $table_name, $fdb)
{
	$exeSql = "insert into ".$table_name." set c_account = '{$c_account}',c_pass_md5 = '{$c_pass_md5}'";
	$exeQuery = mysql_query($exeSql, $fdb);
	if(!$exeQuery){
		die("添加数据失败".mysql_error());
	}else {
		return isExistUser($c_account, $c_pass_md5, $fdb);
	}
}

//获取用户数据
function getUserData ($c_id, $table_name, $fdb)
{
	$resultSql = mysql_query("select * from ".$table_name." where c_id = {$c_id}", $fdb);
	while ($row = mysql_fetch_assoc($resultSql)) {
		$returnData[] = $row;
	}
	echo json_encode($returnData);
}



