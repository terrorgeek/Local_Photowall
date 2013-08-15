<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
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
$photo_name_for_comment=$_POST["photo_name"];
$sql_find_photo_id="select photo_id from photos where photo_name='".urldecode($photo_name_for_comment)."'";
$query_photo_id=mysql_query($sql_find_photo_id);
//echo $sql_find_photo_id;
$photo_id=mysql_fetch_array($query_photo_id);//there must be only 1 row, because photo_name should be unique
$content=$_POST["comment"];
$sql_add_comments="insert into photo_comment (content,sender_id,photo_id,sender_name,date,sender_head_photo) values ('".$content."','".$_SESSION['user_id']."',
                  '".$photo_id['photo_id']."','".$_SESSION['nick_name']."','".$date."','".$head_photo."')";
$query_comment=mysql_query($sql_add_comments);//execute the add comment sql

$respone_html=<<<EOF
                        <div class="row-fluid">
                            <div class="span1">
                                <img class="img-small" src="$head_photo" alt="id-3223-profile-img" >
                            </div>
                            <div class="span10">
                                <p><a class="user-name" href="#">"$nick_name"</a> 回复<a class="user-name" href="#">ANGLED1</a>:"$content"</p>
                                <p class="muted"><sub>"$date"</sub></p>
                                <hr class="no-space"/>
                            </div>
                            <div class="span1">
                                <a href="#"><p>回复</p></a>
                            </div>
                        </div>
EOF;
echo $respone_html;
?>