<?php 
session_start();
include __DIR__ . '/admin/db.php'; 
include __DIR__ . '/nav/header.php'; 
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل الدخول</title>

  <!-- روابط التصميم -->
  <link rel="stylesheet" href="assets/globals.css" />
  <link rel="stylesheet" href="assets/styleguide.css" />
  <link rel="stylesheet" href="assets/dash_login.css" />
  <link rel="stylesheet" href="assets/hf/logged_nav.css" />
<link rel="stylesheet" href="profile/wlcom_login.css">

  <!-- خطوط -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
</head>
<body>

<div class="centered-container">
  <div class="content-box-large">
    <table id="tb_login">
      <tr>
        <td class="login-form">
          <div class="welcome-text-mobile">! مرحباً بك مجدداً</div>
          <div class="login-container">
            <center><div id="errorMessage"></div></center>

            <input id="email" class="login_input" type="text" name="email" placeholder="البريد الإلكتروني" autocomplete="off"><br>
            <input id="password" class="login_input" type="password" name="password" placeholder="الرقم السري"><br>

            <a href="rest.php" style="font-size:14px;">نسيت الرقم السري؟</a><br><br>

            <button id="login_btn" class="login_btn">
              <span class="btn-text">تسجيل الدخول</span>
            </button>

                      </div>
        </td>

        <td class="welcome-box">
          <div class="welcome-frame">
            <img class="logo" src="images/untitled-1-01-2.png" alt="شعار الموقع"><br><br>
            <p class="welcome-text">مرحبا بك في لوحة التحكم</p>
          </div>
        </td>
      </tr>
    </table>
  </div>
</div>

<!-- نافذة منبثقة ترحيبية -->
<div id="welcomeModal" class="welcome-modal" style="display: none;">
  <div class="welcome-modal-content">
    <h2>مرحباً بك في لوحة التحكم</h2>
  </div>
</div>


<?php include __DIR__ . '/inc/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/dash_login.js"></script>

</body>
</html>
