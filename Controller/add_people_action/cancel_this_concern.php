<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
require_once('../../Controller/Libs/constants.php');
function Delete_an_ID_from_Textfile($my_user_id,$user_id)
{
//	$filename="../Friends_Text_Files/".$_SESSION['user_id'].".txt";
$filename="../Friends_Text_Files/".$my_user_id.".txt";
	$fp=fopen($filename, "r");
	$data=@fread($fp, filesize($filename));
	$friends_array=explode(",", $data);
	for ($i=0; $i <count($friends_array) ; $i++) { 
		if($friends_array[$i]==$user_id)
		{
			unset($friends_array[$i]);
			break;
		}    
	}
	$data=implode(",", $friends_array);
	$fp=fopen($filename, "w");
	fwrite($fp, $data);
	fclose($fp);
}
$my_user_id=$_SESSION["user_id"];
$counterpart_id=$_REQUEST["counterpart_id"];
//first look at concerns tables
$sql_peek_concern_table="select follower_id, goal_id from concern where 
                         follower_id='".$my_user_id."' and goal_id='".$counterpart_id."'";
$query=mysql_query($sql_peek_concern_table);
if(mysql_num_rows($query)==0)
{
	//so it must be in friends table
	$sql_delete_from_friends="delete from friends where applicant_id='".$my_user_id."' and reviewer_id='".$counterpart_id."' or 
	                          applicant_id='".$counterpart_id."' and reviewer_id='".$my_user_id."'";
    $q=mysql_query($sql_delete_from_friends);
	$sql_insert_to_concern="insert into concern (follower_id, goal_id, is_disposed) values ('".$counterpart_id."','".$my_user_id."','no')";
	$q2=mysql_query($sql_insert_to_concern);
	Delete_an_ID_from_Textfile($_SESSION["user_id"],$counterpart_id);
	Delete_an_ID_from_Textfile($counterpart_id,$_SESSION["user_id"]);
    if($q&&$q2)
	   echo "yes";
}
else
{
	$sql_delete_from_concern="delete from concern where follower_id='".$my_user_id."' and goal_id='".$counterpart_id."'";
	$q=mysql_query($sql_delete_from_concern);
	if($q)
	  echo "yes";
}
?>