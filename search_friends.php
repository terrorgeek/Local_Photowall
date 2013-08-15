<?php session_start();
  $conn=mysql_connect("localhost","root","admin");
  mysql_select_db("new_photowall",$conn);
  $_SESSION["user_id"]=18;

function find_only_friends()
{
  
  if(isset($_POST["keyword"])&&$_POST["keyword"]!="")
  {
  	 $key_word=$_POST["keyword"];
  	 $sql_friend="select friends.*,  user.user_id, user.head_photo, user.login_name, user.nick_name  from friends, user
  	              where ((user.user_id=friends.reviewer_id and (friends.reviewer_id='".$_SESSION['user_id']."' or 
  	              friends.applicant_id='".$_SESSION['user_id']."')) or (user.user_id=friends.applicant_id and 
  	              (friends.reviewer_id='".$_SESSION['user_id']."' or friends.applicant_id='".$_SESSION['user_id']."'))) and 
                  user.user_id!='".$_SESSION['user_id']."' group by user.login_name";
  	 $query=mysql_query($sql_friend);
  	 return $query;
  }
} 

function find_people()
{
	if(isset($_POST["keyword"])&&$_POST["keyword"]!="")
	{
		$keyword=mysql_escape_string($_POST["keyword"]);
		$sql_search_people="select user_id, head_photo, login_name, nick_name from user where login_name LIKE '".$keyword."%' or
		                    login_name LIKE '%".$keyword."%' or login_name LIKE '%".$keyword."'";
		$query=mysql_query($sql_search_people);
		return $query;
	}
}

function write_friend_user_id($my_user_id,$his_user_id)
{
	$fp=fopen($my_user_id.".txt", "a+");
	$data=fread($fp, filesize($my_user_id.".txt"));
	fwrite($fp, $data.",".$his_user_id);
}
$query=find_only_friends();
while($out=mysql_fetch_array($query))
{
	echo $out["head_photo"]."<br/>";
}
$query=find_people();
while($out=mysql_fetch_array($query))
{
	echo $out["head_photo"]."<br/>";
}
?>