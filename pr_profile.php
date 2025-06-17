<?php session_start(); ?>
<html>
    <head>
        <title>   ملفي الشخصي  </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/globals.css" />
    <link rel="stylesheet" href="assets/styleguids.css" />
    <link rel="stylesheet" href="assets/pr_profile.css" />
    <link rel="stylesheet" href="assets/hf/hf_style.css" />
    <link rel='stylesheet' href='assets/hf/logged_nav.css' />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <style>
    @font-face {
  font-family: 'Wafeq';
  src: url('assets/fonts/Wafeq-Medium.otf') format('opentype');
}
</style>

            <?php 
         include "admin/db.php";
         include 'inc/header.php';
          include 'inc/profile/update_user_image.php'; 
          include 'inc/profile/user_srvs.php';
          include "inc/profile/upload_work_files.php";




          if (!$_SESSION['email'] || !$_SESSION['password']) {
             // header("Location:login.php");
          }

 
       ///////// Update about me ////////////
       if($_POST['about_me']){
        $about_me=strip_tags($_POST['about_me']);
        $update_about_me=$conn->prepare("UPDATE users SET about_me=? where id=?") or die("Err -854");
        $update_about_me->bind_param("si",$about_me,$user_l['id']);
        $update_about_me->execute();
       }
       /////// Provide_SRV //////////////////
       if($_POST['provide_srv']){
        $my_srv=strip_tags($_POST['provide_srv']);
        $update_my_srv=$conn->prepare("UPDATE users SET my_srv=? where id=?") or die("Err -854");
        $update_my_srv->bind_param("si",$my_srv,$user_l['id']);
        $update_my_srv->execute();
       }
 /////// Update Before Order //////////////////
 if($_POST['before_order']){
    $b_order=strip_tags($_POST['before_order']);
    $update_before_order=$conn->prepare("UPDATE users SET before_order=? where id=?") or die("Err -854");
    $update_before_order->bind_param("si",$b_order,$user_l['id']);
    $update_before_order->execute();
   }
    /////// Update  Tags //////////////////
 if($_POST['tags_box']){
    $tags_box=strip_tags($_POST['tags_box']);
    $update_tags=$conn->prepare("UPDATE users SET my_tags=? where id=?") or die("Err -854");
    $update_tags->bind_param("si",$tags_box,$user_l['id']);
    $update_tags->execute();
   }

     ///////  Add YouTube Link //////////////////
 if($_POST['youtube_link']){
    $you_tube_link=strip_tags($_POST['youtube_link']);
    $yt_link=$conn->prepare("INSERT INTO pr_my_works(file_link,`u_id`,file_type) values(?,?,?) ") or die("Err -854");
    $f_type='youtube';
    $yt_link->bind_param("sis",$you_tube_link,$user_l['id'],$f_type);
    $yt_link->execute();
   }
   ////////////////// Upload Work Files //////////////////
   if($_POST['work_file']){include 'inc/profile/upload_work_files.php';}
  ////////////////// Upload Org Docs Files //////////////////
  if($_GET['d_type'] && $_GET['d_type'] ==1){include 'inc/profile/upload_org_docs_sjl.php';}
  ////////////////// Upload Sjl File //////////////////
  if($_GET['d_type'] && $_GET['d_type'] ==2){include 'inc/profile/upload_org_docs_free_lancer.php';}
  ////////////////// Upload Tax File //////////////////
  if($_GET['d_type'] && $_GET['d_type'] ==3){include 'inc/profile/upload_org_docs_tax.php';}
  ////////////////// Upload Maroof File //////////////////
  if($_GET['d_type'] && $_GET['d_type'] ==4){include 'inc/profile/upload_org_docs_maroof.php';}









    ?>

    <div class="overlay" id="overlay"></div>

<center> <div class='main_div'>

    <div class='title'>
    <div class='title_text'>    ملفك الشخصي    </div>
    </div> <br><br><br><br>
<div class='desktop_view'>

   <div class='user'>
         
         <div><center>
            <img class='u_img' src="<?="uploads/".$user_l['u_img']; ?>" alt=""><br>
            <button class='change_image' onclick="open_form()">تغيير الصورة</button></center>
        </div>
         <div class='username'><?=$user_l['f_name']." ".$user_l['l_name'];?>
          
       


