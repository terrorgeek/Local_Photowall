<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
$photo_id=$_REQUEST["photo_id"];
if(isset($_REQUEST["see_flag"])&&$_REQUEST["see_flag"]=="see_normal")
{
	$sql_search_usrname_id_for_photo="select uploader_username, uploader_user_id, photo_original_name, photo_description
	 from photos where photo_id=".$photo_id;
	$q=mysql_query($sql_search_usrname_id_for_photo);
	$result=mysql_fetch_array($q);
	$array=array("user_id"=>$result["uploader_user_id"],"username"=>$result["uploader_username"],
	             "photo_original_name"=>$result["photo_original_name"],"description"=>$result["photo_description"]);
	echo json_encode($array);
}

else if(isset($_REQUEST["see_flag"])&&$_REQUEST["see_flag"]=="see_marked")
{
	$sql_search_usrname_id_for_photo="select marker_username, marker_user_id, photo_original_name, marked_description 
	,description_for_all from marked_photo where marked_photo_id=".$photo_id;
	$q=mysql_query($sql_search_usrname_id_for_photo);
	$result=mysql_fetch_array($q);
	
	$array=array("user_id"=>$result["marker_user_id"],"username"=>$result["marker_username"],
	"photo_original_name"=>$result["description_for_all"],"description"=>$result["marked_description"]);
	echo json_encode($array);
}
?>