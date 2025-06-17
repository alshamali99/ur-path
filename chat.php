
<?php 
ob_start();
session_start();?>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/globals.css" />
    <link rel="stylesheet" href="assets/styleguide.css" />
    <link rel="stylesheet" href="assets/chat.css" />
    <link rel="stylesheet" href="assets/hf/hf_style.css" />
    <link rel='stylesheet' href='assets/hf/logged_nav.css' />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<title>محادثة</title> 
</head>
 
  <body>
    <?php
    include "admin/db.php";
    include 'inc/header.php';  ?>

<br><br> 
 
 <?php
 
?>
        <style>
    @font-face {
  font-family: 'Wafeq';
  src: url('assets/fonts/Wafeq-Medium.otf') format('opentype');
}
</style>
<div class="overlay" id="overlay"></div>
<center> 
<div class="cp" id='user_panel'> لوحة تحكم المشروع       </div>
<br>
<div id='chat_view'>
<div class="main"><br>


<div class="alert_msg"> <font color="red">النظام</font> لتجنب عمليات الاحتيال تجنب مشاركة أرقام الهواتف أو البريد الإلكتروني الشخصي أو أي وسيلة تواصل خارج المنصة </div>
<div class="alert_msg"> <font color="red">النظام</font>     لتجنب عمليات الاحتيال لا تقم بالدفع خارج المنصة و إذا تم طلب ذلك قم بالتبليغ فورا من خلال أيقونة التبليغ في الأسفل   </div>
<br><br>

<div class="msg_block"> 
  <div class="user">SaadMar</div> 
  <div class="msg_content">نص الرسالة نص الرساله تجربه نص الرساله </div>
</div><br>



<div class="msg_block"> 
  <div class="user">SaadMar</div> 
  <div class="msg_content">نص الرسالة نص الرساله تجربه نص الرساله </div>
</div><br>

 

<div class="msg_block"> 
  <div class="user">SaadMar</div> 
  <div class="msg_content"> 
<font class="file_div">64223.jpg</font> <font class="file_div">64223.jpg</font>    
</div>
</div><br>



<div class="msg_block"> 
  <div class="user">SaadMar</div> 
  <div class="msg_content">نص الرسالة نص الرساله تجربه نص الرساله </div>
</div><br>



<div class="msg_block"> 
  <div class="user">SaadMar</div> 
  <div class="msg_content">نص الرسالة نص الرساله تجربه نص الرساله </div>
</div><br>



  
<div class="alert_msg"> <font color="red">النظام</font>  تم تعديل الطلب رقم (22) متبقي (2) تعديلات مجانية </div>




<br></div><!-- End Of Main-Div -->   
 
<div class="send_msg_div">

<input type="text" class="msg_box">&nbsp;&nbsp;
<img id="open_send_file" src="images/file1.png" class='open_send_file'>&nbsp;
<button class="send_msg_btn">ارسال</button>
<button class="send_msg_btn_m"> <img src="images/telegram_btn.png" style="width: 50px;"> </button>
</div>


<div class="send_msg_div" style="width:99% ;direction:ltr;color:darkred;"> 
تبليغ<img class="chat_report" src="images/warning1.png" > 
</div>

 
<!-- SendFile -->
 <div id="send_file" class="send_file"> 
 <div class="select_file">
  <img src="images/plus_btn.png" class='plus_icon'>
  &nbsp;&nbsp;&nbsp;&nbsp;
 <font> اختر ملف  </font>

 </div>
 <br><br><br>

 <table><tr>
<td><button id="close_btn" class='close_btn'>إلغاء</button></td>
  <td>&nbsp; &nbsp; &nbsp; </td>
<td><button class='ok_btn'>موافق</button></td>
</table>
   <br> 
 </div>



   </div><!--  End Of chat_view -->



<!-- Control Panel -->
 <center>
  <div class="control_panel" id="control_panel">
    <?php 
 
      include 'inc/project_func/cp_pr.php';
    
    ?>
</div>
</center>
<!----------------->
<br><br><br> 
 
<?php include 'inc/footer.php'; ?>




 

  </body>




  <script src='js/chat.js'></script>
</html>