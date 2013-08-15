<?php session_start();
//这个页面最后把photo_name, 描述什么的存进数据库,随后整个上传照片过程完毕
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
require_once('../../Controller/Image_Handle/Generate_Thumbnail.php');
require_once('../../Controller/Libs/constants.php');
$image_handle=Resizeimage::getInstance();
//this array is to store all the inserted photos's photo_id
$inserted_photos_id_array=array();

$temp_store_path="../Project_Images/temp_uploaded_photos/";
function Check_Repeat_For_Temp_And_Real_Folder($filename)//$filename is $_POST["photo_name"][$i]
{
	$real_store_path="../Project_Images/photos/";
	$result="";
	$file=$real_store_path.$filename;
	if(file_exists($file))
	{
		$underscore_index=stripos($filename, "_");
		$result=substr_replace($filename, str_replace(" ","", substr(microtime(), 2)), $underscore_index+1,18);
	}
	return $result;
}
$user_id=$_SESSION["user_id"];
$album_id=$_POST["album_id"];
$date_now=date("Y-m-d h:m:s");
$all_photo_names="";
$sql_insert_photo="insert into photos (photo_name,photo_description,photo_path,album_id,
                   photo_big_thumbnail,photo_small_thumbnail,created_at,photo_original_name,uploader_username,uploader_user_id) values 
                   (";
for ($i=0; $i <count($_POST["photo_name"]); $i++) 
{
	//move the file in temp folder to real folder
	
	$source_path=iconv("UTF-8", "gb2312", $temp_store_path.$_POST["photo_name"][$i]);
	$destination_path=iconv("UTF-8", "gb2312","../Project_Images/photos/".$_POST["photo_name"][$i]);
	copy($source_path, $destination_path);
	//now move file to small thumbnail and big thumbnail
	$image_handle->resizeimage($destination_path,200, 200,0,iconv("UTF-8", "gb2312",$photo_big_thumbnail_folder.$_POST["photo_name"][$i]));
	$image_handle->resizeimage($destination_path,100, 100,0,iconv("UTF-8", "gb2312",$photo_small_thumbnail_folder.$_POST["photo_name"][$i]));
	@unlink($source_path); 
	
    $sql_insert_photo.="'".$_POST['photo_name'][$i]."','".$_POST['photo_description'][$i]."',
                       '".$_POST['photo_path'][$i]."','".$album_id."',
                       '".$photo_big_thumbnail_folder.$_POST["photo_name"][$i]."','".$photo_small_thumbnail_folder.$_POST["photo_name"][$i]."','".$date_now."',
					   '".$_POST['photo_original_name'][$i]."','".$_SESSION['nick_name']."','".$_SESSION['user_id']."')";
    $all_photo_names.=$_POST['photo_name'][$i]."|";
	mysql_query($sql_insert_photo);
	array_push($inserted_photos_id_array,mysql_insert_id());
	$sql_insert_photo="insert into photos (photo_name,photo_description,photo_path,album_id,
                   photo_big_thumbnail,photo_small_thumbnail,created_at,photo_original_name,uploader_username,uploader_user_id) values 
                   (";
}
//this is to inert data into photowall_movement table, the "one_of_photo_path" column store the first uploaded photo's path.
$user_id=$_SESSION["user_id"];$nick_name=$_SESSION["nick_name"];
$photo_uploaded_amount=count($_POST["photo_name"]);
$all_photo_names=substr($all_photo_names, 0,strlen($all_photo_names)-1);
$one_of_photo_path=$all_photo_names;
$all_photo_id=implode(",", $inserted_photos_id_array);
$sql_insert_into_movement="insert into photowall_movement (date,user_id,album_id,photo_uploaded_amount,one_of_photo_path,
                           nick_name, all_photo_id) values ('".date("Y-m-d h:m:s")."','".$user_id."','".$album_id."','".$photo_uploaded_amount."',
                           '".$one_of_photo_path."','".$nick_name."', '".$all_photo_id."')";
$query_movement=mysql_query($sql_insert_into_movement);







//--------------------above is to store photo into album,below is to handle the marked info--------------------
//--------------------whenever there is marked info, above always be executed!------------------
function handle_brackets($number_with_bracket)//used to handle the number that included by "()" e.g. (45)
{
	return substr($number_with_bracket, 1,strlen($number_with_bracket)-2);
}
//this function is to get marked user's nick name by query their user_id through DB
function Get_Users_Nick_Name($user_id_array)//return an array, including selected user's nick_name
{
	$sql_select_nick_name="select nick_name from user where user_id IN (";
	for ($i=0; $i <count($user_id_array) ; $i++) { 
		$sql_select_nick_name.=handle_brackets($user_id_array[$i]).",";
	}
	$sql_select_nick_name=substr($sql_select_nick_name, 0,strlen($sql_select_nick_name)-1).")";
	$query_users_nick_name=mysql_query($sql_select_nick_name);
	$nick_name=array();
	$index=0;
	while($out=mysql_fetch_array($query_users_nick_name))
	{	
		$nick_name[$index]=$out["nick_name"];
		$index++;
    }	
	return $nick_name;
}
//this is to store the marked information, this will be stored separetly from the above
//the $_POST["mark_info"] is a string seperated by "|"
if(isset($_POST["mark_info"])&&$_POST["mark_info"]!=""&&strlen($_POST["mark_info"])>0)
{
	$mark_info_array=explode("|", $_POST["mark_info"]);
	
	for ($i=0; $i <count($mark_info_array) ; $i++) {
		//every element in this array was seperated by ",", stands for every single marked photos
		$row=explode(",", $mark_info_array[$i]); 
		$row[0]=urldecode($row[0]);
		$row[4]=urldecode($row[4]);//marked_description
		preg_match_all("/\([0-9]+\)/", $row[3], $matches_user_ids);
		$nick_name_array=Get_Users_Nick_Name($matches_user_ids[0]);
		$user_id_string="";
		$nick_name_string="";
		for ($j=0; $j <count($matches_user_ids[0]); $j++) { 
			$user_id_string.=handle_brackets($matches_user_ids[0][$j]).",";
			$nick_name_string.=$nick_name_array[$j].",";
		}
		
		$sql="insert into marked_photo (marker_user_id,marker_username,be_marked_user_id,be_marked_nickname,
	         photo_path,group_hobby,show_to_fans,date,marked_description) values ('".$_SESSION['user_id']."','".$_SESSION['login_name']."',
	         '".substr($user_id_string,0,strlen($user_id_string)-1)."','".substr($nick_name_string,0,strlen($nick_name_array)-1)."','".$row[0]."',
	         '".$row[1]."','".$row[2]."','".date("Y-m-d h:m:s")."','".$row[4]."')";
		mysql_query($sql);
		$sql_insert_to_friend_news="insert into friends_movement (marked_user_id,marker_nick_name,
		                            marker_login_name,be_marked_user_id,photo_path,date) values ('".$user_id."',
									'".$_SESSION['nick_name']."','".$_SESSION['login_name']."','".substr($user_id_string,0,strlen($user_id_string)-1)."',
									'".$row[0]."','".date("Y-m-d h:m:s")."')";
	    mysql_query($sql_insert_to_friend_news);
	}
}
?>