<div class='rate_and_views_2'>
       
    <img class="star" src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt="">
    <br><br>
     <font>التعليقات والمراجعات</font>   (<font color='red'>0</font>)<br><br>
     <font> تم تنفيذ  </font>   (<font color='red'>0</font>) مشروع <br><br>
     <font>الرقم الضريبي  :</font>  <font color='green'>7377236</font>


    
    
</div> 

 

     




         </div> <!--       -->

        
 
</div> </div> <!-- End Of desktop view -->














<div class='mobile_view'><br><br><br>
<img class='u_img' src="<?="uploads/".$user_l['u_img']; ?>" alt=""><br>
<button class='change_image' onclick="open_form()">تغيير الصورة</button><br><br>
<div class='username'><?=$user_l['f_name']." ".$user_l['l_name'];?></div> 


<div class='m_rate_and_views_2'> 

    <img class="star"  src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt=""><br><br>
    <font>التعليقات والمراجعات</font>   (<font color='red'>0</font>)
  
    <br><br>
     
     <font> تم تنفيذ  </font>   (<font color='red'>0</font>) مشروع <br><br>
     <font>الرقم الضريبي  :</font>  <font color='green'>7377236</font>

     
    
    
</div>








 


<!------------->

<!--------------> 


</div>
<!-------------> 
<br><br><br><br>

<div class="about_me1_container">

  <div class="about_me1">نبذة عني . . .</div>

  <!-- هنا يجب أن تكون الحاوية النسبية -->
  <div class="textarea_wrapper">
    <textarea class="textarea_box1" id="about_me_box">
      <?=$user_l['about_me'];?>
    </textarea>

    <!-- زرّ التعديل -->
    <img
      id="about_me_edit_open"
      src="images/edit_btn.png"
      alt="تعديل"
      class="textarea_edit_btn"
    >
  </div> <!-- نهاية textarea_wrapper -->

</div> <!-- نهاية about_me1_container -->

<div class="edit_btns" id="edit_about_btns" style="display: none;">
  <div class="btns">
    <button class="cancle_btn">إلغاء</button>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <button id="update_about_me" class="save_btn">حفظ التغيرات</button>
  </div>
</div>

<!-------------------->

<div class='sjl_container'>

<div class='div_a1'>  أضف السجل التجاري   ( <font style='font-size:12px'> اختياري </font>)  </div>
<div class="doc_status"><?php echo doc_status($conn,$user_l['id'],"sjl","doc_status");  ?></div>

<div class="input_wrapper">
<input id='code_sjl' type="text" class='field_1' placeholder="لايوجد شيء حتى الان" value="<?php echo user_docs($conn,$user_l['id'],"sjl","doc_num"); ?>">


<img id='edit_sjl' src="images/edit_btn.png" class='input_edit_btn'>
</div>

<?php if ( user_docs($conn, $user_l['id'], "sjl", "doc_num") ): ?>
  <div class="doc_btns_wrapper">
    <a href="uploads/<?= user_docs($conn, $user_l['id'], "sjl", "doc_name") ?>">
      <button class="doc_btn">ملف الوثيقة</button>
    </a>
    <button id="del_doc_sjl" class="doc_del_btn">حذف</button>
  </div>
<?php endif; ?>
 </div>
<div class="clearfix"></div>



<!-------------------->
<div class='freelancer_container'>

<div class='div_a2'>  اضف وثيقة العمل الحر     ( <font style='font-size:12px'> اختياري </font>) </div>
<div class="doc_status"><?php echo doc_status($conn,$user_l['id'],"free_lancer","doc_status");  ?></div>

<div class="input_wrapper">
<input id='code_free_lancer' type="text" class='field_1' placeholder="لايوجد شيء حتى الان" value="<?php echo user_docs($conn,$user_l['id'],"free_lancer","doc_num"); ?>">

<img id='edit_free_lancer' src="images/edit_btn.png" alt="" class='input_edit_btn'>
</div>
<?php if ( user_docs($conn, $user_l['id'], "free_lancer", "doc_num") ): ?>
  <div class="doc_btns_wrapper">
    <a href="uploads/<?= user_docs($conn, $user_l['id'], "free_lancer", "doc_name") ?>">
      <button class="doc_btn">ملف الوثيقة</button>
    </a>
    <button id="del_doc_free_lancer" class="doc_del_btn">حذف</button>
  </div>
<?php endif; ?>
</div>

<div class="clearfix"></div>


<!-------------------->
<div class='vat_container'>

