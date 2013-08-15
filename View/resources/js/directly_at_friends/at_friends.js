
function showResponse_atFriends(responseText, statusText)
{
     // alert(responseText+","+statusText);
    $(".loader").remove();
     $("#modal_body1").append(responseText);
     $(".upload-remove-img").tooltip({
           'trigger': 'hover',
           'placement': 'top'
     });
     $('.upload-remove-img').click(function() {$(this).parents('.upload-img').fadeOut("slow",function(){$(this).remove()}); }); /*remove upload img*/
}
function finish2(responseText, statusText)
{
     for(var i=0;i<html_to_album.length;i++){html_to_album[i]="";}
     html_to_album=new Array();
     marked_people_photo_array=new Array();
   //  document.getElementById("modal_body1").innerHTML=responseText;
     alert(responseText);
     if(responseText=="yes")
         alert("上传成功!");
     else
         alert("照片数不能大于5张!");
     document.getElementById("modal_body1").innerHTML="";
}
function finish_mark_and_upload()
{
	var m1=document.getElementById("modal_body1");
	var mark_box=document.getElementById("mark_textbox").value;
	if(mark_box=="")
	{alert("贴友不能为空!");return;}
	if(m1.innerHTML==""&&action_flag=="at_friends")
	{alert("上传的照片不能为空!");return;}
    $("#upload_final1").ajaxForm({
    //   data:{mark_info:marked_string},
        success:finish2
    }).submit();
}
function removeImg_atFriends(obj)
{
    var photo_name=obj.id;
        	$.ajax({
                type: "POST",
                url: "../photo/delete_photo_action.php",
                data: { photo_path:photo_name }
            }).done(function( msg ) {
                    });
}
