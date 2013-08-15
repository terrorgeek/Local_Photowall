<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
require_once('../../Controller/Libs/search_friends_algorithm.php');
require_once('../../Controller/Libs/constants.php');
require_once('../../Controller/Libs/Get_Fans_Concerns_Friends_Info.php');
$result_concerns=Find_My_Concern();
$result_fans=Find_My_Fans();
$result_friends=Find_My_Friends();
$result_stranger=find_people();
$Final_ResultSet=array();
//iterate all the 4 ResultSets
while($out=@mysql_fetch_array($result_friends["ResultSet1"]))
{
	$arr=Get_Fans_Concerns_Friends($out["user_id"]);
	$temp=array("nick_name"=>$out["nick_name"],"photo_path"=>$head_photo_folder.str_replace(" ", "%20", $out["user_id"]."_".$out["head_photo"]),
	"location"=>$out["province"].",".$out["city"],"introduction"=>$out["introduction"],
	"user_id"=>$out["user_id"],"flag"=>"myfriends","concerns_count"=>$arr[0],"fans_count"=>$arr[1],"friends_count"=>$arr[2]);
	array_push($Final_ResultSet,$temp);
}
while($out=@mysql_fetch_array($result_friends["ResultSet2"]))
{
	$arr=Get_Fans_Concerns_Friends($out["user_id"]);
	$temp=array("nick_name"=>$out["nick_name"],"photo_path"=>$head_photo_folder.str_replace(" ", "%20", $out["user_id"]."_".$out["head_photo"]),
	"location"=>$out["province"].",".$out["city"],"introduction"=>$out["introduction"],
	"user_id"=>$out["user_id"],"flag"=>"myfriends","concerns_count"=>$arr[0],"fans_count"=>$arr[1],"friends_count"=>$arr[2]);
	array_push($Final_ResultSet,$temp);
}
while($out=@mysql_fetch_array($result_concerns["ResultSet"]))
{
	$arr=Get_Fans_Concerns_Friends($out["user_id"]);
	$temp=array("nick_name"=>$out["nick_name"],"photo_path"=>$head_photo_folder.str_replace(" ", "%20", $out["user_id"]."_".$out["head_photo"]),
	"location"=>$out["province"].",".$out["city"],"introduction"=>$out["introduction"],
	"user_id"=>$out["user_id"],"flag"=>"myconcerns","concerns_count"=>$arr[0],"fans_count"=>$arr[1],"friends_count"=>$arr[2]);
	array_push($Final_ResultSet,$temp);
}
while($out=@mysql_fetch_array($result_fans["ResultSet"]))
{
	$arr=Get_Fans_Concerns_Friends($out["user_id"]);
	$temp=array("nick_name"=>$out["nick_name"],"photo_path"=>$head_photo_folder.str_replace(" ", "%20", $out["user_id"]."_".$out["head_photo"]),
	"location"=>$out["province"].",".$out["city"],"introduction"=>$out["introduction"],
	"user_id"=>$out["user_id"],"flag"=>"myfans","concerns_count"=>$arr[0],"fans_count"=>$arr[1],"friends_count"=>$arr[2]);
	array_push($Final_ResultSet,$temp);
}
//this is to load the strangers
while($out=@mysql_fetch_array($result_stranger["ResultSet"]))
{
	$arr=Get_Fans_Concerns_Friends($out["user_id"]);
	$temp=array("nick_name"=>$out["nick_name"],"photo_path"=>$head_photo_folder.str_replace(" ", "%20", $out["user_id"]."_".$out["head_photo"]),
	"location"=>$out["province"].",".$out["city"],"introduction"=>$out["introduction"],
	"user_id"=>$out["user_id"],"flag"=>"none","concerns_count"=>$arr[0],"fans_count"=>$arr[1],"friends_count"=>$arr[2]);
	array_push($Final_ResultSet,$temp);
}
$smarty->assign("Final_ResultSet",$Final_ResultSet);
$smarty->display("home/search_result.html");
?>