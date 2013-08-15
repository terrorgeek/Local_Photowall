<?php session_start();
require_once 'PinYin.php';
function display_friends($result)
{
	while($out=mysql_fetch_array($result))
	{
		if($out['nick_name']!="")
		{
			
		}
		else
		{
			
		}
	}
}
$sql_concern="select concern.goal_id, user.head_photo, user.user_id, user.nick_name, user.login_name from concern, user where 
              concern.follower_id='".$_SESSION['user_id']."' and concern.goal_id=user.user_id";
$sql_fans="select concern.follower_id, user.head_photo, user.user_id, user.nick_name, user.login_name from concern, user where
              concern.goal_id='".$_SESSION['user_id']."' and concern.follower_id=user.user_id";
$sql_friend1="select friends.reviewer_id, user.head_photo, user.user_id, user.nick_name, user.login_name from friends,user where
              friends.applicant_id='".$_SESSION['user_id']."' and friends.reviewer_id=user.user_id";
$sql_friend2="select friends.applicant_id, user.head_photo, user.user_id, user.nick_name, user.login_name from user,friends where
              friends.reviewer_id='".$_SESSION['user_id']."' and friends.applicant_id=user.user_id";
  if($_POST["see_what"]=="friends")//лЫся
  {
  	  
  }
  elseif ($_POST["see_what"]=="concern")//╧ьв╒
  {
     
  }
  else //╥шк©
  {
  	 
  } 
?>