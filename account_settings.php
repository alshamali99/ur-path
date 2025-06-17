<?php session_start(); ?>
<html>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/globals.css" />
    <link rel="stylesheet" href="assets/styleguide.css" />
    <link rel="stylesheet" href="assets/account_settings.css" />
    <link rel="stylesheet" href="assets/hf/hf_style.css" />
    <link rel='stylesheet' href='assets/hf/logged_nav.css' />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

    <title>خيارات الحساب</title>
    </head>

    <body>
            <?php 
         include "admin/db.php";
         include 'inc/header.php';
          


 

          if (!$_SESSION['email'] || !$_SESSION['password']) {
              header("Location:login.php");
          }



          /*----------Update Email--------- */
          if (!empty($_POST['update_email'])) {
            $email = strip_tags($_POST['update_email']);
            $update_email = $conn->prepare("UPDATE users SET email=? WHERE id=?") or die("Email -Err 652");
            $update_email->bind_param("si", $email, $user_l['id']);
            $update_email->execute();
        }
          /*----------Update Password--------- */
          if (!empty($_POST['update_pass'])) {
            $pass = strip_tags($_POST['update_pass']);
            $update_pass = $conn->prepare("UPDATE users SET `password`=? WHERE id=?") or die("pass -Err 652");
            $update_pass->bind_param("si", $pass, $user_l['id']);
            $update_pass->execute();
        }
        
          /*----------Update PhoneNumber--------- */
          if (!empty($_POST['update_phone'])) {
            $phone = strip_tags($_POST['update_phone']);
            $update_phone = $conn->prepare("UPDATE users SET phone_number=? WHERE id=?") or die("phone -Err 652");
            $update_phone->bind_param("si", $phone, $user_l['id']);
            $update_phone->execute();
        }
                
        ?>
          <div class='overlay' id='overlay'></div>
          <center>
            <div class='title'><div class='title_text'>خيارات الحساب       </div></div>
            <br><br><br>

           <div class='desktop_view'>

            <div class='desktop_username'>
            <div class='user'>
            <img src="/uploads/<?=$user_l['u_img'];?>" class='u_img' alt="">
                <div class='username'> <?=$user_l['f_name']." ".$user_l['l_name'];?> </div> 
            </div>
        </div>



        <div class='mobile_username'>
           
            <img src="/uploads/<?=$user_l['u_img'];?>" class='u_img' alt=""><br><br><br><br>
                <div class='username'> <?=$user_l['f_name']." ".$user_l['l_name'];?> </div> 
            
        </div>


        
        
          
        
        
        
        
        
        
        
        <br><br><br>
    
          <div class='settings'> 


          <div class='f_text'>   البريد الإلكتروني</div> 
         <div class='edit_form'>
             
            <input type="text" class='field1' value="<?=$user_l['email'];?>"> <img id='email' onclick="open_email_edit()" src="/images/edit_btn.png" class='edit_ico' alt="">
         </div>          <br>


         
         <div class='f_text'>   رقم الهاتف  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div> 
         <div class='edit_form'>
             
            <input type="text" class='field1' value="<?=$user_l['phone_number'];?>"> <img id='phone_number' onclick="open_phone_edit()" src="/images/edit_btn.png" class='edit_ico' alt="">
         </div>          <br> 


         
         <div class='f_text'> &nbsp;&nbsp;  الرقم السري  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> 
         <div class='edit_form'>
             
            <input type="text" class='field1' value="" placeholder="******"> <img id='password' onclick="open_password_edit()" src="/images/edit_btn.png" class='edit_ico' alt="">
         </div>          <br>

         <br> <br>  <div class='delete_account'>  حذف الحساب  </div>





          </div>
         </div>  <!-- End of desktop view -->
            <!-- Edit Email -->
          <div class='div_edit' id='email_edit'>
            <div class='div_title'>تعديل البريد</div>
      <table class='table_email'>
        <tr>
          <td class='td_1'>البريد الجديد</td>
          <td class='td_d'><input id='e_1' type='text' class='field2'></td>
        </tr>
        <tr>
        <td class='td_1'> اعد كتابة البريد الجديد  </td>
          <td class='td_d'><input id='e_2' type='text' class='field2'></td>
        </tr>
 
      </table>        <br>
        <div style="display:flex;justify-content: center;"><button id='update_email' class='btn-1'>موافق  </button>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button id='close_edit_btn' class='btn-2'>إلغاء  </button></div>
                
          
    </div>
      <!-- End of email edit -->


      <!-- password edit -->
      
      <div class='div_edit' id='password_edit'>
            <div class='div_title'>تغيير الرقم السري  </div>
      <table class='table_1'>
        <tr>
          <td class='td_1'>الرقم السري الجديد  </td>
          <td class='td_d'><input id='p_1' type='text' class='field2'></td>
        </tr>
        <tr>
        <td class='td_1'> اعد الرقم السري الجديد  </td>
          <td class='td_d'><input id='p_2' type='text' class='field2'></td>
        </tr>
 
      </table>        <br>
        <div style="display:flex;justify-content: center;"><button id='update_password' class='btn-1'>موافق  </button>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button id='close_edit_btn' class='btn-2'>إلغاء  </button></div>
                
          
    </div>
    <!-- Phone edit -->
    <div class='div_edit' id='phone_edit'>
            <div class='div_title'>تغيير    رقم الهاتف  </div><br>
      <table class='table_1'>
        <tr>
          <td class='td_1'>مفتاح الدولة         </td>
          <td class='td_d'>
         <center> <select id='n_1' class="CONTRY-KEY">
                <option>اختر مفتاح الدولة</option>
        <option value="+966">السعودية (+966)</option>
        <option value="+212">المغرب (+212)</option>
        <option value="+258">موزمبيق (+258)</option>
        <option value="+95">ميانمار (بورما) (+95)</option>
        <option value="+264">ناميبيا (+264)</option>
        <option value="+674">ناورو (+674)</option>
        <option value="+977">نيبال (+977)</option>
        <option value="+31">هولندا (+31)</option>
        <option value="+599">نيوي (+599)</option>
        <option value="+687">كاليدونيا الجديدة (+687)</option>
        <option value="+64">نيوزيلندا (+64)</option>
        <option value="+505">نيكاراغوا (+505)</option>
        <option value="+227">النيجر (+227)</option>
        <option value="+234">نيجيريا (+234)</option>
        <option value="+683">جزر نييوي (+683)</option>
        <option value="+672">جزر نورفولك (+672)</option>
        <option value="+47">النرويج (+47)</option>
        <option value="+968">عمان (+968)</option>
        <option value="+92">باكستان (+92)</option>
        <option value="+680">بالاو (+680)</option>
        <option value="+970">فلسطين (+970)</option>
        <option value="+507">بنما (+507)</option>
        <option value="+675">بابوا غينيا الجديدة (+675)</option>
        <option value="+595">باراغواي (+595)</option>
        <option value="+51">بيرو (+51)</option>
        <option value="+63">الفلبين (+63)</option>
        <option value="+48">بولندا (+48)</option>
        <option value="+351">البرتغال (+351)</option>
        <option value="+1">بورتو ريكو (+1)</option>
        <option value="+974">قطر (+974)</option>
        <option value="+262">ريونيون (+262)</option>
        <option value="+40">رومانيا (+40)</option>
        <option value="+7">روسيا (+7)</option>
        <option value="+250">رواندا (+250)</option>
        <option value="+685">ساموا (+685)</option>
        <option value="+378">سان مارينو (+378)</option>
        <option value="+239">ساو تومي وبرينسيب (+239)</option>
       
        <option value="+221">السنغال (+221)</option>
        <option value="+381">صربيا (+381)</option>
        <option value="+248">سيشيل (+248)</option>
        <option value="+232">سيراليون (+232)</option>
        <option value="+65">سنغافورة (+65)</option>
        <option value="+421">سلوفاكيا (+421)</option>
        <option value="+386">سلوفينيا (+386)</option>
        <option value="+677">جزر سليمان (+677)</option>
        <option value="+252">الصومال (+252)</option>
        <option value="+27">جنوب أفريقيا (+27)</option>
        <option value="+34">إسبانيا (+34)</option>
        <option value="+94">سريلانكا (+94)</option>
        <option value="+249">السودان (+249)</option>
        <option value="+597">سورينام (+597)</option>
        <option value="+268">سوازيلاند (+268)</option>
        <option value="+46">السويد (+46)</option>
        <option value="+41">سويسرا (+41)</option>
        <option value="+963">سوريا (+963)</option>
        <option value="+886">تايوان (+886)</option>
        <option value="+992">طاجيكستان (+992)</option>
        <option value="+255">تنزانيا (+255)</option>
        <option value="+66">تايلاند (+66)</option>
        <option value="+228">التوغو (+228)</option>
        <option value="+690">توكيلاو (+690)</option>
        <option value="+676">تونغا (+676)</option>
        <option value="+1">ترينيداد وتوباغو (+1)</option>
        <option value="+216">تونس (+216)</option>
        <option value="+90">تركيا (+90)</option>
        <option value="+993">تركمانستان (+993)</option>
        <option value="+1">ترينيداد وتوباغو (+1)</option>
        <option value="+1">توفالو (+1)</option>
        <option value="+256">أوغندا (+256)</option>
        <option value="+380">أوكرانيا (+380)</option>
        <option value="+971">الإمارات العربية المتحدة (+971)</option>
        <option value="+44">المملكة المتحدة (+44)</option>
        <option value="+1">الولايات المتحدة الأمريكية (+1)</option>
        <option value="+598">أوروغواي (+598)</option>
        <option value="+998">أوزبكستان (+998)</option>
        <option value="+678">فانواتو (+678)</option>
        <option value="+379">الفاتيكان (+379)</option>
        <option value="+58">فنزويلا (+58)</option>
        <option value="+84">فيتنام (+84)</option>
        <option value="+681">واليس وفوتونا (+681)</option>
        <option value="+967">اليمن (+967)</option>
        <option value="+260">زامبيا (+260)</option>
        <option value="+263">زيمبابوي (+263)</option>
                  
              </select> </center>
          </td>
        </tr>
        <tr>
        <td class='td_1'>     رقم الهاتف     </td>
          <td class='td_d'><input id='n_2' type='text' class='field2'></td>
        </tr>
 
      </table>        <br>
        <div style="display:flex;justify-content: center;"><button id='update_phone' class='btn-1'>موافق  </button>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <button id='close_edit_btn' class='btn-2'>إلغاء  </button></div>
                
          
    </div>


    <div class='success_update' id='s_phone'>
    <div class='success_msg'>
      <img src="images/CheckMark.png" class="check_mark">
        تم تغيير رقم الجوال    
      </div>
    </div>


    
    <div class='success_update' id='s_pass'>
    <div class='success_msg'>
      <img src="images/CheckMark.png" class="check_mark">
        تم تغيير الرقم السري      
      </div>
    </div>



    <div class='success_update' id='s_email'>
    <div class='success_msg'>
      <img src="images/CheckMark.png" class="check_mark">
        تم تغيير البريد      
      </div>
    </div>








        </body>
        <script src='js/account_settings.js'></script>
        </html>