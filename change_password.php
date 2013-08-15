<?php
$old_password=$_POST["old_password"];
$new_password=$_POST["new_password"];
$confirm=$_POST["password_confirm"];
function change_password($old_password,$new_password,$confirm)
{
    $sql_check_old_password="select user_id,password from user where user_id='".$_SESSION['user_id']."' and password='".md5($old_password)."'";
    $query_check_old_pass=mysql_query($sql_check_old_password);
    if(mysql_num_rows($query_check_old_pass)==0)
    {
	    echo "密码错误";
	    exit;
    }
    else
    {
	    //这时才可以改
	    if($new_password==$confirm)
	    {
		    $sql_update_password="update user set password='".md5($new_password)."' where user_id='".$_SESSION['user_id']."'";
		    $query=mysql_query($sql_update_password);
		    if($query)
		       echo "修改成功!";
		    else
		       echo "修改失败!";
	    }
	    else
	    {
		    echo "两次密码输入不一致!";
	    }
    }
}
change_password($old_password,$new_password,$confirm);