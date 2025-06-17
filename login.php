
<?php session_start(); ?>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/globals.css" />
  <link rel="stylesheet" href="assets/styleguide.css" />
  <link rel="stylesheet" href="assets/login_style.css" />
  <link rel='stylesheet' href='assets/hf/logged_nav.css' />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
  <title>تسجيل الدخول</title>
</head>
<body>
<?php 
    include 'admin/db.php'; 
    include 'inc/header.php'; 
?>
<p style="text-align:center;">Logged As : <font color='darkred'><?php echo $_SESSION['email']; ?></font></p>

<div class="centered-container">
  <div class="content-box-large">
    <table id="tb_login">
      <tr>
        <td class="login-form">
          <div class="welcome-text-mobile">! مرحباً بك مجدداً</div>
          <div class="login-container">
            <center><div id="errorMessage"></div></center>
            <input id='email' class="login_input" type="text" name="username" placeholder="البريد الإلكتروني"><br>
            <input id='password' class="login_input" type="password" name="password" placeholder="الرقم السري"><br>
            <a href="rest.php" style="font-size:14px;">نسيت الرقم السري؟</a><br><br>
            <button id="login_btn" class="login_btn">
              <span class="btn-text">تسجيل الدخول</span>
            </button>
            <div class="account-text">
              لإنشاء حساب  <a href="reg.php">&nbsp; اضغط هنا </a>&nbsp; ليس لديك حساب ؟
            </div>
          </div>
        </td>
        <td class="welcome-box">
          <div class="welcome-frame">
            <img class="logo" src="images/untitled-1-01-2.png" alt="شعار الموقع"><br><br>
            <p class="welcome-text">! مرحباً بك مجدداً</p>
          </div>
        </td>
      </tr>
    </table>
  </div>
</div>

<?php include 'inc/footer.php'; ?>
<script src="js/login.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
