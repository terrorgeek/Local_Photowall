<?php
function Get_Photos_By_Album_ID($album_id)
{
	$sql_get_album_by_id="select photo_id, photo_name, photo_description, photo_path, album_id, created_at from photos where album_id=".$album_id;
	$query_album=mysql_query($sql_get_album_by_id);
	return $query_album;
}
?>