<div class='div_a3'>     اضف رقمك الضريبي   ( <font style='font-size:12px'> اختياري </font>) </div>
<div class="doc_status"><?php echo doc_status($conn,$user_l['id'],"tax","doc_status");  ?></div> 
<div class="input_wrapper">
<input id='code_tax' type="text" class='field_1' placeholder="لايوجد شيء حتى الان" value="<?php echo user_docs($conn,$user_l['id'],"tax","doc_num"); ?>">

<img id='edit_tax_number' src="images/edit_btn.png" alt="" class='input_edit_btn'>
</div>
<?php if ( user_docs($conn, $user_l['id'], "tax", "doc_num") ): ?>
  <div class="doc_btns_wrapper">
    <a href="uploads/<?= user_docs($conn, $user_l['id'], "tax", "doc_name") ?>">
      <button class="doc_btn">ملف الوثيقة</button>
    </a>
    <button id="del_doc_tax" class="doc_del_btn">حذف</button>
  </div>
<?php endif; ?>
</div><div class="clearfix"></div> 


<!-------------------->
<div class='m3roof_container'>

<div class='div_a4'>    شهادة منصة "معروف"  ( <font style='font-size:12px'> اختياري </font>)</div>
<div class="doc_status"><?php echo doc_status($conn,$user_l['id'],"maroof","doc_status");  ?></div>

<div class="input_wrapper">
<input id='code_maroof' type="text" class='field_1' placeholder="لايوجد شيء حتى الان" value="<?php echo user_docs($conn,$user_l['id'],"maroof","doc_num"); ?>">

<img id='edit_maroof' src="images/edit_btn.png" alt="" class='input_edit_btn'>
</div>
<?php if ( user_docs($conn, $user_l['id'], "maroof", "doc_num") ): ?>
  <div class="doc_btns_wrapper">
    <a href="uploads/<?= user_docs($conn, $user_l['id'], "maroof", "doc_name") ?>">
      <button class="doc_btn">ملف الوثيقة</button>
    </a>
    <button id="del_doc_maroof" class="doc_del_btn">حذف</button>
  </div>
<?php endif; ?>
</div><div class="clearfix"></div>




<!-------------------->

 <div class='div_4a'>
<div class='div_2a'>  العناوين الرئيسية  </div> 
 <div class="note_1"> (
    <font  color="#F00">  تذكر ! </font>
 اختيارك للعناوين الرئيسية التي تناسب طبيعة أعمالك يسهل عملية الوصول إليك   
    )</div> </div>
<br> 
<div class='main_title'> <img id="edit_main_topics" src="images/Add.png" alt="" style="cursor: pointer;">
   &nbsp;&nbsp;  اضافة / حذف عنوان رئيسي     </div><br><br><br>
<div id='srv_menu_lst' class='div_3'>     </div>
<br><br><br><br><br><br>

<!-------------------->

<!-- بداية قسم "الخدمات المقدمة" -->
<div class="div_4b">

  <!-- عنوان القسم -->
  <div class="div_2b">الخدمات المقدمة</div>
  <!-- الوصف الصغير أسفل العنوان -->
  <div class="note_1">( اكتب وصف مبسط للخدمات التي تقدمها )</div>

  <!-- الحاوية النسبية التي تضمّ textarea وزرّ التعديل -->
  <div class="textarea_wrapper">
    <textarea class="textarea_box2" id="provide_services_box" readonly>
<?=$user_l['my_srv'];?>
    </textarea>
    <img
      id="edit_provide_services"
      src="images/edit_btn.png"
      alt="تعديل"
      class="textarea_edit_btn"
    >
  </div>

</div>
<!-- نهاية div_4b -->

<!-- أزرار "إلغاء" و"حفظ التغيرات" مخفية في البداية -->
<div class="edit_btns" id="edit_provide_services_btns" style="display: none;">
  <div class="btns">
    <button class="cancle_btn">إلغاء</button>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <button id="srv_save_btn" class="save_btn">حفظ التغيرات</button>
  </div>
</div>

<br><br><br><br><br>

<!-------------------->


<div class='div_2c'>  نماذج من اعمالي    </div>
 <br><br><br>
<div class='main_title'> <img id="edit_my_works" src="images/edit_btn.png" alt="" style="cursor: pointer;">
   &nbsp;&nbsp;  إضافة وحذف نماذج الإعمال         </div><br><br><br>
<div class='my_works'><?php include 'inc/profile/last_my_works.php'; ?></div>
<br><br><br><br><br><br>

