<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
$album_id=filter_string($_POST["album_id"]);
$sql_delete_album="delete from album where album_id=".$album_id;
$query_delete_album=mysql_query($sql_delete_album);
if($query_delete_album)
   echo "yes";
else
   echo "no";
?>