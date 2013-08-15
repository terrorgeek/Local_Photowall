<?php 
function Get_User_Nickname_and_Headphoto($user_id)
{
	$sql_for_nickname_and_headphoto="select user_id, head_photo, nick_name from user where user_id=".$user_id;
	$query=mysql_query($sql_for_nickname_and_headphoto);
	return $query;
}
?>