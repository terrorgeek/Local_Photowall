<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
//解除好友关系时,我不会再关注他,但他依然是我的粉丝
if(isset($_GET["user_id"])&&isset($_GET["action"]))
{
	$user_id=filter_string($_GET["user_id"]);
	if($_GET["action"]=="delete")
	{
		$sql="delete from friends where applicant_id='".$user_id."' and reviewer_id='".$_SESSION['user_id']."' or
		      applicant_id='".$_SESSION['user_id']."' and reviewer_id='".$user_id."'";
		$query=mysql_query($sql);//先删friends表里的
		//再往concern表里加,被删得不再是好友,而变成我的粉丝
		$sql_change_to_concern="insert into concern (follower_id, goal_id,is_disposed) values ('".$user_id."','".$_SESS['user_id']."','no')";
		$query2=mysql_query($sql_change_to_concern);
		if($query&&$query2)
		   echo "<script>alert('success!');</script>";
		else "<script>alert('failed!');</script>";
		   
	}
}