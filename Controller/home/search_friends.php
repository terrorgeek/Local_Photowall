<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Libs/constants.php');
require_once('../../Controller/Libs/PinYin.php');
require_once('../../Controller/Libs/search_friends_algorithm.php');
$result_concerns=Find_My_Concern();
$result_fans=Find_My_Fans();
$result_friends=Find_My_Friends();
//$result_people=find_people();
$Final_ResultSet=array();
//iterate all the 4 ResultSets
while($out=@mysql_fetch_array($result_friends["ResultSet1"]))
{
	$temp=array("nick_name"=>$out["nick_name"],"photo_path"=>$out["head_photo"],"user_id"=>$out["user_id"],"flag"=>"我的贴友");
	array_push($Final_ResultSet,$temp);
}
while($out=@mysql_fetch_array($result_friends["ResultSet2"]))
{
	$temp=array("nick_name"=>$out["nick_name"],"photo_path"=>$out["head_photo"],"user_id"=>$out["user_id"],"flag"=>"我的贴友");
	array_push($Final_ResultSet,$temp);
}
while($out=@mysql_fetch_array($result_concerns["ResultSet"]))
{
	$temp=array("nick_name"=>$out["nick_name"],"photo_path"=>$out["head_photo"],"user_id"=>$out["user_id"],"flag"=>"我的关注");
	array_push($Final_ResultSet,$temp);
}
while($out=@mysql_fetch_array($result_fans["ResultSet"]))
{
	$temp=array("nick_name"=>$out["nick_name"],"photo_path"=>$out["head_photo"],"user_id"=>$out["user_id"],"flag"=>"我的粉丝");
	array_push($Final_ResultSet,$temp);
}

// while($out=mysql_fetch_array($result_people["ResultSet"]))
// {
	// $temp=array("nick_name"=>$out["nick_name"]);
	// array_push($Final_ResultSet,$temp);
// }

for ($i=0; $i < count($Final_ResultSet); $i++) { 
	$nick_name=$Final_ResultSet[$i]["nick_name"];
	$photo_path=$Final_ResultSet[$i]["photo_path"];
	$user_id=$Final_ResultSet[$i]["user_id"];
	$flag=$Final_ResultSet[$i]["flag"];
?>
<div class="display_box" align="left">
<img src=<?php echo $head_photo_folder.str_replace(" ", "%20", $user_id."_".$photo_path); ?> style="width:50px; height:50px; float:left; margin-right:6px;" /><span class="name"><?php echo $nick_name; ?></span>&nbsp;<br/><?php echo $flag; ?><br/>
<span style="font-size:9px; color:#999999"><?php echo $country; ?></span></div>
<?php 
}
?>