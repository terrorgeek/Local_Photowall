<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
require_once 'friends_info_page.php';//���ҳ����������ʾ ��ע  ��˿ ���ѵ�  
require_once 'load_all_friends.php';////����ļ���ר����������ݿ���������к���id��д��txt�ļ���
require_once 'friends_recommendations.php';//�����ר���������������Ƽ����ѵ�
function Check_Vertical_Line($multi_photo_name)
{
	if(stripos($multi_photo_name, "|")==False)
	   return $multi_photo_name;
	else
		return substr($multi_photo_name, 0,stripos($multi_photo_name, "|"));
}
$smarty->assign("concern",$concern);
$smarty->assign("head_photo_big_thumbnail",$head_photo_big_thumbnail);
$smarty->assign("fans",$fans);
$smarty->assign("friends",$friends);
$smarty->assign("location",$location);

if($_SESSION["nick_name"]!="")
    $smarty->assign("nick_name",$_SESSION["nick_name"]);
else
	$smarty->assign("nick_name",$_SESSION["login_name"]);
$smarty->assign("recommendation_friends",$recommendation_friends);
//load all your own albums
$sql_album="select album_id, album_name from album where user_id=".$user_id;
$query_album=mysql_query($sql_album);
$album_html="";
if(mysql_num_rows($query_album)==0)
	$album_html.="<option>您现在还没有相册!</option>";
else
{
	$album_html.="<option>请选择相册</option>";
	while($out=mysql_fetch_array($query_album))
	{
		$album_html.="<option value='".$out['album_id']."'>".$out["album_name"]."</option>";
	}
}
//load all of friends to put them in the text so that the autocomplete textbox can read it!
$sql_friend1="select friends.reviewer_id, user.head_photo, user.user_id, user.nick_name, user.login_name from friends,user where
              friends.applicant_id='".$_SESSION['user_id']."' and friends.reviewer_id=user.user_id";
$sql_friend2="select friends.applicant_id, user.head_photo, user.user_id, user.nick_name, user.login_name from user,friends where
              friends.reviewer_id='".$_SESSION['user_id']."' and friends.applicant_id=user.user_id";
$result_array=array();
//this is to store friends and concerns id so that it can be used to load the photowall_movement new info
$my_friends_and_concern_id=array();
$only_friends_id=array();
$only_my_concerns_id=array();
$query1=mysql_query($sql_friend1);
$query2=mysql_query($sql_friend2);
$index_mention=0;
$path="../Project_Images/head_photo/";
while($out=mysql_fetch_array($query1))
{
	$temp=array("name"=>$out["nick_name"],"user_id"=>$out["reviewer_id"],"image"=>$path.$out['reviewer_id']."_".$out["head_photo"]);
	$result_array[$index_mention]=$temp;
	$my_friends_and_concern_id[$index_mention]=$out["reviewer_id"];
	$only_friends_id[$index_mention]=$out["reviewer_id"];
	$index_mention++;
}
while($out=mysql_fetch_array($query2))
{
	$temp=array("name"=>$out["nick_name"],"user_id"=>$out["applicant_id"],"image"=>$path.$out['applicant_id']."_".$out["head_photo"]);
	$result_array[$index_mention]=$temp;
	$my_friends_and_concern_id[$index_mention]=$out["applicant_id"];
	$only_friends_id[$index_mention]=$out["applicant_id"];
	$index_mention++;
}

//photowall_movement includes my concern's and my friends' new info, so I need to get all my concerns besides friends
//first I need to load all my concerns
$sql_concerns="select goal_id from concern where follower_id='".$_SESSION['user_id']."'";
$query_concern=mysql_query($sql_concerns);
while($out=mysql_fetch_array($query_concern))
{
	$my_friends_and_concern_id[$index_mention]=$out["goal_id"];
	array_push($only_my_concerns_id,$out["goal_id"]);
	$index_mention++;
}

