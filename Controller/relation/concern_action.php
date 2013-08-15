<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
if(isset($_GET["user_id"])&&isset($_GET["action"]))
{
	$user_id=filter_string($_GET["user_id"]);
	if($_GET["action"]=="delete")
	{
		$sql="delete from concern where follower_id='".$_SESSION['user_id']."' and goal_id='".$user_id."'";
		$query=mysql_query($sql);
		if($query)
		   echo "<script>alert('success!');</script>";
		else "<script>alert('failed!');</script>";
	}
}
