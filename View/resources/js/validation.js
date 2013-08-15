function validationRegister()
{
    var flag=true;
    var password=$("#password").val();
    var password_con=$("#password_confim").val();
    var email=$("#email").val();	
    var atpos=email.indexOf("@");
    var dotpos=email.lastIndexOf(".");
    var nick_name=$("#nick_name").val();
    if(nick_name=="")
    {
        alert("昵称不能为空!");
        flag=false;
    }
    if(password!=password_con)
    {
       alert("两次密不一致!");
       flag=false;
    }
    if(atpos==-1||email==""||dotpos==-1)
    {
        alert("邮箱不合法!");
        flag=false;
    }
    
    if(flag)
       document.getElementById("profile_form").submit();
}