<?php 
include '../admin/db.php';

// جلب البيانات من الفورم
$f_name       = strip_tags($_POST['f_name']);
$l_name       = strip_tags($_POST['l_name']);
$phone_number = "+" . intval($_POST['key_code']) . intval($_POST['phone_number']);
$email        = strip_tags($_POST['email']);
$password     = strip_tags($_POST['password']);
$bank_name    = strip_tags($_POST['bank_name']);
$bank_account = strip_tags($_POST['bank_account']);
$swift        = strip_tags($_POST['swift']);
$ip           = $_SERVER['REMOTE_ADDR'];
$browser      = $_SERVER['HTTP_USER_AGENT'];

////////// Email check /////////////
$qq = "SELECT * FROM users WHERE email = ?";
$eq = $conn->prepare($qq);
$eq->bind_param("s", $email);
$eq->execute();
$res = $eq->get_result();
if ($res->num_rows > 0) {
    echo "error_email";
    exit();
}

/////////// Phone check /////////////
$q_phone      = "SELECT * FROM users WHERE phone_number = ?";
$e_phone      = $conn->prepare($q_phone);
$e_phone->bind_param("s", $phone_number);
$e_phone->execute();
$phone_res    = $e_phone->get_result();
if ($phone_res->num_rows > 0) {
    echo "error_number";
    exit();
}

// إعداد جملة الإدخال
$stmt = $conn->prepare("
    INSERT INTO users
      (f_name, l_name, phone_number, email, password, bank_name, bank_account, swift, ip, browser)
    VALUES
      (?,?,?,?,?,?,?,?,?,?)
") or die("Error -545");
$stmt->bind_param(
    "ssssssssss",
    $f_name, $l_name, $phone_number,
    $email,  $password, $bank_name,
    $bank_account, $swift, $ip, $browser
);
?>

<style>
.reg_success {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background: url('../../images/reg_bg.png');
  background-size: 70%;
  overflow-x: hidden;
  align-items: center;
}
.reg_success .div-1 {
  max-height: 640px;
  height: 50%;
  background: rgba(255, 255, 255, 0.21);
  border: 1px solid #8DE0CD;
  backdrop-filter: blur(10px);
  border-radius: 22px;
  max-width: 700px;
  width: 90%;
  margin-top: 15%;
}
.reg_success .logo {
  position: absolute;
  width: 90px;
  top: 10px;
  left: 10px;
}
.reg_success .m1 {
  direction: rtl;
  font-family: 'Cairo';
  font-weight: 700;
  font-size: 25px;
  align-items: center;
  text-align: center;
  color: #000;
}
.reg_success .m2 {
  font-family: 'Cairo';
  font-weight: 600;
  font-size: 20px;
  align-items: center;
  text-align: center;
  color: #000;
  direction: rtl;
}
#err_msg {
  color: red;
  font-family: 'Cairo';
  font-weight: 700;
  font-size: 25px;
  text-align: center;
  margin: 20px 0;
}
</style>

<center>
  <div class="reg_success">
    <div class="div-1">
      <img class="logo" src="https://ur-path.com/images/untitled-1-01-2.png" alt="UR PATH Logo">

      <div class="m1">
        <br><br><br><br>
        <center>مرحبا بك في <font color="#7ACAB6">UR PATH</font></center>
      </div>

      <div id="err_msg">
        <?php
        if ($stmt->execute()) {
            echo "✅ تم إدخال البيانات بنجاح!";
        } else {
            echo "❌ حدث خطأ: " . $stmt->error;
        }
        ?>
      </div>

      <center><br><br>
        <div class="m2">
          يسعدنا انضمامك إلينا !<br>
          لقد تم إنشاء حسابك بنجاح<br>
          <img src="../images/dots.png" alt="Loading Dots">
        </div>
      </center>
    </div>
  </div>
</center>
