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
$sql_show_all_album="select album_id, is_encrypt, album_name, description, reading_authority from album where 
                     user_id=".$_SESSION["user_id"];
$query_all_album=mysql_query($sql_show_all_album);
$album_2d_array=array();
while($out=mysql_fetch_array($query_all_album))
{
	$temp=array("album_id"=>$out["album_id"],"is_encrypt"=>$out["is_encrypt"],"album_name"=>$out["album_name"],
	            "description"=>$out["description"],"reading_authority"=>$out["reading_authority"],"cover"=>str_replace(" ","%20",Get_First_Photo($out["album_id"])));
	array_push($album_2d_array,$temp);
}
$smarty->assign("album_2d_array",$album_2d_array);
$smarty->display("album/show_album.html");
