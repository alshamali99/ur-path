<?php session_start();
ob_start();
?>
<html>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/globals.css" />
    <link rel="stylesheet" href="assets/styleguide.css" />
    <link rel="stylesheet" href="assets/my_profile.css" />
    <link rel="stylesheet" href="assets/hf/hf_style.css" />
    <link rel='stylesheet' href='assets/hf/logged_nav.css' />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>
            <?php 
         include "admin/db.php";
         include 'inc/header.php';
          include 'inc/profile/update_user_image.php'; 

          if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
            header("Location: login.php");
            exit;
        } elseif ($user_l['user_t'] == 'provider') {
            header("Location: pr_profile.php");
             
        }
        
        
        


       ///////// Update about me ////////////
       if($_POST['about_me']){
        $about_me=strip_tags($_POST['about_me']);
        $update_about_me=$conn->prepare("UPDATE users SET about_me=? where id=?") or die("Err -854");
        $update_about_me->bind_param("si",$about_me,$user_l['id']);
        $update_about_me->execute();
       }





    ?>

    <div class="overlay" id="overlay"></div>
<center><br><br>
    <div class='title'>
    <div class='title_text'>    ملفك الشخصي    </div>
    </div> 
<div class='desktop_view'><br><br><br><br><br><br><br>
   <div class='user'>
         
         <div><center>
            <img class='u_img' src="<?="uploads/".$user_l['u_img']; ?>" alt=""><br>
            <button class='change_image' onclick="open_form()">تغيير الصورة</button></center>
        </div>
         <div class='username'><?=$user_l['f_name']." ".$user_l['l_name'];?><br>
          
       


<div class='rate_and_views_2'>
       
    <img class="star" src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt="">
    <br>
     <font>التعليقات والمراجعات</font>   (<font color='red'>0</font>)


    
    
</div>

 

     




         </div> <!--       -->

   </div><br><br><br>
  <div class='about_me'> نبذه عني ... </div><br><br><br><br><br><br>
 <div class='about_me_div'> <textarea id="aboute_me_box" class='about_me_box'><?=$user_l['about_me'];?></textarea>  
    <font class='aboute_me_edit'><img id="open_msg_box" src="images/edit_btn.png" alt=""></font><br>
</div>
<div class='save_box'><br><br><br><br> <button id='save_btn' class='save_btn'>حفظ التغييرات</button></div><br><br><br><br><br><br>

 
</div>  <!-- End Of desktop view -->














<div class='mobile_view'><br><br><br>
<img class='u_img' src="<?="uploads/".$user_l['u_img']; ?>" alt=""><br><br>
<button class='change_image' onclick="open_form()">تغيير الصورة</button><br><br>
<div class='username'><?=$user_l['f_name']." ".$user_l['l_name'];?></div> 


<div class='m_rate_and_views_2'> 

    <img class="star"  src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt="">
    <img class="star"  src="images/rate_star.png" alt=""><br>
    <font>التعليقات والمراجعات</font>   (<font color='red'>0</font>)
  

     
    
    
</div>






<br><br><br><br>
<div class='m_about_me'> نبذه عني ... </div> 
<div class='m_about_me_div'> 
 <textarea id="m_aboute_me_box" class='m_about_me_box'><?=$user_l['about_me'];?></textarea><br>
 <font class='m_aboute_me_edit'><img id="m_open_msg_box" src="images/edit_btn.png" alt=""></font><br>
 <button id="m_save_btn" class='m_save_btn'>حفظ التغييرات</button><br> 
  </div><br>

 


<!------------->

<!--------------> 


</div>


<!--Upload Forms--------> 
<div class="upload_form" id="upload_form">
<button class="close_btn" onclick="close_form()">X</button>

<br><br>
<button class="update_img" id="update_img"> تغيير </button> 
<input type="file" id="file" name="file" class="file"> 
</div>





    </body>
    <script src="js/my_profile.js"></script>
</html>