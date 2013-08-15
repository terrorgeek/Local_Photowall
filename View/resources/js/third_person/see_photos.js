var see_photo_array_id=new Array();
var see_photo_array_name=new Array();
var current_photo_index=0;
var photo_flow=document.getElementById("photo_flow");
var uploaded_amount=0;
function Get_UserID_Username_For_Photo(see_flag,photo_id)
{
    var user_id_of_this_photo=document.getElementById("user_id_of_this_photo");
    var username_of_this_photo=document.getElementById("username_of_this_photo");
        $.getJSON('../comment/Get_UserID_Username_For_Photo.php', { photo_id: photo_id,see_flag:see_flag}, function(data) {
		 user_id_of_this_photo.value=data.user_id;
                 username_of_this_photo.value=data.username;
                 $("#photo_original_name").html(data.photo_original_name);
                 $("#description").html(data.description);
		});
}

//只有第一次看照片是通过photo_name取得, 以后都是通过photo_id取得
function see_single_photo(photo_id,photo_name,can_comment,uploaded_photo_amount)
{
    if(can_comment=="no")
        document.getElementById("photo_comment_form").style.display="none";
    var all_photo_ids=document.getElementById("all_photo_ids").value;
    var all_photo_names=document.getElementById("all_photo_names").value;
    see_photo_array_id=new Array();
    see_photo_array_name=new Array();
    
    var photo_for_comment_display_obj=document.getElementById("photo_for_comment_display");
    photo_for_comment_display_obj.src="../Project_Images/photos/"+photo_name;
    
    
    var photo_id_for_comment_obj=document.getElementById("photo_id_for_comment");
    photo_id_for_comment_obj.value=photo_id;

    see_photo_array_id=all_photo_ids.split(",");
    //all_photo_names id store all photo_names such as: djssl.jpg|sjkdks.png|dghsjfd.jpg
    see_photo_array_name=all_photo_names.split("|");
    current_photo_index=Get_Current_Index(photo_name);
    uploaded_amount=0;
    uploaded_amount=uploaded_photo_amount;
    photo_flow.innerHTML="("+(current_photo_index+1)+"/"+uploaded_amount+")";
    //start to load all comments for this photo
    var see_flag=document.getElementById("see_flag");
    see_flag.value="see_normal";
    Get_UserID_Username_For_Photo("see_normal",photo_id);//just pass "see_normal", because itself is just see_normal
    $.ajax({
        type: "POST",
        url: "../comment/load_normal_photo_comment.php",
        data: { photo_id:photo_id }
    }).done(function( msg ) {
        $("#comment-box").html(msg);
      });
}
function see_next_photo()
{
    current_photo_index+=1;
    if(current_photo_index>see_photo_array_id.length-1)
        current_photo_index=0;
    photo_flow.innerHTML="("+(current_photo_index+1)+"/"+uploaded_amount+")";
    var photo_id=see_photo_array_id[current_photo_index];
    var photo_name=see_photo_array_name[current_photo_index];
    var photo_for_comment_display_obj=document.getElementById("photo_for_comment_display");
    
    var photo_id_for_comment_obj=document.getElementById("photo_id_for_comment");
    photo_id_for_comment_obj.value=photo_id;
    
    photo_for_comment_display_obj.src="../Project_Images/photos/"+photo_name;
    
    var see_flag=document.getElementById("see_flag");
    Get_UserID_Username_For_Photo("see_normal",photo_id);
    Send_Ajax_To_Normal_By_Photo_ID(photo_id);
}

function see_prev_photo()
{
    current_photo_index-=1;
    if(current_photo_index<0)
        current_photo_index=see_photo_array_id.length-1;
    photo_flow.innerHTML="("+(current_photo_index+1)+"/"+uploaded_amount+")";
    var photo_id=see_photo_array_id[current_photo_index];
    var photo_name=see_photo_array_name[current_photo_index];
    
    var photo_for_comment_display_obj=document.getElementById("photo_for_comment_display");
    
    var photo_id_for_comment_obj=document.getElementById("photo_id_for_comment");
    photo_id_for_comment_obj.value=photo_id;
    
    photo_for_comment_display_obj.src="../Project_Images/photos/"+photo_name;
    
    var see_flag=document.getElementById("see_flag");
    Get_UserID_Username_For_Photo("see_normal",photo_id);
    Send_Ajax_To_Normal_By_Photo_ID(photo_id);
}
function Send_Ajax_To_Normal_By_Photo_ID(photo_id)
{
     $.ajax({
        type: "POST",
        url: "../comment/load_normal_photo_comment.php",
        data: { photo_id:photo_id }
      }).done(function( msg ) {
        $("#comment-box").html(msg);
    });
}
function Get_Current_Index(photo_name)
{
    for(i=0;i<see_photo_array_name.length;i++)
        if(see_photo_array_name[i]==photo_name)
            return i;
}
