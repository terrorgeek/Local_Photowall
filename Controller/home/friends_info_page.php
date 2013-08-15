<?php session_start();
//���ҳ����������ʾ ��ע  ��˿ ���ѵ�  
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
require_once('../../Controller/Image_Handle/Generate_Thumbnail.php');
//����ǽ��̬, ������ʾ�������ѵ��·�������Ƭ
$personal_info=Find_Myself();
$concern=$personal_info["concern"]["concern_count"];
$fans=$personal_info["fans"]["fans_count"];
$friends=$personal_info["friends"]["friends_count"];
$location=$personal_info["province"].",".$personal_info["city"];
$head_photo_big_thumbnail="../Project_Images/head_photo_big_thumbnail/".$personal_info["user_id"]."_".$personal_info["head_photo_big_thumbnail"];
//�Ȱ��Լ�����Ϣ��ʾ����
function Find_Myself()
{
	$sql_find_myself="select user_id, login_name, province, head_photo_big_thumbnail, city from user where user_id='".$_SESSION['user_id']."'";
	$query=mysql_query($sql_find_myself);
	$myself=mysql_fetch_array($query);
	$my_info=array("user_id"=>$myself["user_id"],"login_name"=>$myself["login_name"],"head_photo_big_thumbnail"=>$myself["head_photo_big_thumbnail"],
	               "province"=>$myself["province"],"city"=>$myself["city"],"concern"=>Find_My_Concern(),"fans"=>Find_My_Fans(),
	               "friends"=>Find_My_Friends());
	return $my_info;
}
function Find_My_Concern()
{
	$sql_concern="select concern.goal_id, user.head_photo, user.user_id, user.nick_name, user.login_name from concern, user where 
              concern.follower_id='".$_SESSION['user_id']."' and concern.goal_id=user.user_id";
    //����ʱ�Ѽ�¼��ͽ��װ��һ�������ﷵ��,�����ٲ�һ����ݿ�
    $query=mysql_query($sql_concern);
    $count=mysql_num_rows($query);
    $result=array("concern_count"=>$count,"ResultSet"=>$query);
    return $result;
}
function Find_My_Fans()
{
	$sql_fans="select concern.follower_id, user.head_photo, user.user_id, user.nick_name, user.login_name from concern, user where
              concern.goal_id='".$_SESSION['user_id']."' and concern.follower_id=user.user_id";
	//����ʱ�Ѽ�¼��ͽ��װ��һ�������ﷵ��,�����ٲ�һ����ݿ�
    $query=mysql_query($sql_fans);
    $count=mysql_num_rows($query);
    $result=array("fans_count"=>$count,"ResultSet"=>$query);
    return $result;
}
function Find_My_Friends()
{
	$sql_friend1="select friends.reviewer_id, user.head_photo, user.user_id, user.nick_name, user.login_name from friends,user where
              friends.applicant_id='".$_SESSION['user_id']."' and friends.reviewer_id=user.user_id";
    $sql_friend2="select friends.applicant_id, user.head_photo, user.user_id, user.nick_name, user.login_name from user,friends where
              friends.reviewer_id='".$_SESSION['user_id']."' and friends.applicant_id=user.user_id";
    $sql=$sql_friend1." UNION ".$sql_friend2;
    $query1=mysql_query($sql_friend1);
    $query2=mysql_query($sql_friend2);
    $count=mysql_num_rows($query1)+mysql_num_rows($query2);
    //�������������ѽ��
    $result=array("friends_count"=>$count,"ResultSet1"=>$query1,"ResultSet"=>$query2);
    return $result;
}

//because find new fans is only used in home.php, so temporarly write in here
function find_new_added_fans($user_id)//param can be any user_id
{
	$sql_find_new_fans="select follower_id, goal_id from concern where goal_id=".$user_id." and is_disposed='no'";
	$q=mysql_query($sql_find_new_fans);
	return $q;
}
function get_all_new_added_fans_id($user_id)
{
	$q=find_new_added_fans($user_id);
	$result=array();
	while($out=mysql_fetch_array($q))
		array_push($result,$out["follower_id"]);
    return $result;
}
//because find new fans is only used in home.php, so temporarly write in here
function find_new_added_friends($user_id)//param can be any user_id
{
	$sql="SELECT applicant_id FROM friends where reviewer_id=".$user_id." and is_disposed='no'";
    $query=mysql_query($sql);
	return $query;
}
function get_all_new_added_friends_id($user_id)
{
	$q=find_new_added_friends($user_id);
	$result=array();
    while($out=mysql_fetch_array($q))
    	array_push($result,$out["applicant_id"]);
    return $result;
}

