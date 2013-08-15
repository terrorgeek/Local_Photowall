<?php //this function is to return each person's concern, fans and friends
function Get_Fans_Concerns_Friends($user_id)
{
	$sql_concern="select concern.goal_id, user.head_photo, user.user_id, user.nick_name, user.login_name from concern, user where 
              concern.follower_id='".$user_id."' and concern.goal_id=user.user_id";
	$sql_fans="select concern.follower_id, user.head_photo, user.user_id, user.nick_name, user.login_name from concern, user where
              concern.goal_id='".$user_id."' and concern.follower_id=user.user_id";
	$sql_friend1="select friends.reviewer_id, user.head_photo, user.user_id, user.nick_name, user.login_name from friends,user where
              friends.applicant_id='".$user_id."' and friends.reviewer_id=user.user_id";
    $sql_friend2="select friends.applicant_id, user.head_photo, user.user_id, user.nick_name, user.login_name from user,friends where
              friends.reviewer_id='".$user_id."' and friends.applicant_id=user.user_id";
	$concern_count=mysql_num_rows(mysql_query($sql_concern));
	$fans_count=mysql_num_rows(mysql_query($sql_fans));
	$friends_count=mysql_num_rows(mysql_query($sql_friend1))+mysql_num_rows(mysql_query($sql_friend2));
	$result=$concern_count.",".$fans_count.",".$friends_count;
	return explode(",", $result);
}
function get_all_friends_id_by_an_id($user_id)//any user_id that you want
{
    $sql="SELECT reviewer_id FROM friends where applicant_id=".$user_id." union 
 SELECT applicant_id FROM friends where reviewer_id=".$user_id;
    $query=mysql_query($sql);
    $result=array();
    while($out=mysql_fetch_array($query))
    	array_push($result,$out["reviewer_id"]);
    return $result;
}
function get_all_concerns_id_by_an_id($user_id)
{
	$sql_concerns="select goal_id from concern where follower_id='".$user_id."'";
    $query_concern=mysql_query($sql_concerns);
    $result=array();
    while($out=mysql_fetch_array($query_concern))
        array_push($result,$out["goal_id"]);
    return $result;
}
function get_all_fans_id_by_an_id($user_id)
{
	$sql_fans="select follower_id from concern where goal_id='".$user_id."'";
	$query_fans=mysql_query($sql_fans);
	$result=array();
	while($out=mysql_fetch_array($query_fans))
		array_push($result,$out["follower_id"]);
	return $result;
}
function decide_identity($user_id)//return a string indicate the identity of this third-person, the only param is third-person's id
{
	$identity="";
	$concern=get_all_concerns_id_by_an_id($_SESSION["user_id"]);
	$fan=get_all_fans_id_by_an_id($_SESSION["user_id"]);
	$friend=get_all_friends_id_by_an_id($_SESSION["user_id"]);
	if(in_array($user_id, $concern))
	    $identity="concern";
	else if(in_array($user_id, $fan))
	    $identity="fan";
	else
		$identity="friend";
	return $identity;
}
function Get_Friends_For_At()
{
	//load all of friends to put them in the text so that the autocomplete textbox can read it!
    $sql_friend1="select friends.reviewer_id, user.head_photo, user.user_id, user.nick_name, user.login_name from friends,user where
              friends.applicant_id='".$_SESSION['user_id']."' and friends.reviewer_id=user.user_id";
    $sql_friend2="select friends.applicant_id, user.head_photo, user.user_id, user.nick_name, user.login_name from user,friends where
              friends.reviewer_id='".$_SESSION['user_id']."' and friends.applicant_id=user.user_id";
    $result_array=array();
    $query1=mysql_query($sql_friend1);
    $query2=mysql_query($sql_friend2);
    $index_mention=0;
    $path="../Project_Images/head_photo/";
    while($out=mysql_fetch_array($query1))
    {
	    $temp=array("name"=>$out["nick_name"],"user_id"=>$out["reviewer_id"],"image"=>$path.$out['reviewer_id']."_".$out["head_photo"]);
	    $result_array[$index_mention]=$temp;
	    $index_mention++;
    }
    while($out=mysql_fetch_array($query2))
    {
	    $temp=array("name"=>$out["nick_name"],"user_id"=>$out["applicant_id"],"image"=>$path.$out['applicant_id']."_".$out["head_photo"]);
	    $result_array[$index_mention]=$temp;
	    $index_mention++;
    }
    return json_encode($result_array);
}
?>