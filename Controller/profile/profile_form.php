<?php @session_start();
require_once('../../connector.ini.php');
include_once 'load_fans_concerns_friends.php';
include_once 'PinYin.php';
$login_name=$_SESSION["login_name"];
$user_id=$_SESSION["user_id"];

$smarty->assign("login_name",$login_name);
$smarty->display("profile/profile_form.html");
