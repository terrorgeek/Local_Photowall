<?php /* Smarty version Smarty-3.0.8, created on 2013-07-07 18:23:23
         compiled from "D:/xampp/htdocs/Local_Photowall/View\album/paste_album.html" */ ?>
<?php /*%%SmartyHeaderCode:1204551d9b21b265427-64144532%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec3cd6862eb694004471310d3f7ac24125792ef9' => 
    array (
      0 => 'D:/xampp/htdocs/Local_Photowall/View\\album/paste_album.html',
      1 => 1373220905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1204551d9b21b265427-64144532',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
	<script>
		$(document).ready(function(){
			$(":text").each(function(){
				$(this).val("");
			});
			$(":password").val("");
		});
	</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Photowall-我的贴友墙</title>
<script type="text/javascript" src="../../View/resources/js/search.js"></script>
<link rel="stylesheet" type="text/css" href="../../View/resources/css/follow.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <!--nav bar starts-->
        <div id="nav_bar">
            <div class="banner">
                <div id="page_name"><p>我的贴友墙</p><br /><p>PASTE WALL</p></div>
                <img class="logo" src="../../View/resources/img/logo_login.png" width="270px" height="108px" alt="photowall" longdesc="http://www.photowall.cc">
            </div>
            <ul id="nav">
                <li><a href="../home/home.php" style="width:20px;"><i class="icon-home"></i></a></li>
                <li class="current"><a href="../album/show_album.php">我的墙</a>
                    <ul>
                        <li><a href="../album/show_album.php">展示墙</a>
                        </li>
                        <li><a href="#">贴友墙</a></li>
                    </ul>
                </li>
                <li><a href="profile_people.php?see_what=null">贴友薄</a>
                    <ul>
                        <li><a href="profile_people.php?see_what=friends">我的贴友</a></li>
                        <li><a href="profile_people.php?see_what=concerns">我的关注</a></li>
                        <li><a href="profile_people.php?see_what=fans">我的粉丝</a></li>
                    </ul>
                </li>
                <li><a href="#">个人资料</a>
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
    <div class="list" id="letter_a">
    		<div class="album-path"><h3>我被贴的话题</h3></div>
            <div ><h3></h3></div>
            <!--[if IE]>
            <hr />
            <![endif]-->
        	<hr class="hr"/>
        <ul>
         <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['new']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['new']['name'] = 'new';
$_smarty_tpl->tpl_vars['smarty']->value['section']['new']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('result')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['new']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['new']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['new']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['new']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['new']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['new']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['new']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['new']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['new']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['new']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['new']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['new']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['new']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['new']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['new']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['new']['total']);
?>
             <li class="user_info">
                <div class="profile_img_big" onclick='open_album("<?php echo $_smarty_tpl->getVariable('result')->value[$_smarty_tpl->getVariable('smarty')->value['section']['new']['index']]['photo_path'];?>
")'>
                    <img src="<?php echo $_smarty_tpl->getVariable('result')->value[$_smarty_tpl->getVariable('smarty')->value['section']['new']['index']]['photo_path'];?>
" height="117" width="151"/>
                </div>
                  <!--   <p onclick="window.location='http://google.com' ">用户名</p> -->
             </li>
         <?php endfor; endif; ?>
        </ul>
       </div>
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