<?php
if ($_SESSION['num'] && $_SESSION['num'] != 0 && $_SESSION['password']) {
    $u_id_in_header = intval($_SESSION['num']);
    $u_query_in_header = mysqli_query($conn, "SELECT * FROM users WHERE id = $u_id_in_header") or die("U_Func_Err");
    $user_l = mysqli_fetch_array($u_query_in_header);
}
?>
