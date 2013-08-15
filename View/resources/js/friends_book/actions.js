function delete_this(user_id)
{
    if(confirm("真的要删除吗?"))
    {
	$.ajax({
            type: "POST",
            url: "../add_people_action/cancel_this_concern.php",
            data: { counterpart_id:user_id }
        }).done(function( msg ) {
        if(msg=="yes")
        {alert("删除成功!");window.location.href=window.location.href;}
        else
           alert("删除失败!");
       });
    }
}
function visit_this(user_id)
{
    window.location.href="../third_person_album/third_person_show_album.php?user_id="+user_id;
}