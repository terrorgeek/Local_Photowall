var action_flag="";
    function get_action(action)
    {
    	action_flag=action;
    }
    function give_up()
    {
    	$("#modal_body").html("");
    }
        var html_to_album=new Array();
        var marked_people_photo_array=new Array();
        function create_album_success(responseText, statusText)
        {
        	alert("创建成功!");
        	var arr=responseText.split('|');
        	var album_select=document.getElementById("album_id");
        	album_select.add(new Option(arr[1],arr[0]));
        }
        function create_album()
        {
        	if(document.getElementById("albumName").value.indexOf(" ")!=-1)
        	{alert("相册名不能有空格");return;}
        	if(document.getElementById("albumName").value=="")
        	{alert("相册名不能为空");return;}
        	$("#create_album").ajaxForm({
                    // data:{photo_index:index},
                    success:create_album_success
                }).submit();
        }
        function finish_mark_people()
        {
            var postToTag=$("#postToTag").val();
            var postToFans=$("#postToFans").val();
            var postToFriend=$("#postToFriend").val();
            var mark_description=$("#mark_description").val();
            var photo_path=document.getElementById("at_people").src;
            marked_people_photo_array.push(photo_path+","+postToTag+","+postToFans+","+postToFriend+","+mark_description);
        }
        var index=0;
        function cancel_upload()
        {
            for(var i=0;i<html_to_album.length;i++)
                html_to_album[i]="";
            html_to_album=new Array();
        }
        function At_People(full_path)
        {
            var at_people=document.getElementById("at_people");
            at_people.src=full_path;
        }
        function finish()
        {
            alert("上传成功!");
            for(var i=0;i<html_to_album.length;i++){html_to_album[i]="";}
            html_to_album=new Array();
            marked_people_photo_array=new Array();
            document.getElementById("modal_body").innerHTML="";
        }
        function Change_MkPple_Array_To_String(array)
        {
            var result="";
            for(var i=0;i<array.length;i++)
            {
                if(i==array.length-1)
                    result+=array[i];
                else
                    result+=array[i]+"|";
                    // alert("row:"+result);
            }
            return result;
        }
        function finish_upload_photo()
        {
            //var form_obj=document.getElementById("upload_final").submit();
          //  var marked_string=Change_MkPple_Array_To_String(marked_people_photo_array);
            //alert(marked_string);
            var album_select=document.getElementById("album_id");
            var m=document.getElementById("modal_body");
            if(album_select.value=="请选择相册"||album_select.value=="您现在还没有相册!")
            {alert("您还没有选择相册!");return;}
            if(action_flag=="to_album"&&m.innerHTML=="")
            {alert("上传的照片不能为空!");return;}
            $("#upload_final").ajaxForm({
             //   data:{mark_info:marked_string},
                success:finish
            }).submit();   
        }
        function removeImg_album(obj)
        {
        	var photo_name=obj.id;
        	$.ajax({
                type: "POST",
                url: "../photo/delete_photo_action.php",
                data: { photo_path:photo_name }
            }).done(function( msg ) {
                    });
        }
        function removeImg(obj,photo_name)
        {
            var id=obj.id;
            html_to_album[id]="";
            
            var name=photo_name;
          //  if user delete a photo, then delete the corresponding marked info of people in marked_people_photo_array
            for(var i=0;i<marked_people_photo_array.length;i++)
            {
            	//alert(marked_people_photo_array[i]);
            	var string_before_index=marked_people_photo_array[i].indexOf(",");
            	var string_before=marked_people_photo_array[i].substring(0,string_before_index);
            	var result_index=string_before.lastIndexOf("/");
            	var result=string_before.substring(result_index+1);
            	// alert(decodeURI(result));
            	// alert(photo_name);
            	if(decodeURI(result)==photo_name)
            	{
            		marked_people_photo_array.splice(i,1);
            	}
            }
            $.ajax({
                type: "POST",
                url: "../photo/delete_photo_action.php",
                data: { photo_path:name }
            }).done(function( msg ) {
                    });
        }

        function showResponse_album(responseText, statusText)
        {
           // alert(responseText+","+statusText);
            html_to_album.push(responseText);
            //html+=responseText;
            var html_str="";
            for(var i=0;i<html_to_album.length;i++)
            {
                html_str+=html_to_album[i];
            }
            $(".loader").remove();
            $("#modal_body").append(responseText);
            
            $(".upload-remove-img").tooltip({
                'trigger': 'hover',
                'placement': 'top'
            });
            $('.upload-remove-img').click(function() {$(this).parents('.upload-img').fadeOut("slow",function(){$(this).remove()}); }); /*remove upload img*/
        }
        
        $(document).ready(function(){
        	
            $(":text").each(function(){
                $(this).val("");
            });
            $(":password").val("");

            $('#selectImgAtFriend').live('change', function(){
                $("#modal_body1").append("<div class='upload-img loader'><img src='../../Controller/resources/img/loader.gif' alt='Uploading....'/></div>");
                $("#selectImgAtFriend_form").ajaxForm({
                   // data:{photo_index:index},
                  //  target: '#modal_body1',
                    success:showResponse_atFriends
                }).submit();
            });
            $('#selectImgToAlbum').live('change', function(){
              $("#modal_body").append("<div class='upload-img loader'><img src='../../Controller/resources/img/loader.gif' alt='Uploading....'/></div>");
                $("#upload_photo_form").ajaxForm({
                    data:{photo_index:index},
                  //  target: '#modal_body',
                    success:showResponse_album
                }).submit();
            });
        });
 