<!-------------------->
<!-- بداية قسم "التعليمات للعملاء" -->
<div class="div_4c">

  <!-- عنوان القسم -->
  <div class="div_2d">تعليمات للعملاء</div>
  <!-- الوصف الصغير أسفل العنوان -->
  <div class="note_1">( اكتب تعليمات لعملائك قبل البدء بطلب الخدمة )</div>

  <!-- الحاوية النسبية التي تضمّ textarea وزرّ التعديل -->
  <div class="textarea_wrapper">
    <textarea class="textarea_box3" id="before_order_box" readonly>
<?=$user_l['before_order'];?>
    </textarea>
    <img
      id="edit_before_order"
      src="images/edit_btn.png"
      alt="تعديل"
      class="textarea_edit_btn"
    >
  </div>

</div>
<!-- نهاية div_4c -->

<!-- أزرار "إلغاء" و"حفظ التغيرات" مخفية في البداية -->
<div class="edit_btns" id="edit_before_order_btns" style="display: none;">
  <div class="btns">
    <button class="cancle_btn">إلغاء</button>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <button id="before_save_btn" class="save_btn">حفظ التغيرات</button>
  </div>
</div>

<br><br><br><br><br><br>

<!-------------------->

<!-- بداية قسم "الوسوم" -->
<div class="div_4D">

  <!-- عنوان القسم -->
  <div class="div_2d">الوسوم</div>
  <!-- الوصف الصغير أسفل العنوان -->
  <div class="note_1">( تفيد الوسوم في إيجادك في البحث)</div>

  <!-- الحاوية النسبية التي تضمّ textarea وزرّ التعديل -->
  <div class="textarea_wrapper">
    <textarea class="textarea_box4" id="tags_box">
<?=$user_l['my_tags'];?>
    </textarea>
    <img
      id="edit_tags"
      src="images/edit_btn.png"
      alt="تعديل"
      class="textarea_edit_btn"
    >
  </div>

</div>
<!-- نهاية div_4D -->

<!-- أزرار "إلغاء" و"حفظ التغيرات" مخفية في البداية -->
<div class="edit_btns" id="tags_btns" style="display: none;">
  <div class="btns">
    <button class="cancle_btn">إلغاء</button>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <button id="tags_save_btn" class="save_btn">حفظ التغيرات</button>
  </div>
</div>


<!-------------------->

<br><br><br><br><br><br><br>



<!---Update Sjl---->
<div id="update_sjl" class='edit_form'><br><br><br>
    <table class='table_1'>
        <tr>
            <td> <div class='lable_1'> ادخل رقم السجل التجاري  </div>  </td>
            <td>   &nbsp;&nbsp;&nbsp;    </td>
            <td> <input id="sjl_num" type="text" class='field_2' placeholder="ادخل الرقم هنا">   </td>
        </tr>
        <tr>
            <td> <center><br>
                 <div  id='select_sjl' class='lable_2'>قم باختيار ملف الوثيقة     <img src="images/Add.png">    </div>
                 <font class='note_1'> (يجب أن يكون الملف من نوع صورة أو PDF )    </font><br>
                 <input id='upload_sjl' type="file" style="display:none;"> 
        
        </center> </td>

            <td>   &nbsp;&nbsp;&nbsp;    </td>
            <td id='sjl_changes'>  <?php echo user_docs($conn,$user_l['id'],"sjl","doc_name"); ?>  </td>
        </tr>    
        
      
          
      
    </table>


    <br><br><br><br><br>
    <table class='table_2'><tr><td><center>  <button id='sjl_done' class="ok_btn">موافق</button> </center> </td>
        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
         <td> <center> <button id="close_edit_btn" class="close_btn_2">إلغاء</button> </center> </td>
</tr>
</table>
    <br><br><br>
</div>
<!-- End Of Table -->


<!---Free lancer ---->
<div id="free_lancer" class='edit_form'><br><br><br>
<table class='table_1'>
        <tr>
            <td> <div class='lable_1'>    ادخل رقم وثيقة العمل الحر      </div>  </td>
            <td>   &nbsp;&nbsp;&nbsp;    </td>
            <td> <input id="free_lancer_num" type="text" class='field_2' placeholder="ادخل الرقم هنا">   </td>
        </tr>
        <tr>
            <td> <center><br>
                 <div  id='select_free_lancer' class='lable_2'>قم باختيار ملف الوثيقة     <img src="images/Add.png">    </div>
                 <font class='note_1'> (يجب أن يكون الملف من نوع صورة أو PDF )    </font><br>
                 <input id='upload_free_lancer' type="file" style="display:none;">
        
        </center> </td>
            <td>   &nbsp;&nbsp;&nbsp;    </td>
            <td id='free_lancer_changes'>  <?php echo user_docs($conn,$user_l['id'],"free_lancer","doc_name"); ?>  </td>
        </tr>    
         
    </table>

    <br><br><br><br><br>
    <table class='table_2'><tr><td><center>  <button id='free_lancer_done' class="ok_btn">موافق</button> </center> </td>
        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
         <td> <center> <button id="close_edit_btn" class="close_btn_2">إلغاء</button> </center> </td>
