<?php /* Smarty version Smarty-3.0.8, created on 2013-07-17 20:26:26
         compiled from "D:/xampp/htdocs/Local_Photowall/View\home/home.html" */ ?>
<?php /*%%SmartyHeaderCode:1804051e6fdf26909e0-92352016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2859f81103e8cc838a910f101184ff0056c6200' => 
    array (
      0 => 'D:/xampp/htdocs/Local_Photowall/View\\home/home.html',
      1 => 1374092781,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1804051e6fdf26909e0-92352016',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- <script type="text/javascript" src="../../Controller/resources/JQuery_Plugins/ajax_form/jquery.min.js"></script> -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="../../View/resources/js/jquery.js"></script>
    <script type="text/javascript" src="../../Controller/resources/JQuery_Plugins/ajax_form/jquery.form.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../../View/resources/js/validation.js"></script>
    <script type="text/javascript" src="../../View/resources/js/bootstrap.min.js"></script>
    
     <script type="text/javascript" src="../../View/resources/js/directly_at_friends/at_friends.js"></script>
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/walls.css">
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/recommended-styles.css">
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/styles.css">
    <script>
    function to_friends(ids)
    {
    	window.location.href="../relation/profile_people.php?see_what=friends&new_added_friends="+ids;
    }
    function to_fans(ids)
    {
    	window.location.href="../relation/profile_people.php?see_what=fans&new_added_fans="+ids;
    }
    var action_flag="";
    function get_action(action)
    {
    	action_flag=action;
    }
    function give_up()
    {
    	$("#modal_body").html("");
    }
        var html_to_album=new Array();
        var marked_people_photo_array=new Array();
        function create_album_success(responseText, statusText)
        {
        	alert("创建成功!");
        	var arr=responseText.split('|');
        	var album_select=document.getElementById("album_id");
        	album_select.add(new Option(arr[1],arr[0]));
        }
        function create_album()
        {
        	if(document.getElementById("albumName").value.indexOf(" ")!=-1)
        	{alert("相册名不能有空格");return;}
        	if(document.getElementById("albumName").value=="")
        	{alert("相册名不能为空");return;}
        	$("#create_album").ajaxForm({
                    // data:{photo_index:index},
                    success:create_album_success
                }).submit();
        }
        function finish_mark_people()
        {
            var postToTag=$("#postToTag").val();
            var postToFans=$("#postToFans").val();
            var postToFriend=$("#postToFriend").val();
            var mark_description=$("#mark_description").val();
            var photo_path=document.getElementById("at_people").src;
            marked_people_photo_array.push(photo_path+","+postToTag+","+postToFans+","+postToFriend+","+mark_description);
        }
        var index=0;
        function cancel_upload()
        {
            for(var i=0;i<html_to_album.length;i++)
                html_to_album[i]="";
            html_to_album=new Array();
        }
        function At_People(full_path)
        {
            var at_people=document.getElementById("at_people");
            at_people.src=full_path;
        }
        function finish()
        {
            alert("上传成功!");
            for(var i=0;i<html_to_album.length;i++){html_to_album[i]="";}
            html_to_album=new Array();
            marked_people_photo_array=new Array();
            document.getElementById("modal_body").innerHTML="";
        }
        function Change_MkPple_Array_To_String(array)
        {
            var result="";
            for(var i=0;i<array.length;i++)
            {
                if(i==array.length-1)
                    result+=array[i];
                else
                    result+=array[i]+"|";
                    // alert("row:"+result);
            }
            return result;
        }
        function finish_upload_photo()
        {
            //var form_obj=document.getElementById("upload_final").submit();
          //  var marked_string=Change_MkPple_Array_To_String(marked_people_photo_array);
            //alert(marked_string);
            var album_select=document.getElementById("album_id");
            var m=document.getElementById("modal_body");
            if(album_select.value=="请选择相册"||album_select.value=="您现在还没有相册!")
            {alert("您还没有选择相册!");return;}
            if(action_flag=="to_album"&&m.innerHTML=="")
            {alert("上传的照片不能为空!");return;}
            $("#upload_final").ajaxForm({
             //   data:{mark_info:marked_string},
                success:finish
            }).submit();   
        }
        function removeImg_album(obj)
        {
        	var photo_name=obj.id;
        	$.ajax({
                type: "POST",
                url: "../photo/delete_photo_action.php",
                data: { photo_path:photo_name }
            }).done(function( msg ) {
                    });
        }
        function removeImg(obj,photo_name)
        {
            var id=obj.id;
            html_to_album[id]="";
            
            var name=photo_name;
          //  if user delete a photo, then delete the corresponding marked info of people in marked_people_photo_array
            for(var i=0;i<marked_people_photo_array.length;i++)
            {
            	//alert(marked_people_photo_array[i]);
            	var string_before_index=marked_people_photo_array[i].indexOf(",");
            	var string_before=marked_people_photo_array[i].substring(0,string_before_index);
            	var result_index=string_before.lastIndexOf("/");
            	var result=string_before.substring(result_index+1);
            	// alert(decodeURI(result));
            	// alert(photo_name);
            	if(decodeURI(result)==photo_name)
            	{
            		marked_people_photo_array.splice(i,1);
            	}
            }
            $.ajax({
                type: "POST",
                url: "../photo/delete_photo_action.php",
                data: { photo_path:name }
            }).done(function( msg ) {
                    });
        }

        function showResponse_album(responseText, statusText)
        {
           // alert(responseText+","+statusText);
            html_to_album.push(responseText);
            //html+=responseText;
            var html_str="";
            for(var i=0;i<html_to_album.length;i++)
            {
                html_str+=html_to_album[i];
            }
            $(".loader").remove();
            $("#modal_body").append(responseText);
            
            $(".upload-remove-img").tooltip({
                'trigger': 'hover',
                'placement': 'top'
            });
            $('.upload-remove-img').click(function() {$(this).parents('.upload-img').fadeOut("slow",function(){$(this).remove()}); }); /*remove upload img*/
        }
        
        $(document).ready(function(){
        	$(".postToFriend").mention({
            users:<?php echo $_smarty_tpl->getVariable('users')->value;?>

            });
            $(":text").each(function(){
                $(this).val("");
            });
            $(":password").val("");

            $('#selectImgAtFriend').live('change', function(){
                $("#modal_body1").append("<div class='upload-img loader'><img src='../../Controller/resources/img/loader.gif' alt='Uploading....'/></div>");
                $("#selectImgAtFriend_form").ajaxForm({
                   // data:{photo_index:index},
                  //  target: '#modal_body1',
                    success:showResponse_atFriends
                }).submit();
            });
            $('#selectImgToAlbum').live('change', function(){
              $("#modal_body").append("<div class='upload-img loader'><img src='../../Controller/resources/img/loader.gif' alt='Uploading....'/></div>");
                $("#upload_photo_form").ajaxForm({
                    data:{photo_index:index},
                  //  target: '#modal_body',
                    success:showResponse_album
                }).submit();
            });
        });
    </script>
    <title>Photowall-个人主页</title>
    <script type="text/javascript" src="../../View/resources/js/search.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <!--nav bar starts-->
        <div id="nav_bar">
            <div class="banner">
            	<div id="page_name"><p>个人主页</p><br /><p>HOMEPAGE</p></div>
            	<img class="logo" src="../../View/resources/img/logo_login.png" width="270px" height="108px" alt="photowall" longdesc="http://www.photowall.cc">
            </div>
        <ul id="nav">
            <li class="current"><a href="../home/home.php" style="width:20px;"><i class="icon-home icon-white"></i></a></li>
            <li><a href="#">我的墙</a>
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
               <form action="search_result.php" method="get">
                  <div id="search-area">
                     <input name="keyword" type="text" size="30" class="search" id="inputSearch" placeholder="搜索-贴友/粉丝/关注" />
                     <div id="divResult">
                     </div>
                     <button type="submit" class="btn btn-nav right" value="submit"><i class="icon-search"></i></button>
                  </div>
               </form>
            </li>
            <li class="current">
                <a href="#photoUploadOption" data-toggle="modal" style="width:15px; margin-left:30px;"><i class="icon-camera icon-white"></i></a>
            </li>
        </ul>
        </div>
       <!--nav bar ends-->
    </div>
    <div class="main_content">
    	<div class="row-fluid">
        	<div class="span8">
            	<div class="row-fluid">
                    <div class="span12 bg-gray">
                        <div class="line_holder"></div>
                        <p class="text-error text-right"><big>Photowall.cc 公测版1.0正式启动面世。打造您的照片墙吧！&nbsp;&nbsp;</big></p>
                        <p class="text-right">“贴”在您的照片展示墙上，打造您的个性相册；“贴”在您好友的信息墙上，分享您的每时每刻！&nbsp;&nbsp;</p>
                        <div id="myCarousel" class="carousel slide">
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                          </ol>
                          <!-- Carousel items -->
                          <div class="carousel-inner" style="height:150px;">
                            <div class="active item"><img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-01.jpg">
                                <div class="carousel-caption">
                                    <h4>图1</h4>
                                    <p>photowall上线啦</p>
                                </div>
                            </div>
                            <div class="item"><img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-02.jpg"></div>
                            <div class="item"><img src="http://twitter.github.io/bootstrap/assets/img/bootstrap-mdo-sfmoma-03.jpg"></div>
                          </div>
                          <!-- Carousel nav -->
                          <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                          <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                        </div>
                    </div><!--span8>span12-1 ends-->
                </div>
            	<div class="row-fluid">
                	<div class="line_holder">
                    	<p></p>
                    </div>
                </div>
            	<div class="row-fluid">
                    <div class="span12 bg-gray">
                        <div class="tabbable">
                            <ul class="red-bar nav nav-tabs" id="myTabs">
                                <li class="active"><a href="#home" data-toggle="tab">贴友墙动态 <span class="badge"><?php echo $_smarty_tpl->getVariable('index_friends_movement')->value;?>
