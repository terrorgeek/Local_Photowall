<?php session_start();
require_once('../../connector.ini.php');
//����Ҫ�ȴ���һ��,����Ѿ���д����ϸ��Ϣ, ����ת����ϸ��Ϣҳ��
//ֻ����Ա�Ϳ�����
function check_details_info($user_id)
{
    $sql_check="select sex from user where user_id='".$user_id."'";
    if(@mysql_num_rows(mysql_query($sql_check))>0)
    {
	    echo "<script>window.location.href='../relation/profile_people.php?see_what=friends';</script>";
	    exit;
    }
}
        
//ÿ�ε�¼ǰҪ�鿴һ��remember_me�����Ƿ��б��,�оͲ��õ�½,ֱ��ת����ҳ
function check_remember_me($login_name)
{
	$sql_check_remember_me="select login_name,user_id,nick_name from remember_user where login_name='".$login_name."'";
	$query=mysql_query($sql_check_remember_me);
	if(mysql_num_rows($query)>0)
	{
		$result=mysql_fetch_array($query);
		$_SESSION["user_id"]=$result["user_id"];
	    $_SESSION["login_name"]=$result["login_name"];
	    $_SESSION["nick_name"]=$result["nick_name"];
	    check_details_info($result["user_id"]);
		echo "<script>window.location.href='../profile/profile_form.php';</script>";
	}
	exit;
}
@setcookie("login_name",null, time());
if($_COOKIE["login_name"]!="")
{
	check_remember_me($_COOKIE["login_name"]);
}
$smarty->display("login/login_form.html");
?>