</tr>
</table>
    <br><br><br>
</div>
<!-- End Of Table -->



<!---  Tax Number ---->
<div id="tax_number" class='edit_form'><br><br><br>
<table class='table_1'>
        <tr>
            <td> <div class='lable_1'>   ادخل رقمك الضريبي         </div>  </td>
            <td>   &nbsp;&nbsp;&nbsp;    </td>
            <td> <input id="tax_num" type="text" class='field_2' placeholder="ادخل الرقم هنا">   </td>
        </tr>
        <tr>
            <td> <center><br>
                 <div  id='select_tax' class='lable_2'>قم باختيار ملف الوثيقة     <img src="images/Add.png">    </div>
                 <font class='note_1'> (يجب أن يكون الملف من نوع صورة أو PDF )    </font><br>
                 <input id='upload_tax' type="file" style="display:none;">
        
        </center> </td>
            <td>   &nbsp;&nbsp;&nbsp;    </td>
            <td id='tax_changes'>  <?php echo user_docs($conn,$user_l['id'],"tax","doc_name"); ?>  </td>
        </tr>    
              
    </table>

    <br><br><br><br><br>
    <table class='table_2'><tr><td><center>  <button id='tax_done' class="ok_btn">موافق</button> </center> </td>
        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
         <td> <center> <button id="close_edit_btn" class="close_btn_2">إلغاء</button> </center> </td>
</tr>
</table>
    <br><br><br>
</div>
<!-- End Of Table -->


<!---   Maroof  ---->
<div id="maroof" class='edit_form'><br><br><br>
<table class='table_1'>
        <tr>
            <td> <div class='lable_1'>   ادخل رقم وثيقة معروف             </div>  </td>
            <td>   &nbsp;&nbsp;&nbsp;    </td>
            <td> <input id="maroof_num" type="text" class='field_2' placeholder="ادخل الرقم هنا">   </td>
        </tr>
        <tr>
            <td> <center><br>
                 <div  id='select_maroof' class='lable_2'>قم باختيار ملف الوثيقة     <img src="images/Add.png">    </div>
                 <font class='note_1'> (يجب أن يكون الملف من نوع صورة أو PDF )    </font><br>
                 <input id='upload_maroof' type="file" style="display:none;">
        
        </center> </td>
            <td>   &nbsp;&nbsp;&nbsp;    </td>
            <td id='maroof_changes'>  <?php echo user_docs($conn,$user_l['id'],"maroof","doc_name"); ?>  </td>
        </tr>    
        
            
    </table>

    <br><br><br><br><br>
    <table class='table_2'><tr><td><center>  <button id='maroof_done' class="ok_btn">موافق</button> </center> </td>
        <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
         <td> <center> <button id="close_edit_btn" class="close_btn_2">إلغاء</button> </center> </td>
</tr>
</table>
    <br><br><br>
</div>
<!-- End Of Table -->



<!---   Main Topic  ---->
<div id="main_topics" class='edit_form'><br><br><br>
    <table class='table_1'>
        <tr>
            <td>  <center><div class='lable_1' style='max-width:170px;font-size:13px;'>   اختر عنوان رئيسي جديد  </div>  </center> </td>
            <td>   &nbsp;&nbsp;&nbsp;    </td>
            <td> 
        <center><select id="srvs_menu" class='my_select'>
          <?php
            $srv_q=mysqli_query($conn,"select * from main_srvs") or die("Error");
            while($srv_row=mysqli_fetch_array($srv_q)){
                echo "<option value='".$srv_row['id']."'>".$srv_row['srv_name']."</option> ";
            }
          ?>
        </select>        </center>
        </td>

        <td>   &nbsp;&nbsp;&nbsp;    </td>
        
            <td> <center>
                 <div id='add_main_srv' class='lable_2'  style='max-width:100px;font-size:13px;padding: 4px;'>  إضافة    <img src="images/Add.png" alt="" style="cursor: pointer;">
    </div>
            </center> 
           </td>
           
          
        </tr>    
        
         
    </table>   <br><br><br>
          <div id='user_srvs_list' style="font-size:17px;font-width:700;font-family:'Wafeq'"></div>
     <br><br><br><br><br>
            <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
         <td> <center> <button id="close_edit_btn" class="close_btn_2">حفظ و إغلاق</button> </center> </td>
