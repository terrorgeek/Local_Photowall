function give_up()
{
    $("#modal_body").html("");
}
function cancel_upload()
{
    for(var i=0;i<html_to_album.length;i++)
        html_to_album[i]="";
    html_to_album=new Array();
}
function finish()
{
    alert("上传成功!");
    for(var i=0;i<html_to_album.length;i++){html_to_album[i]="";}
    html_to_album=new Array();
    marked_people_photo_array=new Array();
    document.getElementById("modal_body").innerHTML="";
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
        	$(".postToFriend").mention({
            users:{#$users#}
            });
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