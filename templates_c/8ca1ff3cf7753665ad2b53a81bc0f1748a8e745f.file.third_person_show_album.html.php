<?php /* Smarty version Smarty-3.0.8, created on 2013-07-07 18:00:01
         compiled from "D:/xampp/htdocs/Local_Photowall/View\third_person_album/third_person_show_album.html" */ ?>
<?php /*%%SmartyHeaderCode:167351d9aca1f0ee36-54268101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ca1ff3cf7753665ad2b53a81bc0f1748a8e745f' => 
    array (
      0 => 'D:/xampp/htdocs/Local_Photowall/View\\third_person_album/third_person_show_album.html',
      1 => 1373219495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167351d9aca1f0ee36-54268101',
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
	<script src="../../View/resources/js/third_person/add_people.js"></script>
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
		function see_single_album(album_id,album_name)
		{
			window.location.href="third_person_opened_album.php?album_id="+album_id+"&user_id="+<?php echo $_smarty_tpl->getVariable('third_user_id')->value;?>
+"&album_name="+album_name;
		}
	</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Photowall-XX的照片墙（相册）</title>
<link rel="stylesheet" type="text/css" href="../../View/resources/css/follow.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <!--nav bar starts-->
        <div id="nav_bar">
            <div class="banner" style="padding-top: 5px;">
                <div id="banner_user_info row">
                    <div class="span5 bg-gray no-space third_person_card"><!--personal info-->
                        <div class="span2 third_person_proimg">
                            <div class="img-display-mid img-polaroid" onclick=''>
                                <a href="" class="no-link img-large" style="background-image: url(<?php echo $_smarty_tpl->getVariable('head_photo')->value;?>
);"></a>
                            </div>
                            <p></p>
                        </div>
                        <div class="span2 third_person_info">
                            <h4 class="no-space"><span style="font-size:16px; color: black;"><?php echo $_smarty_tpl->getVariable('nick_name')->value;?>
</span><span class="vip">&nbsp;VIP</span></h4>
                            <h6 class="no-space"><i class="icon-star"></i>&nbsp;关注&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('concerns_count')->value;?>
</h6>
                            <h6 class="no-space"><i class="icon-heart"></i>&nbsp;粉丝&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('fans_count')->value;?>
</h6>
                            <h6 class="no-space"><i class="icon-user"></i>&nbsp;贴友&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('friends_count')->value;?>
</h6>
                            <?php if ($_smarty_tpl->getVariable('identity')->value=='concern'){?>
                               <p id="op_button"><button  type="button" class="btn btn-mini" style="margin-top: 5px;" onclick="cancel_concern('<?php echo $_smarty_tpl->getVariable('third_user_id')->value;?>
')"><span class="text-error"><strong>&nbsp;&nbsp;+取消关注&nbsp;</strong></span></button></p>
                            <?php }elseif($_smarty_tpl->getVariable('identity')->value=='fan'){?>
                               <p id="op_button"><button  type="button" class="btn btn-mini" style="margin-top: 5px;" onclick="add_to_concern('<?php echo $_smarty_tpl->getVariable('third_user_id')->value;?>
')"><span class="text-error"><strong>&nbsp;&nbsp;+加关注&nbsp;</strong></span></button></p>
                            <?php }elseif($_smarty_tpl->getVariable('identity')->value=='friend'){?>
                               <p id="op_button"><button  type="button" class="btn btn-mini" style="margin-top: 5px;" onclick="cancel_concern('<?php echo $_smarty_tpl->getVariable('third_user_id')->value;?>
')"><span class="text-error"><strong>&nbsp;&nbsp;+取消关注&nbsp;</strong></span></button></p>
                            <?php }?>
                        </div>
                    </div><!--personal info end -->
                </div>
                <img class="logo" src="../../View/resources/img/logo_login.png" style="padding-top: 20px;" width="270" height="108px" alt="photowall" longdesc="http://www.photowall.cc">
            </div>
            <ul id="nav">
                <li><a href="../home/home.php" style="width:20px;"><i class="icon-home"></i></a></li>
                <li><a href="#">我的墙</a>
                    <ul>
                        <li><a href="../album/show_album.php">展示墙</a>
                        </li>
                        <li><a href="#">贴友墙</a></li>
                    </ul>
                </li>
                <li><a href="../relation/profile_people.php?see_what=null">贴友薄</a>
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
                    <form method="get" action="/search" id="search">
                        <input name="q" type="text" size="30" placeholder="搜索-贴友/粉丝/关注" />
                        <button type="submit" class="btn btn-nav" value="submit"><i class="icon-search"></i></button>
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
    <div class="list">
    	<div class="album-path"><h3>我的相册</h3></div>
          <hr class="hr"/>
    	  <ul> 
    	  	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['album']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['name'] = 'album';
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('album_2d_array')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total']);
?>
                <li class="user_info">
                   <div class="img-display-large img-polaroid" onclick="see_single_album('<?php echo $_smarty_tpl->getVariable('album_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['album_id'];?>
','<?php echo $_smarty_tpl->getVariable('album_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['album_name'];?>
');">
                      <a href="#myModal" class="no-link img-large" data-toggle="modal" style="background-image: url(<?php echo $_smarty_tpl->getVariable('album_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['cover'];?>
);">
                       <!--  <img  src="<?php echo $_smarty_tpl->getVariable('photo_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['photo']['index']]['photo_path'];?>
" class="img-polaroid img-large"/> -->
                      </a>
                   </div>
                <p onclick=""><?php echo $_smarty_tpl->getVariable('album_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['album_name'];?>
</p>
                <div class="list_action hideV">
                </div>
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