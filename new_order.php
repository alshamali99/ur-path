<?php session_start(); ?>
<html>
    <head>
        <title>    طلب جديد      </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/globals.css" />
    <link rel="stylesheet" href="assets/styleguide.css" />
    <link rel="stylesheet" href="assets/new_order.css" />
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

 
       

$p_user_id=intval($_GET['id']);
$srv_id=intval($_GET['srv']); 

  $u_q=mysqli_query($conn,"SELECT * from users where id=$p_user_id") or die("Error");
  $user_info_d=mysqli_fetch_array($u_q);
  if(mysqli_num_rows($u_q)<1){ exit(); }



    ?>



<center>

    <div class="overlay" id="overlay"></div>

<br> <div class='main_div'>

<center>
<div class="desktop_view">
  <div class="user">
    <!-- صورة المستخدم -->
    <div class="user-img">
      <img
        class="u_img"
        src="<?="uploads/".$user_info_d['u_img'];?>"
        alt="<?=$user_info_d['f_name']." ".$user_info_d['l_name'];?>"
      />
    </div>

    <!-- معلومات المستخدم -->
    <div class="user-info">
      <div class="username">
        <?=$user_info_d['f_name']." ".$user_info_d['l_name'];?>
      </div>

      <div class="rate-and-views">
        <div class="stars">
          <img class="star" src="images/rate_star.png" alt="★" />
          <img class="star" src="images/rate_star.png" alt="★" />
          <img class="star" src="images/rate_star.png" alt="★" />
          <img class="star" src="images/rate_star.png" alt="★" />
          <img class="star" src="images/rate_star.png" alt="★" />
        </div>
        <div class="reviews">
          التعليقات والمراجعات <span class="count">(0)</span>
        </div>
        <div class="projects">
          تم تنفيذ <span class="count">(0)</span> مشروع
        </div>
      </div>
    </div>
  </div>
</div>


<div class="mobile_view">
  <div class="user">
    <!-- صورة المستخدم -->
    <div class="user-img">
      <img
        class="u_img"
        src="<?="uploads/".$user_info_d['u_img'];?>"
        alt="<?=$user_info_d['f_name']." ".$user_info_d['l_name'];?>"
      />
    </div>

    <!-- معلومات المستخدم -->
    <div class="user-info">
      <div class="username">
        <?=$user_info_d['f_name']." ".$user_info_d['l_name'];?>
      </div>
      <div class="rate-and-views m_rate_and_views_2">
        <div class="stars">
          <img class="star" src="images/rate_star.png" alt="★" />
          <img class="star" src="images/rate_star.png" alt="★" />
          <img class="star" src="images/rate_star.png" alt="★" />
          <img class="star" src="images/rate_star.png" alt="★" />
          <img class="star" src="images/rate_star.png" alt="★" />
        </div>
        <div class="reviews">
          التعليقات والمراجعات <span class="count">(0)</span>
        </div>
        <div class="projects">
          تم تنفيذ <span class="count">(0)</span> مشروع
        </div>
      </div>
    </div>
  </div>
</div>

<br><br>
<!---------Order POST--------->
<?php
  $time_now=time() - 300;
  $srv_id=intval($_GET['srv']) ;
  $title=strip_tags($_POST['title']);
  $pr_id=intval($_GET["id"]);
  $order_desc=strip_tags($_POST['order_desc']); 
  $dat=date("Y-m-d H:i:s");
  $real_time=time();
  $free_edit=2;
  $user=$user_l['id'];
 /////////////////////if user have service ///////////////////////
$is_hvae_srvs=mysqli_query($conn,"SELECT * from user_main_srvs where user_id=$p_user_id AND srv_id=$srv_id") or die("Error in is have service ");
if(mysqli_num_rows($is_hvae_srvs)==0){exit();}

///////////////////////////////////////////////////////////////// 
/////////////// Check if Real User //////////////
$count_q = mysqli_query($conn, "SELECT * FROM orders WHERE u_id = $user AND srv_id = $srv_id AND pr_id = $pr_id AND order_time > $time_now") or die("Error count");
if(mysqli_num_rows($count_q) > 0){ 
echo "<center><h1 style='color:red;font-size:17px;font-family:Wafeq;'> لايمكن رفع طلب لوجود طلب حديث ... حاول رفع الطلب بعد خمس دقائق </h1></center>";
exit();}
/////////////////////////////////////////////
if($_POST['order_desc']){
   
     if($srv_id <1 || $srv_id >16){exit();}
     $new_order_q=$conn->prepare("INSERT into orders(u_id,pr_id,order_title,order_desc,srv_id,free_edit,order_date,order_time) values(?,?,?,?,?,?,?,?)") or die("Err");
     $new_order_q->bind_param("iissiisi",$user,$pr_id,$title,$order_desc,$srv_id,$free_edit,$dat,$real_time);
     $new_order_q->execute();
}
?>
<!--------------> 
<br><center><div id='order_ok'>  <img src="images/CheckMark.png" alt="">      تم ارسال الطلب بنجاح      </div><br></center>
 <div class='main_title'>العنوان الرئيسي للخدمة </div><br><br><br>
 <input type='text' class='srv_type1' value='<?php echo srv_name($conn,$srv_id); ?>' disabled><br>
<!-------------> 
<div class='main_title'>موضوع الطلب     </div><br><br><br>
<input id='title' type='text' class='srv_type2' placeholder='اكتب عنوان الطلب  ' ><br> 
<!------------->
<div class='main_title'>وصف الطلب       </div><br><br><br>
<textarea id='order_desc' class='order_desc'></textarea>
<!------------->
   </div><br>
   <button id='send_order' class='send_btn'>إرسال</button>


<br><br><br><br><br><br><br><br><br><br>
<?php 
/*-----------------------------User Docs---------------------------*/
function user_docs($conn,$uid,$val,$col){
    
    $doc_q=mysqli_query($conn,"SELECT * from org_docs where u_id=$uid and doc_type='".$val."' ") or die("er -541");
    $row =mysqli_fetch_array($doc_q);
    $data = $row[$col];
    return $data;
    }
###################################
function srv_name($conn,$s_id){
    $q =mysqli_query($conn,"SELECT * from main_srvs where id=$s_id ") or die("Er-124");
    $row =mysqli_fetch_array($q);
    $name=$row['srv_name'];
   return $name;
   }

?>
 
<br><br><br>
</div></body>
    <script src="js/new_order.js"></script>
     
     <?php include "inc/footer.php"; ?>
</html>
