<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
$user_id=$_SESSION["user_id"];
//��ҳ��Ϊ���е��й�ͬ��Ȥ���˵�Ǳ�ں���
//��͵ò����ݿ���
$sql_find_common_hobby="select ";