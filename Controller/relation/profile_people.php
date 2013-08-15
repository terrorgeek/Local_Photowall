<?php session_start();
require_once('../../connector.ini.php');
include_once 'load_fans_concerns_friends.php';
include_once 'PinYin.php';
$login_name=$_SESSION["login_name"];
$user_id=$_SESSION["user_id"];
$friends_array=array();
$concerns_array=array();
$fans_array=array();
$html="";
$letter_storage=array();
//此函数返回一段HTML代码, 代码中已对字母顺序作出判断并且已将字母间的界限划好
function Travers_Answer($array,&$letter_storage)
{
	
	$html="";
	$flag="A";
	array_push($letter_storage, "999");
	for($i=0;$i<count($array);$i++)
	{ 
		//一律转换成大写
		$first_letter=strtoupper(substr($array[$i]['PinYin'], 0,1));
		array_push($letter_storage, $first_letter);
//		if($flag!=$first_letter)
//		    $html.="<hr/>";
//		if($array[$i]['nick_name']!="")//如果nick_name不为空,则显示nick_name, 否则显示login_name
//		    $html.=$array[$i]['nick_name']."<a href='profile_form.php?user_id=".$array[$i]['user_id']."'><img width='100' height='100' src='".$array[$i]['head_photo']."' /></a>";
//		else
//		    $html.=$array[$i]['login_name']."<a href='profile_form.php?user_id=".$array[$i]['user_id']."'><img width='100' height='100' src='".$array[$i]['head_photo']."' /></a>";
	}
	return $html;
}
if($_GET["see_what"]=="friends")//贴友
{
  	$friends_array=display_friends();
	Travers_Answer($friends_array,$letter_storage);
	$smarty->assign("friends_array",$friends_array);
  	$smarty->assign("letter_storage",$letter_storage);
    $smarty->assign("login_name",$login_name);
	if($_GET["new_added_friends"]!="")
	{
		$ids=$_GET["new_added_friends"];
		$array_id=explode(",", $ids);
		$sql_upate="update friends set is_disposed='yes' where reviewer_id=".$_SESSION["user_id"];
		mysql_query($sql_upate);
	}
  	$smarty->display("relation/friend.html");
  	exit;
}
elseif ($_GET["see_what"]=="concerns")//关注
{
    $concerns_array=display_concerns();
    Travers_Answer($concerns_array,$letter_storage);
    $smarty->assign("letter_storage",$letter_storage);
    $smarty->assign("concerns_array",$concerns_array);
    $smarty->assign("login_name",$login_name);
    $smarty->display("relation/concern.html");
    exit;
}
elseif($_GET["see_what"]=="fans") //粉丝
{
  	$fans_array=display_fans();
  	$smarty->assign("fans_array",$fans_array);
  	Travers_Answer($fans_array,$letter_storage);
  	$smarty->assign("letter_storage",$letter_storage);
    $smarty->assign("login_name",$login_name);
	if($_GET["new_added_fans"])
	{
		$ids=$_GET["new_added_fans"];
		$array_id=explode(",", $ids);
		$sql_update="update concern set is_disposed='yes' where goal_id=".$_SESSION['user_id'];
	//	echo $sql_update;
		mysql_query($sql_update);
	}
  	$smarty->display("relation/fans.html");
  	exit;
}
elseif($_GET["see_what"]=="null")
{
	$smarty->display("relation/friend_main.html");
}
else//缺省时显示我的贴友
{
	$friends_array=display_friends();
	$smarty->assign("friends_array",$friends_array);
  	Travers_Answer($friends_array,$letter_storage);
  	$smarty->assign("letter_storage",$letter_storage);
    $smarty->assign("login_name",$login_name);
  	$smarty->display("relation/friend.html");
  	exit;
}
