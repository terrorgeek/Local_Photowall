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