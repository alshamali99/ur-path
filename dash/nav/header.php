<?php
// إذا كانت الصفحة تتطلب عرض CSS خاص بالهيدر (في حال تسجيل الدخول)
if (isset($_SESSION['email'])) {
    echo '<link rel="stylesheet" href="assets/logged_nav_desktop.css">';
}
?>

<div class="header-gradient-bg">
<?php
if (isset($_SESSION['email'])) {
    include "nav/logged_nav_desktop.php";
    include "nav/user_in_header.php";

    echo "<div style='text-align:center; margin-top:10px; font-family:Cairo; font-size:14px; color:#fff'>
        <strong>Logged As:</strong> {$_SESSION['email']} |
        <strong>Type:</strong> {$user_l['user_t']}
    </div>";
} else {
    include "nav/non_logged_nav.php";
}
?>
</div>
