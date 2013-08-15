<?php /* Smarty version Smarty-3.0.8, created on 2013-07-10 14:53:50
         compiled from "D:/xampp/htdocs/Local_Photowall/View\album/show_album.html" */ ?>
<?php /*%%SmartyHeaderCode:1677751dd757e604eb2-13809114%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93321f0073ddf05fc57be6010fd1c458c3dfa562' => 
    array (
      0 => 'D:/xampp/htdocs/Local_Photowall/View\\album/show_album.html',
      1 => 1373467994,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1677751dd757e604eb2-13809114',
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
	    function delete_album(album_id)
	    {
	    	if(confirm("真的要删除该相册吗?"))
	    	{
	    		$.ajax({
                type: "POST",
                url: "../album/delete_album.php",
                data: { album_id:album_id }
             }).done(function( msg ) {
            	if(msg=="yes")
            	{alert("删除成功!");window.location.href=window.location.href;}
            	else
            	alert("删除失败!");
             });
	    	}
	    //	window.location.href="../album/delete_album.php?album_id="+album_id;
	    }
	    function open_album(album_id,album_name)
		{
			window.location.href="../album/show_single_album.php?album_id="+album_id+"&album_name="+album_name;
		}
		$(document).ready(function(){
			$(":text").each(function(){
				$(this).val("");
			});
			$(":password").val("");
		});
		
	</script>
    <!--show hide buttons-->
    <script>
        $(document).ready(function(show_hide) {
            $('.user_info').mouseenter(function() {$('.list_action',this).removeClass("hideV").addClass("showV")});
            $('.user_info').mouseleave(function() {$('.list_action',this).removeClass("showV").addClass("hideV")});
        });
    </script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Photowall-我的展示墙</title>

<link rel="stylesheet" type="text/css" href="../../View/resources/css/follow.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <!--nav bar starts-->
        <div id="nav_bar">
            <div class="banner">
                <div id="page_name"><p>我的展示墙</p><br /><p>SHOW WALL</p></div>
                <img class="logo" src="../../View/resources/img/logo_login.png" width="270px" height="108px" alt="photowall" longdesc="http://www.photowall.cc">
            </div>
            <ul id="nav">
                <li><a href="../home/home.php" style="width:20px;"><i class="icon-home"></i></a></li>
                <li class="current"><a href="#">我的墙</a>
                    <ul>
                        <li><a href="../album/show_album.php">展示墙</a>
                        </li>
                        <li><a href="../album/paste_album.php">贴友墙</a></li>
                    </ul>
                </li>
                <li><a href="../relation/profile_people.php?see_what=null">贴友薄</a>
                    <ul>
                        <li><a href="../relation/profile_people.php?see_what=friends">我的贴友</a></li>
                        <li><a href="../relation/profile_people.php?see_what=concerns">我的关注</a></li>
                        <li><a href="../relation/profile_people.php?see_what=fans">我的粉丝</a></li>
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
    	<div class="album-path"><h3>我的相册</h3></div>
    	<div class="list" id="letter_a">
            <div ><h3></h3></div>
        	<hr class="hr"/>
            <ul>
            	 <!-- <li class="user_info">
                	<div class="profile_img_big" onclick="window.location='http://google.com' ">
                    	<img src="../../View/resources/img/follower/profile_img_test1.png" height="117" width="151"/>
                    </div>
                    <p onclick="window.location='http://google.com' ">用户名</p>
                    <div class="list_action hideV">
                    	<div class="list_action_button" onclick="window.location='http://google.com' ">
                        	<p>访问</p>
                        </div>
						<div class="list_action_button" onclick="delete">
                        	<p>删除</p>
                        </div>                    
                    </div>
              </li>-->
                <!-- <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['album']);
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
                	<div class="profile_img_big" onclick="open_album('<?php echo $_smarty_tpl->getVariable('album_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['album_id'];?>
','<?php echo $_smarty_tpl->getVariable('album_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['album_name'];?>
')">
                    	<img src="<?php echo $_smarty_tpl->getVariable('album_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['cover'];?>
" height="117" width="151" class="img-polaroid img-large"/>
                    </div>
                     <p onclick=""><?php echo $_smarty_tpl->getVariable('album_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['album_name'];?>
</p>
                </li>
                <?php endfor; endif; ?> -->
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
                   <div class="img-display-large img-polaroid" onclick="open_album('<?php echo $_smarty_tpl->getVariable('album_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['album_id'];?>
','<?php echo $_smarty_tpl->getVariable('album_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['album_name'];?>
')">
                      <a href="#myModal" class="no-link img-large" data-toggle="modal" style="background-image: url(<?php echo $_smarty_tpl->getVariable('album_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['cover'];?>
);">
                       <!--  <img  src="<?php echo $_smarty_tpl->getVariable('photo_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['photo']['index']]['photo_path'];?>
" class="img-polaroid img-large"/> -->
                      </a>
                   </div>
                <p onclick=""><?php echo $_smarty_tpl->getVariable('album_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['album_name'];?>
</p>
                <div class="list_action hideV">
                    <div class="list_action_button" onclick="">
                        <p>重命名</p>
                    </div>
                    <div class="list_action_button" onclick="delete_album('<?php echo $_smarty_tpl->getVariable('album_2d_array')->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['album_id'];?>
')" >
                        <p>删除</p>
                    </div>
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