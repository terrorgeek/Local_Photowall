<?php /* Smarty version Smarty-3.0.8, created on 2013-07-10 21:22:09
         compiled from "D:/xampp/htdocs/Local_Photowall/View\relation/friend_main.html" */ ?>
<?php /*%%SmartyHeaderCode:2815251ddd0811b6642-41318496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9b2e1e347cbea92c22ba70ab7624566358678a8' => 
    array (
      0 => 'D:/xampp/htdocs/Local_Photowall/View\\relation/friend_main.html',
      1 => 1373463319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2815251ddd0811b6642-41318496',
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
	<script type="text/javascript" src="../../View/resources/js/search.js"></script>
	<script>
		$(document).ready(function(){
			$(":text").each(function(){
				$(this).val("");
			});
			$(":password").val("");
		});
	</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Photowall-贴友薄</title>
<link rel="stylesheet" type="text/css" href="../../View/resources/css/follow.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <!--nav bar starts-->
        <div id="nav_bar">
            <div class="banner">
            	<div id="page_name"><p>贴友薄</p><p>FRIENDS NOTE</p></div>
            	<img class="logo" src="../../View/resources/img/logo_login.png" width="270px" height="108px" alt="photowall" longdesc="http://www.photowall.cc">
            </div>
        <ul id="nav">
            <li><a href="../home/home.php" style="width:20px;"><img src="../../View/resources/img/nav_home.png" width="16" height="16" alt="主页" style="padding:0; margin:0;border:none;"></a></li>
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
            <li class="current"><a href="profile_people.php?see_what=null">贴友薄</a>
                <ul>
                    <li><a href="profile_people.php?see_what=friends">我的贴友</a></li>
                    <li><a href="profile_people.php?see_what=concerns">我的关注</a></li>
                    <li><a href="profile_people.php?see_what=fans">我的粉丝</a></li>
                </ul>
            </li>
            <li><a href="#">个人资料</a>
                <ul>
                    <li><a href="#">详细资料</a></li>
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
            <li>
                 <img src="../../View/resources/img/nav_split.png" width="10" height="34" alt="split" style="margin-left:10px; opacity:0.7;">
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
        </ul>
        </div>
       <!--nav bar ends-->
    </div>
    <div class="main_content">
    	<div class="inner_content">
            <h3>贴友薄</h3>
            <p class="indent">贴友簿是您的好友列表，这里按照您和好友的关系，分为“我的关注”、“我的粉丝”以及“我的贴友”三类。您可以在这三个分类里找到好友，进行访问或删除。</p>
            <br />
            <br />
            <br />
            <h3>我的关注</h3>
            <p class="indent">“我的关注”是您单方面关注的好友，您可以查看TA的照片展示墙；但没有权限编辑您的照片贴给TA。</p>
            <p class="note indent">而您作为某用户的粉丝，该用户可以浏览您的照片展示墙，也有权限将编辑的照片贴给您。</p>
            <p class="note indent">若您在“我的关注“里删除某用户，您的主页上则不会再提示该用户的照片更新信息。</p>
            <br />
            <br />
            <h3>我的粉丝</h3>
            <p class="indent">“我的粉丝”是单方面关注您的好友，您可以查看TA的照片展示墙；也可以编辑您的照片贴给TA。</p>
            <p class="note indent">而作为您的粉丝，只能浏览您的照片展示墙，而没有权限将编辑的照片贴给您。</p>
            <p class="note indent">（若您在“我的粉丝“里删除某用户，该用户的主页上则不会再提示您的照片更新信息；该用户也不能再查看您的照片展示墙。）</p>
            <br />
            <br />
            <h3>我的贴友</h3>
            <p class="indent">“我的贴友”是您和某用户双方相互关注，成为彼此的粉丝，您可以查看TA的照片展示墙；也可以编辑您的照片贴给TA。</p>
            <p class="note indent">而作为您的粉丝，只能浏览您的照片展示墙，而没有权限将编辑的照片贴给您。</p>
            <p class="note indent">（若您在”我的贴友“里删除某用户，视为您单方面解除对该用户的关注。该用户将出现在”我的粉丝“分类中；而您也将出现在该用户的”我的关注“分类中。）</p>
		</div><!--inner_content-->
	</div><!--main_content ends-->
    <div class="footer">
    	<div class="copyright">
        	<p>Copyright© 2012-2022 Photowall Inc, All Rights Reserved.</p>
            <p>照片墙 版权所有</p>
            <a href="http://www.tangerteq.com"><p>Powered by Tanger TEQ LLC.</p></a>
        </div>
    </div><!--footer ends-->
</div>
</body>
</html>