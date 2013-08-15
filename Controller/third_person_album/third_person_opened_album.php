<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
require_once('../../Controller/Libs/Get_Fans_Concerns_Friends_Info.php');
require_once('../../Controller/Libs/Get_Photo_Info.php');
require_once('../../Controller/Libs/Get_Third_Person_Info.php');
require_once('../../Controller/Libs/constants.php');

$user_id=$_REQUEST["user_id"];
$album_id=$_REQUEST["album_id"];
$album_name=$_REQUEST["album_name"];

$all_photo_name="";
$all_photo_id="";

$third_person_query=Get_User_Nickname_and_Headphoto($user_id);
$result_third_person=mysql_fetch_array($third_person_query);
$third_person_nick_name=$result_third_person["nick_name"];
$third_person_head_photo=$head_photo_folder.str_replace(" ", "%20", $result_third_person["user_id"]."_".$result_third_person["head_photo"]);
$arr=$arr=Get_Fans_Concerns_Friends($user_id);
$query_album=Get_Photos_By_Album_ID($album_id);
$photo_number=mysql_num_rows($query_album);
$photo_2d_array=array();

$my_fans_ids=get_all_fans_id_by_an_id($_SESSION["user_id"]);
$my_friends_ids=get_all_friends_id_by_an_id($_SESSION["user_id"]);

$can_comment="";
if(in_array($user_id, $my_friends_ids)||in_array($user_id, $my_fans_ids))
    $can_comment="yes";
else
	$can_comment="no";
while($out=@mysql_fetch_array($query_album))
{
	$temp=array("photo_name"=>$out["photo_name"],"photo_description"=>$out["photo_description"],
	            "photo_path"=>str_replace(" ","%20",$out["photo_path"]),"album_id"=>$out["album_id"],"created_at"=>$out["created_at"],
				"photo_id"=>$out["photo_id"],"can_comment"=>$can_comment);
	$all_photo_name.=$out["photo_name"]."|";
	$all_photo_id.=$out["photo_id"].",";
    array_push($photo_2d_array,$temp);
}
$all_photo_name=substr($all_photo_name, 0,strlen($all_photo_name)-1);
$all_photo_id=substr($all_photo_id, 0,strlen($all_photo_id)-1);

$smarty->assign("third_user_id",$user_id);
$smarty->assign("identity",decide_identity($user_id));
$smarty->assign("all_photo_name",$all_photo_name);
$smarty->assign("all_photo_id",$all_photo_id);
$smarty->assign("nick_name",$third_person_nick_name);
$smarty->assign("head_photo",$third_person_head_photo);
$smarty->assign("concerns_count",$arr[0]);
$smarty->assign("fans_count",$arr[1]);
$smarty->assign("friends_count",$arr[2]);
$smarty->assign("photo_2d_array",$photo_2d_array);
$smarty->assign("album_name",$album_name);
$smarty->assign("photo_number",$photo_number);
$smarty->display("third_person_album/third_person_opened_album.html");
?>