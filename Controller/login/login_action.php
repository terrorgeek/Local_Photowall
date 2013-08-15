<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
//这里要先处理一下,如果已经添写过详细信息, 则不跳转到详细信息页面
//只需查性别就可以了
function check_details_info($user_id)
{
    $sql_check="select sex from user where user_id='".$user_id."'";
    $query=mysql_query($sql_check);
    if(@mysql_num_rows($query)>0)
    {
	  //  echo "<script>window.location.href='../relation/profile_people.php?see_what=friends';</script>";
	  echo "<script>window.location.href='../home/home.php';</script>";
	    exit;
    }
}
function remember_me($login_name,$user_id,$nick_name)
{
	setcookie("login_name",$login_name, time()+3600*24*7);
	$sql_insert_remember="insert into remember_user (user_id,login_name,nick_name,remember_for_days,remember_date) values 
	                     ('".$user_id."','".$login_name."','".$nick_name."','7','".date("Y-m-d h:m:s")."')";
	mysql_query($sql_insert_remember);
}
function login_semi_success($query,$password)
{
	$result=mysql_fetch_array($query);
	if($result["password"]!=$password)
	{
	    login_failed();
	    exit;
	}
	//echo "<script>alert('登录成功');</script>";
	if(isset($_POST["remember_me"])&&$_POST["remember_me"]=="remember_me")
	{
		//这时候用户要记住登陆状态
		remember_me($result["login_name"],$result["user_id"],$result["nick_name"]);
	}
	$_SESSION["user_id"]=$result["user_id"];
	$_SESSION["login_name"]=$result["login_name"];
	$_SESSION["nick_name"]=$result["nick_name"];
	check_details_info($result["user_id"]);
	echo "<script>window.location.href='../profile/profile_form.php';</script>";
}
function login_failed()
{
	echo "<script>alert('登录失败');</script>";
	echo "<script>history.go(-1);</script>";
}
if(isset($_POST["submit_test"])&&$_POST["submit_test"]!="")
{
	$login_name=strip_tags($_POST["login_name"]);
	$password=strip_tags($_POST["password"]);
	if(preg_match("/\'\"/", $login_name)||preg_match("/\'\"/", $password))
	{
		echo "<script>alert('请输入合法参数!');</script>";
	}
	$login_name=filter_string($login_name);
	$password=md5(filter_string($password));
	//先查用户名，再查密码
	$sql_login="select user_id,login_name,nick_name,password from user where login_name='".$login_name."'";
	$query=mysql_query($sql_login);
	//开始匹配密码
	if(mysql_num_rows($query)>0)
	{
		login_semi_success($query,$password);
	}
	else 
	{
		login_failed();
	}
}
?>