</tr>
</table>
    <br><br><br>
</div>
<!-- End Of Table -->



<!---    My Works    ---->
<div id="my_works" class='edit_form'><br><br><br>
    <table class='table_1'>
        <tr>
            <td>  <center><div class='lable_1' style='max-width:170px;font-size:13px;'>    اختر ملف </div>  </center> </td>
            <td>   &nbsp;&nbsp;&nbsp;    </td>
            <td> 
        <center><select id="add_my_works" class='my_select' >
            <option value="add_file" class='my_select'>  ملف    </option> 
            <option value="youtube" class='my_select'> YouTube </option>
        </select>        </center>
        </td>

        <td>   &nbsp;&nbsp;&nbsp;    </td>
        
            <td> <center>
                 <div id='add_works' class='lable_2'  style='max-width:100px;font-size:13px;padding: 4px;'>  إضافة    <img src="images/Add.png" alt="" style="cursor: pointer;">
    </div>
            </center> 
           </td>
           
          
        </tr>    
        
         
    </table>   
     <br><br>
     <div id='works_lst'></div>
     <br><br><br>
    <table class='table_2'><tr><td><center>  <button id="ok_btn" class="ok_btn">إغلاق</button>
 </center> </td>
        </tr>
</table>
    <br><br><br>
</div>
<!-- End Of Table -->








<!--Upload  Forms--------> 
<div class="upload_form" id="upload_form">
<button class="close_btn" onclick="close_form()">X</button>

<br><br>
<button class="update_img" id="update_img"> تغيير </button> 
<input type="file" id="file" name="file" class="file"> 
</div>


<!----------Upload My Works ------> 
<div class="upload_form" id="upload_my_works">
<br><br> 
<input type="file" id="work_file" name="work_file" class="file"> 
<br><br><br><br>
<table>
    <tr>
    <td><button id="close_edit_btn"  class="close_btn_2" onclick="close_form()">إلغاء</button></td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><button id="upload_work_file" class="insert_btn">إدراج</button></td>
        <td></td>
 
    </tr>
</table>


</div>


<!-----Add_youtube_link------>
<div class="upload_form" id="add_link">
 

<br><br>
 
<input type="text" id="youtube_link" name="youtube_link" class="file" placeholder='youtube.com' style='max-width:150px;'> 
<lable style="font-size:17px;font-family:'Wafeq';"> ادخل الرابط  </lable>

<br><br><br><br>
<table>
    <tr>
    <td><button id="close_edit_btn"  class="close_btn_2" onclick="close_form()">إلغاء</button></td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td><button id="add_youtube_link" class="insert_btn">إدراج</button></td>
        <td></td>
 
    </tr>
</table>
</div>



<!--End-Of-Main_Div-->
<?php 
/*-----------------------------User Docs---------------------------*/
function user_docs($conn,$uid,$val,$col){
    
    $doc_q=mysqli_query($conn,"SELECT * from org_docs where u_id=$uid and doc_type='".$val."' ") or die("er -541");
    $row =mysqli_fetch_array($doc_q);
    $data = $row[$col];
    return $data;
    }
/*-----------------------------Doc Status---------------------------*/
function doc_status($conn,$uid,$val,$col){
    
    $doc_q=mysqli_query($conn,"SELECT * from org_docs where u_id=$uid and doc_type='".$val."' ") or die("er -541");
    $row =mysqli_fetch_array($doc_q);
    $data = $row[$col];
    switch($data){
            case 'waitting':
                echo "<font color='blue'> جاري عملية التحقق </font> ";
                break;

            case 'accepted':
                echo "<font color='green'>    تم التحقق   </font> ";
                break;
 
            case 'rejected':
               echo "<font color='red'>    مرفوض     </font> ";
                  break;
          
            default :

             break;

    }
    }
    /*------------------------------------------------------------------------*/          
    

?>
</div></body>
    <script src="js/my_profile.js"></script>
    <script src="js/pr_profile.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    
    <?php include "inc/footer.php"; ?>
</html>
