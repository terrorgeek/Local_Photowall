<?php @session_start();
$reponse_html="";
$temp_store_path="../Project_Images/temp_uploaded_photos/";
$photo_submit_path="../Project_Images/photos/";
$files = $_FILES['selectImgAtFriend'];

	foreach ($files['name'] as $id => $err) {
		    $fn = $temp_store_path.$_SESSION["user_id"]."_".str_replace(" ","", substr(microtime(), 2))."_".$files['name'][$id];
			if(file_exists($fn))
			    $fn=$temp_store_path.$_SESSION["user_id"]."_".str_replace(" ","", substr(microtime(), 2))."_".$files['name'][$id];
			$fn=iconv("UTF-8", "gb2312", $fn);
			if(move_uploaded_file($files['tmp_name'][$id], $fn))
			{
				$fn=iconv("gb2312","UTF-8",$fn);
				$path=$fn;
				$photo_name=substr($path, strripos($path, "/")+1);
				$photo_submit_path.=$photo_name;
				$photo_original_name=$files["name"][$id];
                $temp=<<<EOF
                <div class="upload-img">
                <a href="#newSinglePhotoModal" data-toggle="modal">
                    <img src="$path" class="img-polaroid img-large"/>
                </a> 
                    <div class="upload-descript-box">
                        <span class="descript-arrow"></span>
                        <input type="hidden" name="photo_original_name[]" id="photo_original_name[]" value="$photo_original_name"/>
                        <i id='$photo_name' class="icon-remove upload-remove-img" onclick="removeImg_atFriends(this)" title="删除"></i></a>
                        <textarea placeholder="添加描述" maxlength="240" name="photo_description[]" id="photo_description[]" class="upload-descript-content"></textarea>
                        <input type="hidden" name="photo_name[]" id="photo_name[]" value='$photo_name' />
                        <input type="hidden" name="photo_path[]" id="photo_path[]" value='$photo_submit_path' />
                    </div>
                </div>
EOF;
                $reponse_html.=$temp;
				$photo_submit_path="../Project_Images/photos/";
			}
	}
    echo $reponse_html;
?>