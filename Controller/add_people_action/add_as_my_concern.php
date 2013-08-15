<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
require_once('../../Controller/Libs/constants.php');
function write_friend_user_id($my_user_id,$his_user_id)
{
	$filename="../Friends_Text_Files/".$my_user_id.".txt";
	$fp=fopen($filename, "r");
	$data=@fread($fp,filesize($filename));
	$fp=fopen($filename, "w");
	fwrite($fp, $data.",".$his_user_id);
	fclose($fp);
}
$my_user_id=$_SESSION["user_id"];
$counterpart_id=$_REQUEST["counterpart_id"];
$sql_find_concern="select follower_id, goal_id from concern where goal_id='".$my_user_id."' and 
                   follower_id='".$counterpart_id."'";
$query=mysql_query($sql_find_concern);
if(mysql_num_rows($query)==0)
{
	$sql_add_concern="insert into concern (follower_id, goal_id, is_disposed) values ('".$my_user_id."','".$counterpart_id."','no')";
	if(mysql_query($sql_add_concern))
	   echo "success";
}
else
{
	$sql_delete_data_in_concern_table="delete from concern where goal_id='".$my_user_id."' and 
                   follower_id='".$counterpart_id."'";
	$q1=mysql_query($sql_delete_data_in_concern_table);
	$sql_add_as_friends="insert into friends (reviewer_id, applicant_id, is_disposed) values ('".$counterpart_id."',
	                     '".$my_user_id."','no')";
	$q2=mysql_query($sql_add_as_friends);
	write_friend_user_id($my_user_id,$counterpart_id);
	write_friend_user_id($counterpart_id,$my_user_id);
	if($q1&&$q2)
	   echo "success";
}
?>