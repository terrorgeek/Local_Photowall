<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
function Check_Vertical_Line($multi_photo_name)
{
	if(stripos($multi_photo_name, "|")==False)
	   return $multi_photo_name;
	else
		return substr($multi_photo_name, 0,stripos($multi_photo_name, "|"));
}
$file_name="../Friends_Text_Files/".$_SESSION["user_id"].".txt";
$fp_friends=fopen($file_name, "a+");
$friends_txt=@fread($fp_friends, filesize($file_name));
fclose($fp_friends);
$sql_friends_news="select marker_nick_name,be_marked_user_id,photo_path,date from friends_movement where marker_user_id
                   IN (";
if(trim($friends_txt)=="")
    $sql_friends_news.="0)";
else
	$sql_friends_news.=$friends_txt.")";
$query=mysql_query($sql_friends_news);
$result=array();
while($out=mysql_fetch_array($query))
{
	$temp=array();
	$temp=explode(",", $out["be_marked_user_id"]);
	if(in_array($_SESSION["user_id"], $temp))
	{
		$new_array=array("marker_nick_name"=>$out["marker_nick_name"],"photo_path"=>"../Project_Images/photos/".Check_Vertical_Line($out["photo_path"]),"date"=>$out["date"]);
		array_push($result,$new_array);
	}
}
$smarty->assign("result",$result);
$smarty->display("album/paste_album.html");
?>