</span></a></li>
                                <li><a href="#bar" data-toggle="tab">照片墙动态 <span class="badge"><?php echo $_smarty_tpl->getVariable('index_ptw_movement')->value;?>
</span></a></li>
                            </ul>

                            <div class="news-box tab-content">
                                <div class="tab-pane active" id="home">
                                	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['index']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['name'] = 'index';
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('result_friend_movement')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total']);
?>
                                	<div class="row-fluid photo-info">
                                        <div class="span4">
                                            <a href="#myModal" class="no-link offset1" data-toggle="modal">
                         
                                                <img onclick="see_single_photo(this,'<?php echo $_smarty_tpl->getVariable('result_friend_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['all_photo_names'];?>
','see_marked','<?php echo $_smarty_tpl->getVariable('result_friend_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['can_comment'];?>
','<?php echo $_smarty_tpl->getVariable('result_friend_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['photo_uploaded_amount'];?>
');"
                                                 id="<?php echo $_smarty_tpl->getVariable('result_friend_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['all_photo_id'];?>
"
                                                 src="<?php echo $_smarty_tpl->getVariable('result_friend_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['photo_path'];?>
"
                                                 class="img-polaroid img-large"/>
                                            </a>
                                        </div>
                                        <div class="span7">
                                            <h5><?php echo $_smarty_tpl->getVariable('result_friend_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['marker_nick_name'];?>
</h5>
                                            <p>于<?php echo $_smarty_tpl->getVariable('result_friend_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['date'];?>
上传<span class="text-error"><?php echo $_smarty_tpl->getVariable('result_friend_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['photo_uploaded_amount'];?>
</span>张新照片！</p>
                                            <p>通过网页版客户端</p>
                                            <i class="icon-map-marker"></i><a class="location" href="#">五四广场</a>
                                            <hr/>
                                        </div>
                                    </div>
                                	<?php endfor; endif; ?>
                                    <!-- <div class="row-fluid photo-info">
                                        <div class="span4">
                                            <a href="#myModal" class="no-link offset1" data-toggle="modal">
                                                <img onclick="see_single_photo(this);" src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid img-large"/>
                                            </a>
                                        </div>
                                        <div class="span7">
                                            <h5>ANGLED1</h5>
                                            <p>于2012年12月10日11:36上传<span class="text-error">3</span>张新照片！</p>
                                            <p>通过网页版客户端</p>
                                            <i class="icon-map-marker"></i><a class="location" href="#">五四广场</a>
                                            <hr/>
                                        </div>
                                    </div> -->
                                    <!--single img-info-->
                                    
                                    <!--single img-info-->
                                    <div class="pagination pagination-centered">
                                        <ul>
                                            <li><a href="#">&laquo;</a></li>
                                            <li class="disabled"><a href="#"><?php echo $_smarty_tpl->getVariable('index_ptw_movement')->value;?>
</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div><!--tab1 ends-->
                                <div class="tab-pane" id="bar">
                                	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['index']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['name'] = 'index';
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('result_photowall_movement')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['index']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['index']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['index']['total']);
?>
                                	<div class="row-fluid photo-info">
                                        <div class="span4">
                                            <a href="#myModal" class="no-link offset1" data-toggle="modal">
                                
                                                <img onclick="see_single_photo(this,'<?php echo $_smarty_tpl->getVariable('result_photowall_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['all_photo_names'];?>
','see_normal','<?php echo $_smarty_tpl->getVariable('result_photowall_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['can_comment'];?>
','<?php echo $_smarty_tpl->getVariable('result_photowall_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['photo_uploaded_amount'];?>
');" 
                                                id="<?php echo $_smarty_tpl->getVariable('result_photowall_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['all_photo_id'];?>
" 
                                                src="<?php echo $_smarty_tpl->getVariable('result_photowall_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['one_of_photo_path'];?>
" 
                                                class="img-polaroid img-large"/>
                                            </a>
                                        </div>
                                        <div class="span7">
                                            <h5><?php echo $_smarty_tpl->getVariable('result_photowall_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['nick_name'];?>
</h5>
                                            <p>于<?php echo $_smarty_tpl->getVariable('result_photowall_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['date'];?>
上传<span class="text-error"><?php echo $_smarty_tpl->getVariable('result_photowall_movement')->value[$_smarty_tpl->getVariable('smarty')->value['section']['index']['index']]['photo_uploaded_amount'];?>
</span>张新照片！</p>
                                            <p>通过网页版客户端</p>
                                            <i class="icon-map-marker"></i><a class="location" href="#">五四广场</a>
                                            <hr/>
                                        </div>
                                    </div>
                                	<?php endfor; endif; ?>
                                    <!-- <div class="row-fluid photo-info">
                                        <div class="span4">
                                            <a href="#myModal" class="no-link offset1" data-toggle="modal">
                                                <img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid img-large"/>
                                            </a>
                                        </div>
                                        <div class="span7">
                                            <h5>BrianHan</h5>
                                            <p>于2012年12月10日11:36上传<span class="text-error">3</span>张新照片！</p>
                                            <p>通过网页版客户端</p>
                                            <i class="icon-map-marker"></i><a class="location" href="#">五四广场</a>
                                            <hr/>
                                        </div>
                                    </div>
                                    
                                    <!--single img-info-->
                                  <!--  <div class="row-fluid photo-info">
                                        <div class="line_holder"></div>
                                        <div class="span4">
                                            <div class="span1"></div>
                                            <img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid img-large"/>
                                        </div>
                                        <div class="span7">
                                            <h5>Bill2</h5>
                                            <p>于2012年12月10日11:36上传<span class="text-error">3</span>张新照片！</p>
                                            <p>通过网页版客户端</p>
                                            <i class="icon-map-marker"></i><a class="location" href="#">五四广场</a>
                                            <hr/>
                                        </div>
                                  </div><!--single img-info-->
                                    
                                    <!--single img-info-->
                                    <div class="pagination pagination-centered">
                                        <ul>
                                            <li><a href="#">&laquo;</a></li>
                                            <li class="disabled"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div><!--tab2 ends-->
                            </div><!--table content ends-->
                        </div>
                    </div><!--span8>span12-2 ends-->
                </div>
            </div><!--left col end-->
            <div class="span4"><!--right col-->
                <div class="row-fluid"><!--personal info-->
                    <div class="span12 bg-gray">
                        <div class="line_holder"></div>
                        <div class="span7">
                            <img src="<?php echo $_smarty_tpl->getVariable('head_photo_big_thumbnail')->value;?>
" class="img-polaroid img-large"/>
                            <p></p>
                            <i class="icon-map-marker"></i><a class="location" href="#"><?php echo $_smarty_tpl->getVariable('location')->value;?>
</a>
                            <p></p>
                        </div>
                        <div class="span4">
                            <br />
                            <h4><?php echo $_smarty_tpl->getVariable('nick_name')->value;?>
</h4>
                            <h5 class="vip">VIP</h5>
                            <p></p>
                            <i class="icon-star"></i><h6>&nbsp;关注&nbsp;&nbsp;</h6><h6><?php echo $_smarty_tpl->getVariable('concern')->value;?>
</h6><br />
                            <i class="icon-heart"></i><h6>&nbsp;粉丝&nbsp;&nbsp;</h6><h6><?php echo $_smarty_tpl->getVariable('fans')->value;?>
</h6><br />
                            <i class="icon-user"></i><h6>&nbsp;贴友&nbsp;&nbsp;</h6><h6><?php echo $_smarty_tpl->getVariable('friends')->value;?>
</h6><br />
                            <br/><br/><font style="color: red;"><b><?php echo $_smarty_tpl->getVariable('new_added_fans')->value;?>
</b></font><br/>
                            <font style="color: red;"><b><?php echo $_smarty_tpl->getVariable('new_added_friends')->value;?>
</b></font>
                        </div>
                    </div>
                </div><!--personal info end -->
				<div class="row-fluid">
                	<div class="line_holder">
                    	<p></p>
                    </div>
                </div>                
                <div class="row-fluid"><!--recommended friend-->
                    <div class="span12 bg-gray">
                        <div class="span12 red-bar">
                            <div class="span4">
                                <a href="#"><p class="bar-title">贴友圈子</p></a>
                            </div>
                        </div><!--red top bar of the block end-->
                        <div class="span12">
                        	<?php  $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('recommendation_friends')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['index']->key => $_smarty_tpl->tpl_vars['index']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['index']->key;
?>
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="{$recommendation_friends[$k].head_photo}" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5><?php echo $_smarty_tpl->getVariable('recommendation_friends')->value[$_smarty_tpl->tpl_vars['k']->value]['nick_name'];?>
</h5>
                                    <p class="no-space">有<span class="text-error"><?php echo $_smarty_tpl->getVariable('recommendation_friends')->value[$_smarty_tpl->tpl_vars['k']->value]['common_friends_num'];?>
</span>个共同贴友</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#"><?php echo $_smarty_tpl->getVariable('recommendation_friends')->value[$_smarty_tpl->tpl_vars['k']->value]['province'];?>
,<?php echo $_smarty_tpl->getVariable('recommendation_friends')->value[$_smarty_tpl->tpl_vars['k']->value]['city'];?>
</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div>
                        	<?php }} ?>
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>刘嘉阳</h5>
                                    <p class="no-space">有<span class="text-error">8</span>个共同贴友</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>孙小圣</h5>
                                    <p class="no-space">有<span class="text-error">6</span>个共同贴友</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>张小懒</h5>
                                    <p class="no-space">有<span class="text-error">4</span>个共同贴友</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>韩</h5>
                                    <p class="no-space">有<span class="text-error">2</span>个共同贴友</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>SISI</h5>
                                    <p class="no-space">有<span class="text-error">1</span>个共同贴友</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                            <div class="line_holder"></div>
                        </div>
                    </div>
                </div><!--recommended friend end-->
				<div class="row-fluid">
                	<div class="line_holder">
                    	<p></p>
                    </div>
                </div>                
                <div class="row-fluid"><!--same-interest friend-->
                    <div class="span12 bg-gray">
                        <div class="span12 red-bar">
                            <div class="span4">
                                <a href="#"><p class="bar-title">兴趣圈子</p></a>
                            </div>
                        </div><!--red top bar of the block end-->
                        <div class="span12">
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>刘嘉阳</h5>
                                    <p class="no-space">有<span class="text-error">8</span>个共同兴趣标签</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>孙小圣</h5>
                                    <p class="no-space">有<span class="text-error">6</span>个共同兴趣标签</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>张小懒</h5>
                                    <p class="no-space">有<span class="text-error">4</span>个共同兴趣标签</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>韩</h5>
                                    <p class="no-space">有<span class="text-error">2</span>个共同兴趣标签</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                        	<div class="row-fluid rec-friend">
                                <div class="line_holder"></div>
                            	<div class="span4">
                                	<img src="../../View/resources/img/follower/profile_img_test1.png" class="img-polaroid  img-mid"/>
                                </div>
                                <div class="span5">
                                	<h5>SISI</h5>
                                    <p class="no-space">有<span class="text-error">1</span>个共同兴趣标签</p>
                        			<i class="icon-map-marker"></i><a class="location" href="#">青岛，中国</a>
                                </div>
                                <div class="span2">
                                	<a href="#"><p class="no-space">忽略</p></a>
                                    <a href="#"><p>关注</p></a>
                                </div>
                            </div><!--single recommended friend info end-->
                            <div class="line_holder"></div>
                        </div>
                    </div>
                </div><!--same-interest friend end-->

            </div><!--right col end-->
        </div>
        
	</div><!--main_content ends-->
    <div class="footer">
    	<div class="copyright">
        	<p>Copyright© 2012-2022 Photowall Inc, All Rights Reserved.</p>
            <p>照片墙 版权所有</p>
            <a href="http://www.tangerteq.com"><p>Powered by Tanger TEQ LLC.</p></a>
        </div>
    </div><!--footer ends-->

    <!-- Modal Photo Popup-->
    <div id="myModal" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="cancel_upload();">×</button>
            <h4 id="myModalLabel"><span id="photo_original_name">冰天雪地</span><span id="photo_flow">(3/15)</span></h4>
        </div>
        <div class="modal-body photo-popup">
            <div class="row-fluid">
                <div class="span12 img-box">
                    <img id="photo_for_comment_display" class="img-polaroid img-orig" width="600" src="../../View/resources/img/photos/snow-covered-trees.jpg" />
                    <p class="carousel-control left" onclick="see_prev_photo()" data-slide="prev">‹</p>
                    <p class="carousel-control right" onclick="see_next_photo()" data-slide="next">›</p>
                    <input type="hidden" name="see_flag" id="see_flag" value="" />

                    <p></p>
                    <p class="no-space" id="description">郊外美丽的雪景，一片银白</p>
                    <hr />
                </div>
            </div>
            <div class="row-fluid">
                <div class="span8">
                    <form class="form-inline" id="photo_comment_form" action="../comment/add_photo_comment.php" method="post">
                        <input type="text" style="width:290px;" placeholder="评论此照片" id="comment" name="comment">
                        <input type="hidden" id="photo_id_for_comment" name="photo_id_for_comment" value="" />
                        
                        <input type="hidden" id="user_id_of_this_photo" name="user_id_of_this_photo" value="" />
                        <input type="hidden" id="username_of_this_photo" name="username_of_this_photo" value="" />
                        <input type="hidden" id="target_user_id" name="target_user_id" value="" />
                        <input type="hidden" id="target_username" name="target_username" value="" />
                        <input type="hidden" name="cut" id="cut" value="no" />
                        
                        <label><sub class="muted">还可输入<span id="replyInputLimiter"></span>字</sub></label>
                        <button type="button" class="btn btn-small" onclick="send_comment()">发表</button>
                    </form>
                    <div class="row-fluid" id="comment-box">
                        <div class="row-fluid"><!--single comment starts-->
                            <div class="span1">
                                <img class="img-small" src="../../View/resources/img/follower/profile_img_test1.png" alt="id-3223-profile-img" >
                            </div>
                            <div class="span10">
                                <p><a class="user-name" href="#">阿Y</a> 回复<a class="user-name" href="#">ANGLED1</a>: 哈哈，是啊，景色确实很好啊！</p>
                                <p class="muted"><sub>2013-3-29 22:20</sub></p>
                                <hr class="no-space"/>
                            </div>
                            <div class="span1">
                                <a href="#"><p>回复</p></a>
                            </div>
                        </div><!--single comment ends-->
                        <div class="row-fluid"><!--single comment starts-->
                            <div class="span1">
                                <img class="img-small" src="../../View/resources/img/follower/profile_img_test1.png" alt="id-3223-profile-img" >
                            </div>
                            <div class="span10">
                                <p><a class="user-name" href="#">ANGLED1</a>: 下雪了啊 很漂亮啊。这是在哪里？是在你那边吗？过一阵我过去还能看得到么？</p>
                                <p class="muted"><sub>2013-3-22 14:20</sub></p>
                                <hr class="no-space"/>
                            </div>
                            <div class="span1">
                                <a href="#"><p>回复</p></a>
                            </div>
                        </div><!--single comment ends-->
                        <div class="row-fluid"><!--single comment starts-->
                            <div class="span1">
                                <img class="img-small" src="../../View/resources/img/follower/profile_img_test1.png" alt="id-3223-profile-img" >
                            </div>
                            <div class="span10">
                                <p><a class="user-name" href="#">刘嘉阳</a>: 这是哪里啊？这个季节还有雪。</p>
                                <p class="muted"><sub>2013-3-21 05:10</sub></p>
                                <hr class="no-space"/>
                            </div>
                            <div class="span1">
                                <a href="#"><p>回复</p></a>
                            </div>
                        </div><!--single comment ends-->
                    </div>
                </div>
                <div class="span4" id="img-preview">
                    <div class="row-fluid"><a class="offset11 no-space" id="load-pre-imgs" href="#"><i class="icon-chevron-up"></i></a></div>
                    <div class="row-fluid photo-preview-row">
                        <div class="span4" id="preview-img1"><img src="../../View/resources/img/photos/thumbnails/beauty_thumbnails.jpg" /></div>
                        <div class="span4" id="preview-img2"><img src="../../View/resources/img/photos/thumbnails/bird_thumbnails.jpg" /></div>
                        <div class="span4" id="preview-img3"><img src="../../View/resources/img/photos/thumbnails/car_thumbnails.jpg" /></div>
                    </div>
                    <div class="row-fluid photo-preview-row">
                        <div class="span4" id="preview-img4"><img src="../../View/resources/img/photos/thumbnails/child_thumbnails.jpg" /></div>
                        <div class="span4" id="preview-img5"><img src="../../View/resources/img/photos/thumbnails/disney_thumbnails.jpg" /></div>
                        <div class="span4" id="preview-img6"><img src="../../View/resources/img/photos/thumbnails/flower_thumbnails.jpg" /></div>
                    </div>
                    <div class="row-fluid photo-preview-row">
                        <div class="span4" id="preview-img7"><img src="../../View/resources/img/photos/thumbnails/horse_thumbnails.jpg" /></div>
                        <div class="span4" id="preview-img8"><img src="../../View/resources/img/photos/thumbnails/lake_thumbnails.jpg" /></div>
                        <div class="span4" id="preview-img9"><img src="../../View/resources/img/photos/thumbnails/plane_thumbnails.jpg" /></div>
                    </div>
                    <div class="row-fluid"><a class="offset11 no-space" id="load-next-imgs" href="#"><i class="icon-chevron-down"></i></a></div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Photo Two options-->
    <div id="photoUploadOption" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-footer row-fluid">
            <div class="span4">
                <a href="#atFriendModal" onclick="get_action('at_friends')" class="span12 btn btn-large btn-primary" data-dismiss="modal" aria-hidden="true" data-toggle="modal">贴给贴友</a>
            </div>
            <div class="span4 text-center">
                <a href="#" class="span12 btn btn-large disabled"><i class="icon-arrow-left"></i> 上传照片 <i class="icon-arrow-right"></i></a>
            </div>
            <div class="span4">
                <a href="#uploadModal"  onclick="get_action('to_album')" class="span12 btn btn-large btn-primary" data-dismiss="modal" aria-hidden="true" data-toggle="modal">存至相册</a>
            </div>
        </div>
    </div>

    <!-- Modal Photo Upload and @ Friends-->
    <div id="atFriendModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4><i class="icon-camera icon-white"></i> 上传照片 贴给贴友</h4>
        </div>
        <form action="../photo/store_photo_to_DB_at_friends.php" method="post" id="upload_final1" >
            <div class="modal-body photo-upload-container" id="modal_body1" ></div>
            <div class="modal-footer row-fluid photo-upload-footer">
                    <div class="row-fluid" style="margin-top:10px;">
                        <div class="span4">
                            <div class="control-group no-space">
                                <label class="control-label span6">贴给指定贴友</label>
                                <div class="controls span6">
                                    <input type="text" class="postToFriend" class="input-small" name="mark_textbox" id="mark_textbox" />
                                </div>
                            </div>
                            <div class="control-group no-space">
                                <label class="control-label span6" for="postToTag">贴给标签分组</label>
                                <div class="controls span6">
                                    <select id="postToTagAtFriend" name="postToTagAtFriend" class="input-small">
                                        <option value="food">美食</option> <!--load groups names and id to this select-->
                                        <option value="view">风景</option>
                                        <option value="soccer">足球</option>
                                        <option value="basketball">篮球</option>
                                        <option value="girls">美女</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group no-space">
                                <label class="control-label span6" for="postToAllAtFriend">贴给所有粉丝</label>
                                <div class="controls span6">
                                    <select id="postToAllAtFriend" name="postToAllAtFriend" class="input-small">
                                        <option value="yes">是</option>
                                        <option value="no" selected="selected">否</option>
                                    </select>
                                </div>
                              <!--   选择相册:&nbsp;&nbsp;&nbsp;&nbsp;<select class="span7" name="album_id" id="album_id">
                                    <?php echo $_smarty_tpl->getVariable('album_html')->value;?>

                                </select> -->
                            </div>
                        </div>
                        <div class="span6 offset2">
                            <div class="single-photo-descript-box">
                                <span class="descript-arrow"></span>
                                <textarea placeholder="添加描述" col="50" row="8" class="upload-descript-content" name="marked_description"></textarea>
                            </div>
                        </div>
                    </div>
                <div class="row-fluid">
                    <div class="span3 offset4">
                        <p style="font-size:10px;">按住Ctrl键可多选照片<br/>每次最多上传5张照片</p>
                    </div>
                    <a href="#" class="btn btn-large" onclick='imgUploadAtFriend();'>选择照片</a>
                    <a href="#" class="btn btn-large btn-primary" onclick='javascript:finish_mark_and_upload();'>完成上传</a>

                </form>
                <form action="../photo/add_photo_to_at_friends_action.php" method="post" enctype="multipart/form-data" id="selectImgAtFriend_form" >
                    <!--   <a href="#" class="btn btn-large">选择照片</a> -->
                    <input type="file" name="selectImgAtFriend[]" id="selectImgAtFriend" multiple="multiple" class="hide" />  <!--change id of upload to Album to "selectImgToAlbum"-->
                </form>
    </div>
</div>
</div>

    <!-- Modal Photo Upload to Album-->
    <div id="uploadModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="give_up()">×</button>
            <h4><i class="icon-camera icon-white"></i> 上传照片 存至相册</h4>
        </div>
        <form action="../photo/store_photo_to_DB_album.php" method="post" id="upload_final" >
        <div class="modal-body photo-upload-container" id="modal_body"></div>
        <div class="modal-footer row-fluid photo-upload-footer">
            <div class="span5">
                <div class="row-fluid" style="padding-top: 7px;">
                    <a href="#newAlbumModal" data-toggle="modal"><h4 class="text-error span5" style="line-height:10px;">+ 新建相册</h4></a>
                    <select class="span7" name="album_id" id="album_id">
                        <?php echo $_smarty_tpl->getVariable('album_html')->value;?>

                    </select>
                </div>
            </div>
            <div class="span7">
                <div class="span4">
                    <p style="font-size:10px;">按住Ctrl键可多选照片<br/>每次最多上传100张照片</p>
                </div>
                <a href="#" class="btn btn-large" onclick='imgUploadToAlbum();'>选择照片</a>
                <a href="#" class="btn btn-large btn-primary" onclick='javascript:finish_upload_photo();'>完成上传</a>
        </form>
        <form action="../photo/add_photo_to_album.php" method="post" enctype="multipart/form-data" id="upload_photo_form" >
        <!-- <form action="../photo/multi_file_upload_action.php" method="post" enctype="multipart/form-data" id="upload_photo_form" > -->
            <!--   <a href="#" class="btn btn-large">选择照片</a> -->
            <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="10000000" />
            <input type="file" id="selectImgToAlbum" name="selectImgToAlbum[]" multiple="multiple" style="display: none;"/>
        </form>
            </div>
        </div>
    </div>


    <!-- Modal Photo New Album-->
    <div id="newAlbumModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4><i class="icon-plus icon-white"></i> 新建相册</h4>
        </div>
        <form class="form-horizontal" id="create_album" method="post" action="../album/add_album_action.php">
            <div class="modal-body new-album-container row-fluid">
                <div class="span6 offset3">
                    <div class="control-group">
                        <label class="control-label" for="albumName">相册名称</label>
                        <div class="controls">
                            <input type="text" id="albumName" placeholder="新相册" name="albumName">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="albumPrivacy">阅览权限</label>
                        <div class="controls">
                            <select id="albumPrivacy" name="albumPrivacy">
                                <option value="albumPrivacy-everyone">所有人可见</option>
                                <option value="albumPrivacy-friend">贴友可见</option>
                                <option value="albumPrivacy-follow">关注可见</option>
                                <option value="albumPrivacy-fans">粉丝可见</option>
                                <option value="albumPrivacy-self">只自己可见</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="albumDiscription">相册简介</label>
                        <div class="controls">
                            <textarea type="password" id="albumDiscription" placeholder="填写相册简介..." name="albumDiscription"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="albumPassword">设定密码</label>
                        <div class="controls">
                            <input type="password" id="albumPassword" name="albumPassword" placeholder="选填">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-large" data-dismiss="modal" aria-hidden="true">取消新建</a>
                <button type="button" class="btn btn-large btn-primary" onclick="create_album();">完成新建</button>
            </div>
        </form>
    </div>

    <!-- Modal Photo New Single Photo-->
    <div id="newSinglePhotoModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4><i class="icon-camera icon-white"></i> 贴照设定</h4>
        </div>
        <div class="modal-body new-single-photo-container">
                <div class="img-box">
                    <img class="img-polaroid img-orig" src="../../View/resources/img/photos/snow-covered-trees.jpg" id="at_people" />
                </div>
            <form class="form-horizontal">
                <div class="row-fluid" style="margin-top:10px;">
                    <div class="span4">
                        <div class="control-group no-space">
                            <label class="control-label span6">贴给指定贴友</label>
                            <div class="controls span6">
                                <input type="text" class="postToFriend" class="input-small" id="postToFriend" name="postToFriend" />
                            </div>
                        </div>
                        <div class="control-group no-space">
                            <label class="control-label span6" for="postToTag">贴给标签分组</label>
                            <div class="controls span6">
                                <select id="postToTag" class="input-small">
                                    <option value="food">美食</option> <!--load groups names and id to this select-->
                                    <option value="view">风景</option>
                                    <option value="soccer">足球</option>
                                    <option value="basketball">篮球</option>
                                    <option value="girls">美女</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group no-space">
                            <label class="control-label span6" for="postToFans">贴给所有粉丝</label>
                            <div class="controls span6">
                                <select id="postToFans" class="input-small">
                                    <option value="yes">是</option>
                                    <option value="no" selected="selected">否</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="span6 offset2">
                        <div class="single-photo-descript-box">
                            <span class="descript-arrow"></span>
                            <textarea placeholder="添加描述" col="25" row="8" class="upload-descript-content" id="mark_description"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-large" data-dismiss="modal" aria-hidden="true">取消设定</a>
            <button type="submit" data-dismiss="modal" aria-hidden="true" class="btn btn-large btn-primary" onclick="finish_mark_people();">完成设定</button>
        </div>
    </div>


<!-- Placed at the end of the document so the pages load faster -->
  <!--   <script type="text/javascript" src="../../View/resources/js/directly_at_friends/filedrag.js"></script> -->
    <script type="text/javascript" src="../../View/resources/js/bootstrap-tab.js"></script>
    <script type="text/javascript" src="../../View/resources/js/comment/comment.js"></script>
   <script type="text/javascript" src="../../View/resources/js/friends_news/home.js"></script>
    <script type='text/javascript' src="http://twitter.github.com/bootstrap/assets/js/bootstrap-typeahead.js"></script>
    <script type='text/javascript' src="../../View/resources/js/mention.js"></script>
    <script type='text/javascript' src="../../View/resources/js/jquery.tinylimiter.js"></script>
    <script>
        $(function () {
            $('#myTab a:last').tab('show');
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".upload-remove-img").tooltip({
                'trigger': 'hover',
                'placement': 'top'
            });
            $('.upload-remove-img').click(function() {$(this).parents('.upload-img').fadeOut("slow",function(){$(this).remove()}); }); /*remove upload img*/
            /*input limiter*/
            var elem = $("#replyInputLimiter");
            $("#replyInputBox").limiter(100, elem);
        });
        function imgUploadAtFriend(){
             $('#selectImgAtFriend').click();
        };
        function imgUploadToAlbum(){
            $('#selectImgToAlbum').click();
        };
    </script>
   <!--   <script type="text/javascript" src="../../View/resources/js/filedrag.js"></script> -->
    <script>/*Mock data*/
    // $(document).ready(function(){
    	// alert("askjldslkjfskjflks");
        // $(".postToFriend").mention({
            // users:<?php echo $_smarty_tpl->getVariable('users')->value;?>

            // });
        // });
    </script>
    <!-- prepare for ajax tab load
    <script>
    $(function() {
        var baseURL = 'http://yourdomain.com/ajax/';
        //load content for first tab and initialize
        $('#home').load(baseURL+'home', function() {
            $('#myTabs').tab(); //initialize tabs
        });
        $('#myTabs').bind('show', function(e) {
           var pattern=/#.+/gi //use regex to get anchor(==selector)
           var contentID = e.target.toString().match(pattern)[0]; //get anchor
           //load content for selected tab
            $(contentID).load(baseURL+contentID.replace('#',''), function(){
                $('#myTabs').tab(); //reinitialize tabs
            });
        });
    });
    </script>-->
    <!-- Placed at the end of the document so the pages load faster -->
</div>
</body>
</html>