<?php /* Smarty version Smarty-3.0.8, created on 2013-07-07 13:49:39
         compiled from "D:/xampp/htdocs/Local_Photowall/View\register/register_success_page.html" */ ?>
<?php /*%%SmartyHeaderCode:2440151d971f33120a4-24195389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f132ff318d8ada11a22cd084cd7c7a5a2fb5e09f' => 
    array (
      0 => 'D:/xampp/htdocs/Local_Photowall/View\\register/register_success_page.html',
      1 => 1367542941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2440151d971f33120a4-24195389',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script>
function to_main()
{
	window.location.href="../profile/profile_form.php";
}
</script>

<script type="text/javascript" src="../../View/resources/js/jquery.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Photowall-注册成功</title>
<link rel="stylesheet" type="text/css" href="../../View/resources/css/register.css">

</head>
<body>
<div class="wrapper">
<div class="main_content">
	<div id="banner">
    <img src="../../View/resources/img/logo_login.png" width="311" height="126" alt="photowall" longdesc="http://www.photowall.cc" style="margin-left:auto; margin-right:auto;">
    </div>
  <div class="register_success">
  	<p style="color:white;">注册成功，恭喜您已成为Photowall&nbsp;照片墙的会员！</p>
	<button class="register_button" type="submit" value="开始体验" style="margin-right:10px;" onclick="to_main()"><p style="margin:0px; padding:0px; font-size:1.1em;">开始体验</p></button>  </div>	
</div>
  <div class="footer">
    	<div class="copyright">
        	<p>Copyright© 2012-2022 Photowall Inc, All Rights Reserved.</p>
            <p>照片墙 版权所有</p>
            <a href="http://www.tangerteq.com" style="text-decoration:none;"><p>Powered by Tanger TEQ LLC.</p></a>
        </div>
    </div>
</div>
</body>
</html>