<?php
define('base_path',$_SERVER['DOCUMENT_ROOT']);//����������ľ��·��

define('smarty_path','/Local_Photowall');//����smartyĿ¼�ľ��·��--������

require (base_path.smarty_path."/smarty/Smarty.class.php");//����Smarty����ļ�


$smarty = new Smarty(); //����smartyʵ�����$smarty

$smarty->config_dir= base_path.smarty_path."Smarty/Config_File.class.php";  // Ŀ¼����

$smarty->caching=false; //�Ƿ�ʹ�û��棬��Ŀ�ڵ����ڼ䣬���������û���

$smarty->template_dir =  base_path.smarty_path."/View"; //����ģ��Ŀ¼

$smarty->compile_dir =  base_path.smarty_path."/templates_c"; //���ñ���Ŀ¼

$smarty->cache_dir =  base_path.smarty_path."/smarty_cache"; //�����ļ���

//----------------------------------------------------

//���ұ߽��Ĭ��Ϊ{}����ʵ��Ӧ�õ���������JavaScript���ͻ

//----------------------------------------------------

$smarty->left_delimiter = "{#";

$smarty->right_delimiter = "#}";

?>