//this is to load all of the news in photowall_movement
$sql_photowall_news="select user_id, nick_name, date, one_of_photo_path,photo_uploaded_amount, all_photo_id from photowall_movement where 
                     user_id IN (";
for ($i=0; $i <count($my_friends_and_concern_id); $i++)
	$sql_photowall_news.=$my_friends_and_concern_id[$i].",";
if(count($my_friends_and_concern_id)>0)
    $sql_photowall_news=substr($sql_photowall_news, 0,strlen($sql_photowall_news)-1).")";
else 
    $sql_photowall_news.="0)";
$sql_photowall_news.=" ORDER BY date DESC";
//start to execute query
$query_photowall_movement=mysql_query($sql_photowall_news);
$result_photowall_movement=array();$index_ptw_movement=0;
while($out=mysql_fetch_array($query_photowall_movement))
{
	if(in_array($out["user_id"], $only_friends_id))
	{
		$temp=array("nick_name"=>$out["nick_name"],"date"=>$out["date"],"one_of_photo_path"=>"../Project_Images/photos/".Check_Vertical_Line($out["one_of_photo_path"]),
	            "photo_uploaded_amount"=>$out["photo_uploaded_amount"],"all_photo_id"=>$out["all_photo_id"],
	            "all_photo_names"=>$out["one_of_photo_path"],"can_comment"=>"yes");
	}
	else if(in_array($out["user_id"], $only_my_concerns_id))
	{
		$temp=array("nick_name"=>$out["nick_name"],"date"=>$out["date"],"one_of_photo_path"=>"../Project_Images/photos/".Check_Vertical_Line($out["one_of_photo_path"]),
	            "photo_uploaded_amount"=>$out["photo_uploaded_amount"],"all_photo_id"=>$out["all_photo_id"],
	            "all_photo_names"=>$out["one_of_photo_path"],"can_comment"=>"no");
	}
	$result_photowall_movement[$index_ptw_movement]=$temp;
	$index_ptw_movement++;
}



//--------------------------------------------------------------------------------------------
//this is to load all of the news in friends_movement
$sql_friends_news="select marker_user_id,marker_nick_name,be_marked_user_id,photo_path,date,photo_uploaded_amount, all_photo_id from friends_movement 
                   where marker_user_id 
                   IN (";
for ($i=0; $i <count($only_friends_id) ; $i++)  
	$sql_friends_news.=$only_friends_id[$i].",";
if(count($only_friends_id)>0)
   $sql_friends_news=substr($sql_friends_news, 0,strlen($sql_friends_news)-1);  
else
   $sql_friends_news.="0";
//now add the concerns and check the "show_to_fans" column
$sql_friends_news.=") OR (marker_user_id IN ("; 
for ($i=0; $i <count($only_my_concerns_id) ; $i++)
	$sql_friends_news.=$only_my_concerns_id[$i].",";
if(count($only_my_concerns_id)>0)
   $sql_friends_news=substr($sql_friends_news, 0,strlen($sql_friends_news)-1);
else 
   $sql_friends_news.="0";
   
$sql_friends_news.=") and show_to_fans='yes') OR marker_user_id=".$_SESSION['user_id']." ORDER BY date DESC";
$result_friend_movement=array();
//die($sql_friends_news);
$query_friends_movement=mysql_query($sql_friends_news);$index_friends_movement=0;
while($out=mysql_fetch_array($query_friends_movement))
{
	$single_line_of_ids=explode(",", $out["be_marked_user_id"]);//return an array
	if(in_array($_SESSION["user_id"], $single_line_of_ids))
	{
	   $temp=array("marker_nick_name"=>$out["marker_nick_name"],"be_marked_user_id"=>$out["be_marked_user_id"],
	               "photo_path"=>"../Project_Images/photos/".Check_Vertical_Line($out["photo_path"]),
	               "date"=>$out["date"],"photo_uploaded_amount"=>$out["photo_uploaded_amount"],"all_photo_id"=>$out["all_photo_id"],
	               "all_photo_names"=>$out["photo_path"],"can_comment"=>"yes");
	   $result_friend_movement[$index_friends_movement]=$temp;
	   $index_friends_movement++;
	}
	else if(in_array($out["marker_user_id"], $only_my_concerns_id))
	{
		$temp=array("marker_nick_name"=>$out["marker_nick_name"],"be_marked_user_id"=>$out["be_marked_user_id"],
	               "photo_path"=>"../Project_Images/photos/".Check_Vertical_Line($out["photo_path"]),
	               "date"=>$out["date"],"photo_uploaded_amount"=>$out["photo_uploaded_amount"],"all_photo_id"=>$out["all_photo_id"],
	               "all_photo_names"=>$out["photo_path"],"can_comment"=>"no");
	   $result_friend_movement[$index_friends_movement]=$temp;
	   $index_friends_movement++;
	}
    else if($_SESSION["user_id"]==$out["marker_user_id"])
    {
    	$temp=array("marker_nick_name"=>$out["marker_nick_name"],"be_marked_user_id"=>$out["be_marked_user_id"],
	               "photo_path"=>"../Project_Images/photos/".Check_Vertical_Line($out["photo_path"]),
	               "date"=>$out["date"],"photo_uploaded_amount"=>$out["photo_uploaded_amount"],"all_photo_id"=>$out["all_photo_id"],
	               "all_photo_names"=>$out["photo_path"],"can_comment"=>"yes");
	    $result_friend_movement[$index_friends_movement]=$temp;
	    $index_friends_movement++;
    }
}


$array_new_added_fans=get_all_new_added_fans_id($_SESSION["user_id"]);
$added_fans_display="";
$fans_id_count=count($array_new_added_fans);
//echo $fans_id_count;
if($fans_id_count==0)
    $added_fans_display="";
else
{
	$id_string=iconv("gb2312", "utf-8",implode(',', $array_new_added_fans));
	$added_fans_display="<a onclick='to_fans(".$id_string.")' href='#'>您有".$fans_id_count."个新粉丝!</a>";
}

$array_new_added_friends=get_all_new_added_friends_id($_SESSION["user_id"]);
$added_friends_display="";
$friends_id_count=count($array_new_added_friends);
if($friends_id_count==0)
    $added_friends_display="";
else
{
	$id_friends_string=iconv("gb2312", "utf-8",implode(",", $array_new_added_friends));
	$added_friends_display="<a onclick='to_friends(".$id_friends_string.")' href='#'>您有".$friends_id_count."个新贴友!</a>";
}
$smarty->assign("new_added_fans",$added_fans_display);
$smarty->assign("new_added_friends",$added_friends_display);
$smarty->assign("result_photowall_movement",$result_photowall_movement);
$smarty->assign("result_friend_movement",$result_friend_movement);
$smarty->assign("index_friends_movement",$index_friends_movement);
$smarty->assign("index_ptw_movement",$index_ptw_movement);
$smarty->assign("users",json_encode($result_array));
$smarty->assign("album_html",$album_html);
$smarty->display("home/home.html");

