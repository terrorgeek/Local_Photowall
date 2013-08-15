<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
require_once('../../Controller/Libs/Get_Album_Info.php');
require_once('../../Controller/Libs/Get_Fans_Concerns_Friends_Info.php');

$album_id=filter_string($_GET["album_id"]);
$album_name=filter_string(urldecode($_GET["album_name"]));
$sql="select photo_id, photo_name, photo_description, photo_path, album_id, created_at from photos where album_id=".$album_id;
$query_album=mysql_query($sql);
$photo_2d_array=array();

$all_photo_id="";
$all_photo_names="";

$album_html="";
$q_album_for_html=Get_Album_By_User_ID($_SESSION["user_id"]);
if(mysql_num_rows($q_album_for_html)==0)
	$album_html.="<option>您现在还没有相册!</option>";
else
{
	$album_html.="<option>请选择相册</option>";
	while($out=mysql_fetch_array($q_album_for_html))
	{
		$album_html.="<option value='".$out['album_id']."'>".$out["album_name"]."</option>";
	}
}
while($out=mysql_fetch_array($query_album))
{
	$all_photo_id.=$out["photo_id"].",";
	$all_photo_names.=$out["photo_name"]."|";
	$temp=array("photo_name"=>$out["photo_name"],"photo_description"=>$out["photo_description"],
	            "photo_path_display"=>str_replace(" ", "%20", $out["photo_path"]),"album_id"=>$out["album_id"],"created_at"=>$out["created_at"],
				"photo_id"=>$out["photo_id"],"photo_path"=>$out["photo_path"]);
    array_push($photo_2d_array,$temp);
}
$all_photo_id=substr($all_photo_id, 0,strlen($all_photo_id)-1);
$all_photo_names=substr($all_photo_names, 0,strlen($all_photo_names)-1);
$users=Get_Friends_For_At();

$smarty->assign("photo_amount",mysql_num_rows($query_album));
$smarty->assign("users",$users);
$smarty->assign("album_html",$album_html);
$smarty->assign("all_photo_ids",$all_photo_id);
$smarty->assign("all_photo_names",$all_photo_names);
$smarty->assign("photo_2d_array",$photo_2d_array);
$smarty->assign("album_name",$album_name);
$smarty->display("album/opened_album.html");
?>