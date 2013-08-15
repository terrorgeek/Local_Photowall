<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
$user_id=$_SESSION["user_id"];
//此页面为所有的有共同兴趣的人的潜在好友
//这就得查数据库了
$sql_find_common_hobby="select ";