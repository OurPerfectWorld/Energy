<?php
/**
 * @name 登陆获取用户信息
 * @author Minato
 * @since 20160301
 * @param $_GET['userID'] $_GET['passWord']
 * @return 1:成功（返回用户的json）, -1:校验失败, -2:参数错误, -3:数据库错误
 */

require("header.api.php");

$fdb = dbConnect($F_DB); //连接数据库

if (empty($_GET['c_account']) || empty($_GET['c_pass_md5'])) {
    die("-2");
}

$c_account = mysql_real_escape_string($_GET['c_account']);
$c_pass_md5 = mysql_real_escape_string($_GET['c_pass_md5']);


$c_id = isExistUser($c_account, $c_pass_md5, $fdb);
if ($c_id) {
	getUserData($c_id, DB_KEEP_USER_ACCOUNT, $fdb);
} else {
	$c_id = createUser($c_account, $c_pass_md5, DB_KEEP_USER_ACCOUNT, $fdb);
	getUserData($c_id, DB_KEEP_USER_ACCOUNT, $fdb);
}


