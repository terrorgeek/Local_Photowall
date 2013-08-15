<?php session_start();
require_once('../../connector.ini.php');
require_once('../../Controller/Validation/validate_string.php');
require_once('../../Controller/Image_Handle/Generate_Thumbnail.php');
require_once('PinYin.php');
if(isset($_POST["submit_test"])&&$_POST["submit_test"]=="submit_test")
{
    $url_pattern="/http:\/\/.*/";
    //$email_pattern="//";
	$login_name=strip_tags($_POST["login_name"]);
	$password=strip_tags($_POST["password"]);
	$password_confirm=strip_tags($_POST["password_confirm"]);
	$nick_name=strip_tags($_POST["nick_name"]);
	$real_name=strip_tags($_POST["real_name"]);
	$sex=$_POST["sex"];
	$province=$_POST["province"];
	$city=$_POST["city"];
	$blood_type=$_POST["blood_type"];
	$birthday=$_POST["birthday"];//待处理
	$QQ=strip_tags($_POST["QQ"]);
	$MSN=strip_tags($_POST["MSN"]);
	$profile=strip_tags($_POST["profile"]);//待处理
	$email=strip_tags($_POST["email"]);
	$recommended_by=strip_tags($_POST["recommended_by"]);
	$introduction=strip_tags($_POST["introduction"]);
	//处理照片,以user_id+下划线+图片名来重新命名头像的名字,并存入文件夹,而数
	//据库照片名存的是原名,因此读的时候要用user_id+下划线+照片名,这样
	//的话插入数据库只需一次
	$head_photo=$_FILES["head_photo"];
	$picture_name=$head_photo["name"];//原图像图片名
    $picture_type=$head_photo["type"];//取一下图片类型
    $image_types=array("image/gif","image/jpg","image/jpeg","image/png", "image/bmp", "image/pjpeg","image/x-png");
    //密码必须一致
    if($password!=$password_confirm)
        echo "<script>alert('password not matches');</script>";
	/*$sql_register="insert into user (login_name, real_name, password, email, recommended_by, nick_name, province, city, sex, birthday, 
	               blood_type, profile, QQ, MSN, introduction, head_photo) values ('".$login_name."','".$real_name."','".$password."','".$email."',
	               '".$recommended_by."','".$nick_name."','".$province."','".$city."','".$sex."','".$birthday."','".$blood_type."','".$profile."',
	               '".$QQ."','".$MSN."','".$introduction."','".$head_photo["name"]."')";  */
    
	//die($sql_update);
	$user_id=$_SESSION["user_id"];
	//将照片前面加上user_id后再存入文件夹
	//str_replace(" ","", substr(microtime(), 2))
	$new_picture_name=$user_id."_".$picture_name;
	if(in_array($picture_type, $image_types)&&$picture_name!="")
	{
		if(file_exists("../Project_Images/head_photo/".$new_picture_name))
			$new_picture_name=$user_id."_".str_replace(" ","", substr(microtime(), 2))."_".$picture_name;
	//	die($new_picture_name);
		move_uploaded_file($head_photo["tmp_name"], "../Project_Images/head_photo/".$new_picture_name);
        //移动到原大小的文件夹里后立即根据其路径先取出来, 再跟据其生成缩略图, 缩略图在文件夹中的存储和原图的文件夹中存储是一样的
        //先实例化类
        $image_handle=Resizeimage::getInstance();
        $image_handle->resizeimage("../Project_Images/head_photo/".$new_picture_name, 200, 200,0,"../Project_Images/head_photo_big_thumbnail/".$new_picture_name);
        $image_handle->resizeimage("../Project_Images/head_photo/".$new_picture_name, 100, 100,0,"../Project_Images/head_photo_small_thumbnail/".$new_picture_name);
	}
//	die();
	//开始修改用户的profile
    //把nick_name转成拼音
    $chinese_pinyin=Pinyin($nick_name,"UTF-8");
    $sql_update="update user set real_name='".$real_name."', password='".md5($password)."', email='".$email."', recommended_by='".$recommended_by."',
                 nick_name='".$nick_name."', province='".$province."', city='".$city."', sex='".$sex."', birthday='".$birthday."',
                 blood_type='".$blood_type."', profile='".$profile."', QQ='".$QQ."', MSN='".$MSN."', introduction='".$introduction."',
                 head_photo='".$head_photo['name']."', head_photo_big_thumbnail='".$head_photo['name']."',
                 head_photo_small_thumbnail='".$head_photo['name']."', chinese_pinyin='".$chinese_pinyin."' where user_id='".$_SESSION['user_id']."'";
  //  die($sql_update);
	$query=mysql_query($sql_update);
	if($query)
	{
		$_SESSION["nick_name"]=$nick_name;
		$_SESSION["user_id"]=$user_id;
		echo "<script>alert('success!');</script>";
		echo "<script>window.location.href='../home/home.php';</script>";
	}
	else
	{
		echo "<script>alert('failed!');</script>";
		echo "<script>history.go(-1);</script>";
	}
	
}
