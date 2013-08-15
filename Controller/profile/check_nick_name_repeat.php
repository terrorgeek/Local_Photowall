<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
$nick_name=$_POST["nick_name"];
$sql_check_repeat="select user_id from user where nick_name='".$nick_name."' and nick_name!='".$_SESSION['nick_name']."'";
$q=mysql_query($sql_check_repeat);
if(mysql_num_rows($q)==0)
   echo "no";
else {
	echo "yes";
}
exit;
?>