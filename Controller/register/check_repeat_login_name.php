<?php session_start();
require_once('../../Controller/Validation/validate_string.php');
require_once('../../connector.ini.php');
if(isset($_POST["login_name"])&&$_POST["login_name"]!="")
{
	$login_name=strip_tags(filter_string($_POST["login_name"]));
	$sql_check_repeat="select login_name from user where login_name='".$login_name."'";
	$query=mysql_query($sql_check_repeat);
	if(mysql_num_rows($query)>0)
	    echo trim("repeat");
	else 
	    echo trim("unique");
}
