<?php /* Smarty version Smarty-3.0.8, created on 2013-07-17 19:14:28
         compiled from "D:/xampp/htdocs/Local_Photowall/View\profile/profile_form.html" */ ?>
<?php /*%%SmartyHeaderCode:2349651e6ed142d34e9-43251150%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd214c056403309ea3359733b792ccdfe9978e763' => 
    array (
      0 => 'D:/xampp/htdocs/Local_Photowall/View\\profile/profile_form.html',
      1 => 1374088464,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2349651e6ed142d34e9-43251150',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
<head>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="../../View/resources/js/validation.js"></script>
	<script src="../../View/resources/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/bootstrap-responsive.css">
    <script type="text/javascript" src="../../View/resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../View/resources/js/bootstrap-tab.js"></script>
    <script type="text/javascript" src="../../View/resources/js/search.js"></script>
	<script>
	function check_repeat()
	{
		var nick_name=document.getElementById("nick_name").value;
		$.ajax({
                type: "POST",
                url: "check_nick_name_repeat.php",
                data: { nick_name:nick_name }
            }).done(function( msg ) {
             if(msg=="no")
             {
                var btn_obj=document.getElementById("submit_btn");
                btn_obj.disabled="";
             }
             else
             {
                alert("昵称已存在!");
                var btn_obj=document.getElementById("submit_btn");
                btn_obj.disabled="disabled";
             }
        });
	}
		$(document).ready(function(){
			$(":text").each(function(){
				$(this).val("");
			});
			$(":password").val("");
		});
	</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Photowall-个人资料</title>
<link rel="stylesheet" type="text/css" href="../../View/resources/css/profile.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <!--nav bar starts-->
        <div id="nav_bar">
            <div class="banner">
                <div id="page_name"><p>个人资料</p><br /><p>MY PROFILE</p></div>
                <img class="logo" src="../../View/resources/img/logo_login.png" width="270px" height="108px" alt="photowall" longdesc="http://www.photowall.cc">
            </div>
            <ul id="nav">
                <li><a href="../home/home.php" style="width:20px;"><i class="icon-home"></i></a></li>
                <li><a href="#">我的墙</a>
                    <ul>
                        <li><a href="../album/show_album.php">展示墙</a>
                            <!--
                                <ul>
                                    <li><a href="#">Sub-Level Item</a></li>
                                    <li><a href="#">Sub-Level Item</a>
                                        <ul>
                                            <li><a href="#">Sub-Level Item</a></li>
                                            <li><a href="#">Sub-Level Item</a></li>
                                            <li><a href="#">Sub-Level Item</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Sub-Level Item</a></li>
                                </ul>
                                </ul>-->
                        </li>
                        <li><a href="../album/paste_album.php">贴友墙</a></li>
                    </ul>
                </li>
                <li><a href="#">贴友薄</a>
                    <ul>
                        <li><a href="../relation/profile_people.php?see_what=friends">我的贴友</a></li>
                        <li><a href="../relation/profile_people.php?see_what=concerns">我的关注</a></li>
                        <li><a href="../relation/profile_people.php?see_what=fans">我的粉丝</a></li>
                    </ul>
                </li>
                <li class="current"><a href="#">个人资料</a>
                    <ul>
                        <li><a href="../profile/profile_form.php">详细资料</a></li>
                        <li><a href="#">个人头像</a></li>
                    </ul>
                </li>
                <li><a href="#">设置中心</a>
                    <ul>
                        <li><a href="#">账号</a></li>
                        <li><a href="#">安全</a></li>
                        <li><a href="#">隐私</a></li>
                        <li><a href="#">绑定</a></li>
                    </ul>
                </li>
                <li style="width:250px; height:34px;">
                   <form action="../home/search_result.php" method="get">
                <div id="search-area">
                    <input name="keyword" type="text" size="30" class="search" id="inputSearch" placeholder="搜索-贴友/粉丝/关注" />
                    <div id="divResult">
                    </div>
                    <button type="submit" class="btn btn-nav right" value="submit"><i class="icon-search"></i></button>
                </div>
                </form>
                </li>
                <li class="current">
                    <a href="http://www.photowall.cc" style="width:15px; margin-left:30px;"><i class="icon-camera icon-white"></i></a>
                </li>
            </ul>
        </div>
        <!--nav bar ends-->
    </div>
    <div class="main_content">
        <div class="profile">
        	<h3>用户详细信息 (</h3><h3 style="color:red;">&nbsp;*&nbsp;</h3><h3>为必须填写项目)</h3><br/><br/>
            <form id="profile_form" action="profile_action.php" method="post" enctype="multipart/form-data" novalidate>
            	<div class="formrow" id="f1">
                	<div class="label_box">
                    <label for="login_name">登录名：</label>
                    </div>
                        <div class="login_name">
                        	<p style="margin:0; padding:0; display:inline;"><?php echo $_smarty_tpl->getVariable('login_name')->value;?>
</p><a href="#changepwd" style="display:inline; margin:0 0 0 30px; padding:0;"><p style="display:inline-block; margin:0; padding:0;">修改密码</p></a>
                        </div>
                </div>
                
            	<div class="formrow" id="f2">
                	<div class="label_box">
                    <label for="nick_name"><font color="red">*</font>昵称：</label>
                    </div>
                        <input class="profile_box" onblur="check_repeat()" type="text" name="nick_name" id="nick_name" placeholder="贴友们所看到的昵称" required/><br/>
                </div>
            	<div class="formrow" id="f3">
                	<div class="label_box">
                    <label for="real_name">真实姓名：</label>
                    </div>
                        <input class="profile_box" type="text" name="real_name" id="real_name" placeholder=""/><br/>
                </div>
            	<div class="formrow" id="f4">
                	<div class="label_box">
                    <label for="password"><font color="red">*</font>输入密码：</label>
                    </div>
                        <input class="profile_box" type="password" name="password" id="password" placeholder="输入登陆密码" required/><br/>
                </div>
            	<div class="formrow" id="f5">
                	<div class="label_box">
                    <label for="password_confirm"><font color="red">*</font>确认密码：</label>
                    </div>
                        <input class="profile_box" type="password" name="password_confirm" id="password_confim" placeholder="再次输入密码" required/><span id="password_warn"></span><br/>
                </div>
            	<div class="formrow" id="f6">
                	<div class="label_box">
                    <label for="sex"><font color="red">*</font>性别：</label>
                    </div>
                    <div class="profile_radio">
                        <input type="radio" name="sex" value="male" style="display:block; float:left; line-height:20px; height:20px;"><p style="display:block; float:left; margin:0; padding:0;">男</p>
                        <input type="radio" name="sex" value="female" style="display:block; float:left; margin-left:20px; line-height:20px; height:20px;"><p style="display:block; float:left; margin:0; padding:0;">女</p>
                    </div>
                </div>
            	<div class="formrow" id="f7">
                	<div class="label_box">
                    <label for="sex"><font color="red">*</font>所在地：</label>
                    </div>
                        <select class="profile_box" name="province" id="province">
                            <option value="" selected="selected">省份</option>
                            <option value="beijing">北京</option>
                            <option value="shanghai">上海</option>
                            <option value="anhui">A-安徽</option>
                            <option value="aomen">澳门</option>
                            <option value="chongqing">C-重庆</option>
                            <option value="fujian">F-福建</option>
                            <option value="guangdong">G-广东</option>
                            <option value="guangxi">广西</option>
                            <option value="guizhou">贵州</option>
                            <option value="gansu">甘肃</option>
                            <option value="heilongjiang">H-黑龙江</option>
                            <option value="hebei">河北</option>
                            <option value="henan">河南</option>
                            <option value="hunan">湖南</option>
                            <option value="hubei">湖北</option>
                            <option value="hainan">海南</option>
                            <option value="jilin">J-吉林</option>
                            <option value="jiangxi">江西</option>
                            <option value="jiangsu">江苏</option>
                            <option value="liaoning">L-辽宁</option>
                            <option value="ningxia">N-宁夏</option>
                            <option value="neimenggu">内蒙古</option>
                            <option value="qinghai">Q-青海</option>
                            <option value="shandong">S-山东</option>
                            <option value="shanxi">山西</option>
                            <option value="shanxi">陕西</option>
                            <option value="sichuan">四川</option>
                            <option value="tianjin">T-天津</option>
                            <option value="taiwan">台湾</option>
                            <option value="xizang">X-西藏</option>
                            <option value="xinjiang">新疆</option>
                            <option value="xianggang">香港</option>
                            <option value="yunnan">Y-云南</option>
                            <option value="zhejiang">Z-浙江</option>
                            <option value="haiwai">海外</option>
                        </select>
                    <input class="profile_box" type="text" name="city" id="city" placeholder="城市/城区"/><br/>
                </div>
            	<div class="formrow" id="f8">
                <div class="label_box">
                 <label for="blood_type">血型：</label>
                 </div>
                    <select class="profile_box" name="blood_type" id="blood_type">
                        <option value="" selected="selected">血型</option>
                        <option value="a">A</option>
                        <option value="ab">AB</option>
                        <option value="b">B</option>
                        <option value="o">O</option>
                        <option value="other">熊猫血</option>
                     </select><br/>
                </div>
            	<div class="formrow" id="f9">
                	<div class="label_box">
                 	<label for="birthday">生日:</label>
                    </div>
                    <input class="profile_box profile_box_date" type="date" name="birthday" id="birthday" value="mm/dd/yyyy"/><br/>
                </div>
            	<div class="formrow" id="f10">
                	<div class="label_box">
                 	<label for="QQ">QQ:</label>
                    </div>
                    <input class="profile_box" type="text" name="QQ" id="QQ" placeholder="让贴友通过QQ找到你"/><br/>
                </div>
            	<div class="formrow" id="f11">
                	<div class="label_box">
                	<label for="MSN">MSN:</label>
                    </div>
                    <input class="profile_box" type="text" name="MSN" id="MSN" placeholder="让贴友通过MSN找到你"/><br/>
                </div>
            	<div class="formrow" id="f12">
                	<div class="label_box">
                 	<label for="profile">个人主页:</label>
                    </div>
                    <input class="profile_box" type="text" name="profile" id="profile" placeholder="个人主页地址/微博网址"/><br/>
                </div>
            	<div class="formrow" id="f13">
                	<div class="label_box">
                 	<label for="email">联系邮箱:</label>
                    </div>
                    <input class="profile_box" type="text" name="email" id="email"  placeholder="常用邮箱地址"/><br/>
                </div>
            	<div class="formrow" id="f14">
                	<div class="label_box">
                 	<label for="recommended_by">推荐人:</label>
                    </div>
                    <input class="profile_box" type="text" name="recommended_by" id="recommended_by" placeholder="填写推荐人的用户名"/><br/>
                </div>
            	<div class="formrow" id="f15">
                	<div class="label_box">
                 	<label for="introduction">一句话介绍:</label>
                    </div>
                    <textarea class="profile_box" type="text" name="introduction" id="introduction" >对自己简短的介绍</textarea><br/>
                </div>
            	<div class="formrow" id="f16">
                	<div class="label_box">
                 	<label for="head_photo">头像:</label>
                    </div>
                    <input type="file" name="head_photo" /><br/>
                </div>
                    <input type="hidden" value="submit_test" name="submit_test" />
                <div style="margin-left:18%; margin-right:auto;" >  
                    <button id="submit_btn" class="profile_button" type="button" value="submit" onclick="javascript:validationRegister()" ><p style="margin:0px; padding:0px; font-size:1.1em;">保存</p></button>
                </div>
            </form>
		</div>
	</div>
    <div class="footer">
    	<div class="copyright">
        	<p>Copyright© 2012-2022 Photowall Inc, All Rights Reserved.</p>
            <p>照片墙 版权所有</p>
            <a href="http://www.tangerteq.com"><p>Powered by Tanger TEQ LLC.</p></a>
        </div>
    </div>
</div>
</body>
</html>