<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
//这个文件是专门用来从数据库里读出所有好友id后写入txt文件的
$sql_load_all_friends="SELECT reviewer_id FROM friends where applicant_id=".$_SESSION["user_id"]." union 
 SELECT applicant_id FROM friends where reviewer_id=".$_SESSION["user_id"];
$query=mysql_query($sql_load_all_friends);
$to_be_wrote_in="";
while($out=@mysql_fetch_array($query))
{
	$to_be_wrote_in.=$out[0].",";
}

$path="../Friends_Text_Files/".$_SESSION["user_id"].".txt";
$fp=fopen($path, "w");
fwrite($fp, substr($to_be_wrote_in, 0,strlen($to_be_wrote_in)-1));
fclose($fp);
