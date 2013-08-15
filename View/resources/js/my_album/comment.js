var comment_html="";
function comment_success(responseText, statusText)
{
    comment_html+=responseText;
     $("#comment-box").append(responseText);
}
function send_comment()
{
    var comment_flag="";
    var see_flag=document.getElementById("see_flag").value;
    if(see_flag=="see_normal")
       comment_flag="normal";
    else
       comment_flag="marked";
    var photo_id=document.getElementById("photo_id_for_comment").value;
    $("#photo_comment_form").ajaxForm({
        data:{photo_id:photo_id,comment_flag:comment_flag},
       // target: '#comment-box',
        success:comment_success
    }).submit();
}
function prepare_reply(user_id,username)
{
    var target_user_id=document.getElementById("target_user_id");
    var target_username=document.getElementById("target_username");
    var cut=document.getElementById("cut");
    cut.value="yes";
    target_username.value=username;
    target_user_id.value=user_id;
    var comment=document.getElementById("comment");
    comment.value="回复"+target_username.value+":";
}