<?php @session_start();
$conn=mysql_connect("localhost","root","admin");
mysql_select_db("new_photowall",$conn);

$sql_friend1="select friends.reviewer_id, user.head_photo, user.user_id, user.nick_name, user.login_name from friends,user where
              friends.applicant_id=18 and friends.reviewer_id=user.user_id";
    $sql_friend2="select friends.applicant_id, user.head_photo, user.user_id, user.nick_name, user.login_name from user,friends where
              friends.reviewer_id=18 and friends.applicant_id=user.user_id";
    $sql=$sql_friend1." UNION ".$sql_friend2;
    $query=mysql_query($sql);
    $count=mysql_num_rows($query);
    $result=array("fans_count"=>$count,"ResultSet"=>$query);
    while($out=mysql_fetch_array($result["ResultSet"]))
    {
    	echo $out["applicant_id"]."<br/>";
    }
?>
<form action="search_friends.php" method="post">
search:<input type="text" size="50" name="keyword"/><br/>
<input type="submit" value="submit"/> 
</form>