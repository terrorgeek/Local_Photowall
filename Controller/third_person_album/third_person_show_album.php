<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
require_once('../../Controller/Libs/Get_Fans_Concerns_Friends_Info.php');
require_once('../../Controller/Libs/Get_Album_Info.php');
require_once('../../Controller/Libs/Get_Third_Person_Info.php');
require_once('../../Controller/Libs/constants.php');
$user_id=$_REQUEST["user_id"];
$third_person_query=Get_User_Nickname_and_Headphoto($user_id);
$result_third_person=mysql_fetch_array($third_person_query);
$third_person_nick_name=$result_third_person["nick_name"];
$third_person_head_photo=$head_photo_folder.str_replace(" ", "%20", $result_third_person["user_id"]."_".$result_third_person["head_photo"]);
//load all of albums of this user!
$sql_show_all_album="select album_id, is_encrypt, album_name, description, reading_authority from album where 
                     user_id=".$user_id;
$query_all_album=Get_Album_By_User_ID($user_id);
$album_2d_array=array();
$arr=Get_Fans_Concerns_Friends($user_id);
while($out=mysql_fetch_array($query_all_album))
{
	$temp=array("album_id"=>$out["album_id"],"is_encrypt"=>$out["is_encrypt"],"album_name"=>$out["album_name"],
	            "description"=>$out["description"],"reading_authority"=>$out["reading_authority"],"cover"=>str_replace(" ","%20",Get_First_Photo($out["album_id"]))
				);
	array_push($album_2d_array,$temp);
}

$smarty->assign("identity",decide_identity($user_id));
$smarty->assign("third_user_id",$user_id);
$smarty->assign("nick_name",$third_person_nick_name);
$smarty->assign("head_photo",$third_person_head_photo);
$smarty->assign("concerns_count",$arr[0]);
$smarty->assign("fans_count",$arr[1]);
$smarty->assign("friends_count",$arr[2]);
$smarty->assign("album_2d_array",$album_2d_array);
$smarty->display("third_person_album/third_person_show_album.html");
?>