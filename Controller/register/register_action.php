<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
require_once('../../Controller/Libs/PinYin.php');
if(isset($_POST["submit_test"])&&$_POST["submit_test"]=="yes"&&isset($_POST["agree"])&&$_POST["agree"]=="yes")
{
	$pattern_email="/^[a-zA-Z0-9]+[\.]*[a-zA-Z0-9]+@[a-zA-Z0-9]+[\.]+[a-zA-Z0-9]+/";
	$login_name=filter_string(strip_tags($_POST["login_name"]));
	$confirm=filter_string(strip_tags($_POST["confirm"]));
	if($login_name!=$confirm)
	{
	   echo "<script>alert('两次输入账号不一样');</script>";
	   echo "<script>history.go(-1);</script>";
	   exit;
	}
	$real_name=filter_string(strip_tags($_POST["real_name"]));
	$password=filter_string(strip_tags($_POST["password"]));
	$password_confirm=filter_string(strip_tags($_POST["password_confirm"]));
	if($password!=$password_confirm)
	{
	   echo "<script>alert('两次输入密码不一样');</script>";
	   echo "<script>history.go(-1);</script>";
	   exit;
	}
	$email=filter_string(strip_tags($_POST["email"]));
	if(!preg_match($pattern_email, $email))
	{
		echo "<script>alert('邮箱输入有误!');</script>";
	    echo "<script>history.go(-1);</script>";
	    exit;
	}
	$recommended_by=filter_string(strip_tags($_POST["recommended_by"]));
	//$chinese_pinyin=Pinyin($_POST["nick_name"]);
	$sql_register="insert into user (login_name, real_name, password, email, recommended_by, nick_name, province, city, sex) values 
	               ('".$login_name."','".$real_name."','".md5($password)."','".$email."','".$recommended_by."','','','','')";
	$query=mysql_query($sql_register);
	if($query)
	{
		$_SESSION["user_id"]=mysql_insert_id();
		$_SESSION["login_name"]=$login_name;
		$fp=fopen("../Friends_Text_Files/".$_SESSION["user_id"].".txt", "a+");
		fclose($fp);
		echo "<script>alert('register success!');</script>";
		echo "<script>window.location.href='register_success_page.php';</script>";
	}
	else
	{
		echo "<script>alert('register failed!');</script>";
		echo "<script>history.go(-1);</script>";
	}
}
else
{
	echo "<script>alert('您必须同意协意');</script>";
		echo "<script>history.go(-1);</script>";
}
?>