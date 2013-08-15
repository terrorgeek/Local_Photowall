<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
$album_name=filter_string($_POST["albumName"]);
$album_frontcover="";
$date=date("Y-m-d h:m:s");
$user_id=$_SESSION["user_id"];
$password=filter_string($_POST["albumPassword"]);
$description=filter_string($_POST["albumDiscription"]);
$reading_authority=filter_string($_POST["albumPrivacy"]);
$sql_add_albem="insert into album (album_name,album_frontcover,created_at,updated_at,is_encrypt,user_id,password,
                description,reading_authority) values ('".$album_name."','".$album_frontcover."','".$date."',
                '".$date."','no','".$user_id."','".$password."','".$description."','".$reading_authority."')";
$query=mysql_query($sql_add_albem);
//die($sql_add_albem);
echo mysql_insert_id()."|".$album_name;
