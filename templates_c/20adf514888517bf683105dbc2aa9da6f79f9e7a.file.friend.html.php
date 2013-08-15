<?php /* Smarty version Smarty-3.0.8, created on 2013-07-10 15:26:17
         compiled from "D:/xampp/htdocs/Local_Photowall/View\relation/friend.html" */ ?>
<?php /*%%SmartyHeaderCode:554451dd7d195a1776-71783563%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20adf514888517bf683105dbc2aa9da6f79f9e7a' => 
    array (
      0 => 'D:/xampp/htdocs/Local_Photowall/View\\relation/friend.html',
      1 => 1373469869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '554451dd7d195a1776-71783563',
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
     <script type="text/javascript" src="../../View/resources/js/friends_book/actions.js"></script>
    
	<script>
		$(document).ready(function(){
			$(":text").each(function(){
				$(this).val("");
			});
			$(":password").val("");
		});
	</script>
    <script><!--show hide buttons-->
		$(document).ready(function(show_hide) {
			$('.user_info').mouseenter(function() {$('.list_action',this).removeClass("hideV").addClass("showV")});
			$('.user_info').mouseleave(function() {$('.list_action',this).removeClass("showV").addClass("hideV")});          
        });
	</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Photowall-我的贴友</title>
<link rel="stylesheet" type="text/css" href="../../View/resources/css/follow.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <!--nav bar starts-->
        <div id="nav_bar">
            <div class="banner">
                <div id="page_name"><p>我的贴友</p><br /><p>MY FRIENDS</p></div>
                <img class="logo" src="../../View/resources/img/logo_login.png" width="270px" height="108px" alt="photowall" longdesc="http://www.photowall.cc">
            </div>
            <ul id="nav">
                <li><a href="../home/home.php" style="width:20px;"><i class="icon-home"></i></a></li>
                <li><a href="#">我的墙</a>
                    <ul>
                        <li><a href="../album/show_album.php">展示墙</a>
                        </li>
                        <li><a href="../album/paste_album.php">贴友墙</a></li>
                    </ul>
                </li>
                <li  class="current"><a href="profile_people.php?see_what=null">贴友薄</a>
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
    <?php  $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('friends_array')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['index']->key => $_smarty_tpl->tpl_vars['index']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['index']->key;
?>
    <?php if ($_smarty_tpl->getVariable('friends_array')->value[$_smarty_tpl->tpl_vars['k']->value]['first_letter']!=$_smarty_tpl->getVariable('letter_storage')->value[$_smarty_tpl->tpl_vars['k']->value]){?> 
    <div class="list" id="letter_<?php echo $_smarty_tpl->getVariable('friends_array')->value[$_smarty_tpl->tpl_vars['k']->value]['first_letter'];?>
">
    	<div class="tag"><h3><?php echo $_smarty_tpl->getVariable('friends_array')->value[$_smarty_tpl->tpl_vars['k']->value]['first_letter'];?>
</h3></div>
    	<?php if ($_smarty_tpl->tpl_vars['k']->value!=0){?>
          <hr class="hr"/>
        <?php }?>
    	  <ul> 
    	  	 <li class="user_info">
                 <div class="img-display-large img-polaroid" onclick="好友第三人称主页路径">
                     <?php  $_smarty_tpl->tpl_vars['item2'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item2']->key => $_smarty_tpl->tpl_vars['item2']->value){
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['item2']->key;
?>
                     <?php if ($_smarty_tpl->tpl_vars['key2']->value=='head_photo'){?>
                     <a href="" class="no-link img-large" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['item2']->value;?>
);"></a>
                     <?php }?>
                     <?php }} ?>
                 </div>
                    <p onclick="window.location='http://google.com' "><?php echo $_smarty_tpl->getVariable('friends_array')->value[$_smarty_tpl->tpl_vars['k']->value]['nick_name'];?>
</p>
                    <div class="list_action hideV">
                    	<div class="list_action_button" onclick="visit_this(<?php echo $_smarty_tpl->getVariable('friends_array')->value[$_smarty_tpl->tpl_vars['k']->value]['user_id'];?>
)">
                        	<p>访问</p>
                        </div>
						<div class="list_action_button" onclick="delete_this(<?php echo $_smarty_tpl->getVariable('friends_array')->value[$_smarty_tpl->tpl_vars['k']->value]['user_id'];?>
);" >
                        	<p>删除</p>
                        </div>                    
                    </div>
              </li>
       
    <?php }else{ ?>
             <li class="user_info">
                 <div class="img-display-large img-polaroid" onclick="好友第三人称主页路径">
                     <?php  $_smarty_tpl->tpl_vars['item2'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['index']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item2']->key => $_smarty_tpl->tpl_vars['item2']->value){
 $_smarty_tpl->tpl_vars['key2']->value = $_smarty_tpl->tpl_vars['item2']->key;
?>
                     <?php if ($_smarty_tpl->tpl_vars['key2']->value=='head_photo'){?>
                     <a href="" class="no-link img-large" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['item2']->value;?>
);"></a>
                     <?php }?>
                     <?php }} ?>
                 </div>
                    <p onclick="window.location='http://google.com' "><?php echo $_smarty_tpl->getVariable('friends_array')->value[$_smarty_tpl->tpl_vars['k']->value]['nick_name'];?>
</p>
                    <div class="list_action hideV">
                    	<div class="list_action_button" onclick="visit_this(<?php echo $_smarty_tpl->getVariable('friends_array')->value[$_smarty_tpl->tpl_vars['k']->value]['user_id'];?>
)">
                        	<p>访问</p>
                        </div>
						<div class="list_action_button" onclick="delete_this(<?php echo $_smarty_tpl->getVariable('friends_array')->value[$_smarty_tpl->tpl_vars['k']->value]['user_id'];?>
);" >
                        	<p>删除</p>
                        </div>                    
                    </div>
              </li>
    <?php }?>
    <?php if ($_smarty_tpl->getVariable('friends_array')->value[$_smarty_tpl->tpl_vars['k']->value+1]['first_letter']!=$_smarty_tpl->getVariable('letter_storage')->value[$_smarty_tpl->tpl_vars['k']->value+1]){?> 
        </ul>
    </div>
    <?php }?>
    <?php }} ?>
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