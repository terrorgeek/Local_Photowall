<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
$comment_flag=$_POST["comment_flag"];
$photo_id=$_POST["photo_id"];
$content=$_POST["comment"];
if($_POST["cut"]=="yes")
   $content=substr($content, stripos($content, ":")+1);
//this function is to get my head photo path
function Get_HeadPhoto_My_Path()
{
	$sql_get_head_photo="select head_photo from user where user_id=".$_SESSION["user_id"];
	$query_head_photo=mysql_query($sql_get_head_photo);
	$head_photo=mysql_fetch_array($query_head_photo);
	return $head_photo;
}

$head_photo=Get_HeadPhoto_My_Path();
$head_photo="../Project_Images/head_photo/".$_SESSION["user_id"]."_".$head_photo["head_photo"];
$nick_name=$_SESSION['nick_name'];
$date=date("Y-m-d h:m:s");
$receiver_user_id=$_POST["user_id_of_this_photo"];
$receiver_username=$_POST["username_of_this_photo"];
if(isset($_POST["target_user_id"])&&$_POST["target_user_id"]!=""&&isset($_POST["target_username"])&&$_POST["target_username"]!="")
{
	$receiver_user_id=$_POST["target_user_id"];
	$receiver_username=$_POST["target_username"];
}
if($comment_flag=="normal")
{
	$sql_add_comments="insert into normal_photo_comment (content,sender_id,photo_id,sender_name,date,sender_head_photo,receiver_username,receiver_user_id) values 
	              ('".$content."','".$_SESSION['user_id']."', '".$photo_id."','".$_SESSION['nick_name']."',
	              '".$date."','".$head_photo."','".$receiver_username."','".$receiver_user_id."')";
    $query_comment=mysql_query($sql_add_comments);//execute the add comment sql
$sender_user_id=$_SESSION['user_id'];
$send_username=$_SESSION['nick_name'];
    $respone_html=<<<EOF
                        <div class="row-fluid">
                            <div class="span1">
                                <img class="img-small" src="$head_photo" alt="id-3223-profile-img" >
                            </div>
                            <div class="span10">
                                <p><a class="user-name" href="#">"$nick_name"</a> 回复<a class="user-name" href="#">"$receiver_username"</a>:"$content"</p>
                                <p class="muted"><sub>"$date"</sub></p>
                                <hr class="no-space"/>
                            </div>
                            <div class="span1">
                                <a href="#"><p onclick='prepare_reply("$sender_user_id","$send_username")'>回复</p></a>
                            </div>
                        </div>
EOF;
    echo $respone_html;
}
else if($comment_flag=="marked")
{
	$sql_add_comments="insert into marked_photo_comment (content,sender_id,marked_photo_id,sender_name,date,sender_head_photo,receiver_username,receiver_user_id) values
	 ('".$content."','".$_SESSION['user_id']."', '".$photo_id."','".$_SESSION['nick_name']."',
	 '".$date."','".$head_photo."','".$receiver_username."','".$receiver_user_id."')";
    $query_comment=mysql_query($sql_add_comments);//execute the add comment sql

    $respone_html=<<<EOF
                        <div class="row-fluid">
                            <div class="span1">
                                <img class="img-small" src="$head_photo" alt="id-3223-profile-img" >
                            </div>
                            <div class="span10">
                                <p><a class="user-name" href="#">"$nick_name"</a>回复<a class="user-name" href="#">"$receiver_username"</a>:"$content"</p>
                                <p class="muted"><sub>"$date"</sub></p>
                                <hr class="no-space"/>
                            </div>
                            <div class="span1">
                                <a href="#"><p>回复</p></a>
                            </div>
                        </div>
EOF;
    echo $respone_html;
}
?>