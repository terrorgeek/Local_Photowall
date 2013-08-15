<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
if(isset($_POST["from_db"])&&$_POST["from_db"]=="yes")
{
	$photo_id=$_POST["photo_id"];
	$photo_name=$_POST["photo_name"];
	//delete photo from mysql database
	$sql_delete_photo="delete from photos where photo_id=".$_POST["photo_id"];
	$q=mysql_query($sql_delete_photo);
	//now we delete file from folder
	$path1="../Project_Images/photos/".$photo_name;
	$path2="../Project_Images/photo_big_thumbnail/".$photo_name;
	$path3="../Project_Images/photo_small_thumbnail/".$photo_name;
    $path1=iconv("UTF-8", "gb2312", $path1);
	$path2=iconv("UTF-8", "gb2312", $path2);
	$path3=iconv("UTF-8", "gb2312", $path3);
	@unlink($path1);@unlink($path2);@unlink($path3);
}
else
{
	$file=$_POST["photo_path"];
    $path = "../Project_Images/temp_uploaded_photos/".$file;
    $path=iconv("UTF-8", "gb2312", $path);
    echo $path;
    @unlink($path);
}
?>