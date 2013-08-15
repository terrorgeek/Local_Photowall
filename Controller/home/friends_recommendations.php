<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
$user_id=$_SESSION["user_id"];
$filename=$user_id.".txt";
$my_fp=@fopen($filename, "r");
$my_content=@fread($my_fp, filesize($filename));
$my_friends_array=split(",", $my_content);
$semi_friends_array=array();
for ($i = 0; $i < count($my_friends_array); $i++) {
	$temp_array=read_friends_from_file($my_friends_array[$i].".txt");
	if(count($temp_array)>0)
	{
	    for ($j = 0; $j < count($temp_array); $j++) {
	    	if($temp_array[$j]!=$user_id)//加朋友的朋友时防止把自己加上
		        array_push($semi_friends_array, $temp_array[$j]);
	    }
	}
}
//过滤一下$semi_friends_array, 因为其可能包含我的好友
$filter_array=array();
for ($i = 0; $i < count($semi_friends_array); $i++) {
	if(!in_array($semi_friends_array[$i], $my_friends_array))
		$filter_array[$i]=$semi_friends_array[$i];
}
$semi_friends_array=array_unique($filter_array);
$temp=$semi_friends_array;
$index=0;
$semi_friends_array=array();
foreach ($temp as $value) {
	$semi_friends_array[$index]=$value;
	$index++;
}

//print_r($semi_friends_array);

$result=array();//存最后结果,健为user_id, 值为共同好友数
for ($i = 0; $i < count($semi_friends_array); $i++) {
	$common_friends_num=0;
	$temp_array=read_friends_from_file($semi_friends_array[$i].".txt");
    if(count($temp_array)>0)
    {
    	for ($j = 0; $j < count($temp_array); $j++) {
    		if(in_array($temp_array[$j], $my_friends_array)&&$temp_array[$j]!=$user_id)
    			$common_friends_num++;
    	}
        $result[$semi_friends_array[$i]]=$common_friends_num;
    }
}
arsort($result);

//print_r($result);//result就是答案, 健名是被推荐的人的user_id, 值是共同好友数

//print_r(array_unique($semi_friends_array));
$sql_find_concern="select goal_id from concern where follower_id=".$_SESSION["user_id"];
$query=mysql_query($sql_find_concern);
$concern_array=array();
$index=0;
while($out=@mysql_fetch_array($query))
{
	$concern_array[$index]=$out["goal_id"];
	$index++;
}
$concern_array=array(15,11);
//result还没算完, 必须过滤掉已经被我关注过的
$final_result=array();
$index=0;
foreach ($result as $key => $value) {
    if(!in_array($key, $concern_array))
		$final_result[$key]=$value;
}

//print_r($final_result);

function read_friends_from_file($filename)//返回的是数组,里边是这个人的朋友
{
	$fp=@fopen($filename, "r");
	if(@filesize($filename)==0)
	    return null;
	$content=fread($fp, filesize($filename));
	fclose($fp);
	$array=split(",", $content);
	return $array;
}
//以下开始操纵数据库
$sql="select user_id, nick_name,login_name, province, city, head_photo_small_thumbnail from user where user_id IN ( ";
foreach ($final_result as $key => $value) {
	$sql.=$key.",";
}
$sql=substr($sql,0,strlen($sql)-1);
$sql.=")";
$query=mysql_query($sql);
$recommendation_friends=array();
$index=0;
while($out=@mysql_fetch_array($query))
{
	$temp=array("user_id"=>$out["user_id"],"nick_name"=>$out["nick_name"],
	"head_photo"=>"../Project_Images/head_photo_small_thumbnail/".$out["user_id"]."_".$out["head_photo_small_thumbnail"],
	            "login_name"=>$out["login_name"],"province"=>$out["province"],
	            "city"=>$out["ciry"],"common_friends_num"=>$final_result[$out["user_id"]]);
	$recommendation_friends[$index]=$temp;$index++;
}
?>