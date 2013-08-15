<?php session_start();
include_once 'PinYin.php';
//遍历一个结果集
function Travers_ResultSet($sql)
{
	$result_array=array();
	$index=0;
	$query=mysql_query($sql);
	while($out=mysql_fetch_array($query))
	{	
	    if($out['nick_name']!="")
		{
			$pinyin_value=$out["nick_name"];
			if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",substr($pinyin_value, 0,3)))
		        $pinyin_value=Pinyin($out['nick_name'],"UTF-8");
			$result_array[$index]=array('PinYin'=>$pinyin_value,'nick_name'=>$out["nick_name"],'login_name'=>$out["login_name"],
			                             'user_id'=>$out["user_id"],'head_photo'=>"../Project_Images/head_photo/".$out['user_id']."_".$out['head_photo']);
		}
		else
		{
			$pinyin_value=$out["login_name"];
			if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",substr($pinyin_value, 0,3)))
		        $pinyin_value=Pinyin($out['login_name'],"UTF-8");
			$result_array[$index]=array('PinYin'=>$pinyin_value,'login_name'=>$out["login_name"],'nick_name'=>$out["nick_name"],
			                             'user_id'=>$out["user_id"],'head_photo'=>"../Project_Images/head_photo/".$out['user_id']."_".$out['head_photo']);
		}
		$index++;
		
	}
	return $result_array;
}

//加载贴友,粉丝,关注,三个函数均返回数组
//加载好友
function display_friends()
{
	$sql_friend1="select friends.reviewer_id, user.head_photo, user.user_id, user.nick_name, user.login_name from friends,user where
              friends.applicant_id='".$_SESSION['user_id']."' and friends.reviewer_id=user.user_id";
    $sql_friend2="select friends.applicant_id, user.head_photo, user.user_id, user.nick_name, user.login_name from user,friends where
              friends.reviewer_id='".$_SESSION['user_id']."' and friends.applicant_id=user.user_id";
	$result1=Travers_ResultSet($sql_friend1);
	$result2=Travers_ResultSet($sql_friend2);
	//这里由于是两个结果集, 所以需要先合并一下再排序
	$friends_array=array_merge($result1,$result2);
	array_multisort($friends_array);
	return $friends_array;
}

//加载粉丝
function display_fans()
{
	$fans_array=array();
	$index=0;
	$sql_fans="select concern.follower_id, user.head_photo, user.user_id, user.nick_name, user.login_name from concern, user where
              concern.goal_id='".$_SESSION['user_id']."' and concern.follower_id=user.user_id";
	$fans_array=Travers_ResultSet($sql_fans);
	array_multisort($fans_array);
	return $fans_array;
}

//加载关注
function display_concerns()
{
	$concerns_array=array();
	$index=0;
	$sql_concern="select concern.goal_id, user.head_photo, user.user_id, user.nick_name, user.login_name from concern, user where 
              concern.follower_id='".$_SESSION['user_id']."' and concern.goal_id=user.user_id";
	$concerns_array=Travers_ResultSet($sql_concern);
	array_multisort($concerns_array);
	return $concerns_array;
}
?>
