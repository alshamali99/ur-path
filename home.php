
<?php 
ob_start();
session_start();?>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/globals.css" />
    <link rel="stylesheet" href="assets/styleguide.css" />
    <link rel="stylesheet" href="assets/home_style.css" />
    <link rel="stylesheet" href="assets/hf/hf_style.css" />
    <link rel='stylesheet' href='assets/hf/logged_nav.css' />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  </head>
  <body>
    <?php
    include "admin/db.php";
    include 'inc/header.php';  ?>

<br><br><br>
 



<label class="search-box" for="search-input">
  <input id="search-input" class="text-wrapper" 
         type="text" placeholder=" البحث ..." />
</label>
  <div class="page-content-wrapper">



<center>
<?php   
if($_SESSION['email']){
// Start Of Works Table   ?>
<br><br><br>


<div class='desktop_work_table'>
  <table>
    <tr>


      <td class='u_td1'><div class='u_username'><?php echo $user_l['f_name']." ".$user_l['l_name'] ?></div></td>
      <td class='u_td1'><img src="images/sad.jpeg" class='u_image'></td>
    </tr>
  </table><br>

   
<table>
  <tr>
    <td><div class='work_tb_desk_td_1'> أعمال جار العمل عليها </div></td>
    <td><div class='work_tb_desk_td_1'>أعمال بانتظار الاستلام</div></td>
    <td><div class='work_tb_desk_td_1'>فواتير لم تدفع بعد</div></td>
  </tr>

  <tr>
    <td><div class='work_tb_desk_td_2'>0   </div></td>
    <td><div class='work_tb_desk_td_2'>0</div></td>
    <td><div class='work_tb_desk_td_2'>0</div></td>
  </tr>
</table>
</div>

<br><br><br><br>
 
<div class='mobile_work_table'>

<center>
<img src="images/sad.jpeg" class='u_image'><br><br>
<div class='u_username'><?php echo $user_l['f_name']." ".$user_l['l_name'] ?></div><br>


  <table style="width:220px;direction:rtl;">
    <tr>
      <td><div class='work_tb_desk_td_1'>  فواتير لم تدفع  </div> </td>
      <td><div  class='work_tb_desk_td_2'>  0   </div>  </td>    
    </tr>
    <tr>
      <td><div  class='work_tb_desk_td_1'>  أعمال بانتظار الاستلام   </div></td>
      <td class='work_tb_desk_td_2'> 0      </div></td>
    </tr>
    <tr>
      <td><div  class='work_tb_desk_td_1'>  أعمال جار العمل عليها  </div> </td>
      <td><div  class='work_tb_desk_td_2'>   0    </div></td>
       
    </tr>
   
  </table>
</center>
</div>
 

<br><br><br>
<div class='main_msg1'> استكشف القائمة الرئيسية للخدمات و اختر ما يناسبك منها   </div>
<br><br><br>

<?php

/*End Of Desktop Works Table*/     }


?>
<!-- Services ------ -->
<div class="container"> 
  

 <div class="frame"><a href="services_list.php?cat=1"> 
      <div class="element"><img class="img" src="images/serv-1.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper">        تطوير المواقع والتطبيقات وقواعد البيانات      </p></div>
    </a></div>


 <div class="frame"><a href="services_list.php?cat=2"> 
      <div class="element"><img class="img" src="images/serv-2.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper">      خدمات التصميم   </p></div>
   </a></div>

 <div class="frame"><a href="services_list.php?cat=3"> 
      <div class="element"><img class="img" src="images/serv-3.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper">      خدمات التعليم والمساندة الأكاديمية   </p></div>
   </a> </div>

 <div class="frame"><a href="services_list.php?cat=4"> 
      <div class="element"><img class="img" src="images/serv-4.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper"> خدمات الموشن جرافيك والإنفوجرافيك  </p></div>
    </a></div>

 <div class="frame"><a href="services_list.php?cat=5"> 
      <div class="element"><img class="img" src="images/serv-5.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper">  تصميم الحملات التسويقية  </p></div>
   </a></div>

 <div class="frame"><a href="services_list.php?cat=6"> 
      <div class="element"><img class="img" src="images/serv-6.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper">   إنتاج الفيديو, الرسوم المتحركة,والمونتاج  </p></div>
    </a></div>

 <div class="frame"><a href="services_list.php?cat=7"> 
      <div class="element"><img class="img" src="images/serv-7.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper"> خدمات التعليق الصوتي  </p></div>
    </a></div>

 <div class="frame"><a href="services_list.php?cat=8"> 
      <div class="element"><img class="img" src="images/serv-8.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper">  خدمات الخطوط والرسم الفني    </p></div>
   </a></div>

 <div class="frame"><a href="services_list.php?cat=9"> 
      <div class="element"><img class="img" src="images/serv-8.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper">          تصميم الفلاتر والحالات والقصة       </p></div>
   </a> </div>

 <div class="frame"><a href="services_list.php?cat=10"> 
      <div class="element"><img class="img" src="images/serv-10.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper"> الموسيقى والهةية السمعية  </p></div>
    </a></div>

 <div class="frame"><a href="services_list.php?cat=11"> 
      <div class="element"><img class="img" src="images/serv-11.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper">      تصميم الشعارات والهوية البصرية   </p></div>
    </a></div>

 <div class="frame"><a href="services_list.php?cat=12"> 
      <div class="element"><img class="img" src="images/serv-12.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper">     خدمة الترجمه والدبلجة الصوتي     </p></div>
   </a> </div>

 <div class="frame"><a href="services_list.php?cat=13"> 
      <div class="element"><img class="img" src="images/serv-13.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper"> تصميم واجهات تجربة المستخدم   </p></div>
    </a></div>

 <div class="frame"><a href="services_list.php?cat=14"> 
      <div class="element"><img class="img" src="images/serv-14.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper">  تحرير النص وكتابة المحتوى   </p></div>
    </a></div>

 <div class="frame"><a href="services_list.php?cat=15"> 
      <div class="element"><img class="img" src="images/serv-15.png" /></div>
      <div class="div-wrapper"><p class="text-wrapper">   تحليل البيانات وتقارير الآداء    </p></div>
   </a> </div>

</div>

 <!-- End of contrainer -->
<!-- End of Service list ---- -->





 
<br><br>

</div>

<?php include 'inc/footer.php'; ?>






  </body>
</html>