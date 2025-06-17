  <?php 

if($_SESSION['email']){
    include "nav/logged_nav_desktop.php";
    include "nav/logged_nav_mobile.php";
    include "users_func/user_in_header.php";



    echo "<font color='red'>Logged As </font>:<font color='blue'>".$user_l['email']."</font> | <font color='red'> Type:</font><font color='blue'> ".$user_l['user_t']."</font>";
}else{
    include "nav/non_logged_nav.php";
} 