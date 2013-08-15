<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
function Get_First_Photo($album_id)
{
	$sql="select photo_path from photos where album_id=".$album_id;
	$query=mysql_query($sql);
	$result=mysql_fetch_array($query);
	if($result["photo_path"]==""||$result["photo_path"]==null)
	   return "../../View/resources/img/album_default_cover/album_default_cover.png";
	else
	   return $result["photo_path"];
}
function Get_Album_By_User_ID($user_id)
{
	//load all of albums of this user!
$sql_show_all_album="select album_id, is_encrypt, album_name, description, reading_authority from album where 
                     user_id=".$user_id;
$query_all_album=mysql_query($sql_show_all_album);
return $query_all_album;
}
?>