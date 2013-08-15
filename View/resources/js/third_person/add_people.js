function cancel_concern(user_id)
    {
    	$.ajax({
           type: "POST",
           url: "../add_people_action/cancel_this_concern.php",
           data: { counterpart_id:user_id }
          }).done(function( msg ) {
          	window.location.href =window.location.href;
         // 	var obj=document.getElementById("op_button");
         //   obj.innerHTML="<button type='button' class='btn btn-mini' style='margin-top: 5px;' onclick='add_to_concern('{#$third_user_id#}')'><span class='text-error'><strong>&nbsp;&nbsp;+加关注&nbsp;</strong></span></button>";
         //   alert(msg);
        });
    }
    function add_to_concern(user_id)
    {
    	$.ajax({
           type: "POST",
           url: "../add_people_action/add_as_my_concern.php",
           data: { counterpart_id:user_id }
          }).done(function( msg ) {
          	window.location.href =window.location.href;
       //   	var obj=document.getElementById("op_button");
       //     obj.innerHTML="<button type='button' class='btn btn-mini' style='margin-top: 5px;' onclick='cancel_concern('{#$third_user_id#}')'><span class='text-error'><strong>&nbsp;&nbsp;+加关注&nbsp;</strong></span></button>";
       //     alert(msg);
        });
    }