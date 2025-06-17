<?php
if(!$_SESSION['num']){exit();}

if($_POST['new_srv']){
   $srv_id=intval($_POST['new_srv']);
   $check_if_srv_added = mysqli_query($conn,"SELECT * FROM user_main_srvs where srv_id=".$srv_id." and `user_id`=".$user_l['id']." ") or die("Err");
   if(mysqli_num_rows($check_if_srv_added)<1){
    mysqli_query($conn,"INSERT into user_main_srvs(`user_id`,srv_id) values(".$user_l['id'].",$srv_id) ") or die("Err34");
   }
}



?>
