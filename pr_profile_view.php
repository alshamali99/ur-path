<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ملفي الشخصي</title>

    <link rel="stylesheet" href="assets/globals.css" />
    <link rel="stylesheet" href="assets/styleguide.css" />
    <link rel="stylesheet" href="assets/pr_profile.css" />
    <link rel="stylesheet" href="assets/hf/hf_style.css" />
    <link rel="stylesheet" href="assets/hf/logged_nav.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
    @font-face {
      font-family: 'Wafeq';
      src: url('assets/fonts/Wafeq-Medium.otf') format('opentype');
    }

.textarea_wrapper textarea {
    overflow: hidden !important;
    resize: none !important;
background-color: #fafafa;
  }

.section-title {
  display: inline-flex;
  align-items: center;        /* لمركزة النص عموديّاً */
  justify-content: center;    /* لمركزة النص أفقيّاً */
  
    width: 200px;                /* العرض */
  height: 40px;                /* الارتفاع */
  
  background-color: #24759F;
  color: #8DE0CD;
  border-radius: 6px;
  padding: 0 14px;             /* لم نعد بحاجة إلى padding عمودي */
  
  font-family: 'Wafeq', sans-serif;
  font-size: 17px;
  font-weight: 700;
  margin: 20px 0;
  text-align: center;
  direction: rtl;
}

    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <?php 
    include "admin/db.php";
    include 'inc/header.php';
    include 'inc/profile/update_user_image.php'; 
    include 'inc/profile/user_srvs.php';
    include "inc/profile/upload_work_files.php";

    if (!isset($_SESSION['email'], $_SESSION['password'])) {
        // header("Location: login.php");
        // exit;
    }

    $p_user_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $cat       = isset($_GET['srv']) ? intval($_GET['srv']) : 0;
    if ($p_user_id === 0) {
        $p_user_id = $_SESSION['num'];
    }

    $u_q = mysqli_query($conn, "SELECT * FROM users WHERE id=$p_user_id") or die("Error");
    if (mysqli_num_rows($u_q) < 1) {
        exit();
    }
    $user_info_d = mysqli_fetch_array($u_q);
    ?>

    <div class="overlay" id="overlay"></div>

    <center>
        <br><br>
        <div class="main_div">
            <br><br><br>
            <a href="new_order.php?id=<?php echo $p_user_id."&srv=".$cat; ?>">
                <button class="order_from_provider">مراسلة وطلب الخدمة</button>
            </a>

            <!-- Desktop View -->
            <div class="desktop_view">
                <div class="user">
                    <div>
                        <center>
                            <img class="u_img" src="<?php echo 'uploads/' . htmlspecialchars($user_info_d['u_img']); ?>" alt=""><br>
                        </center>
                    </div>
                    <div class="username">
                        <?php echo htmlspecialchars($user_info_d['f_name'] . " " . $user_info_d['l_name']); ?><br>
                        <div class="rate_and_views_2">
                            <img class="star" src="images/rate_star.png" alt="">
                            <img class="star" src="images/rate_star.png" alt="">
                            <img class="star" src="images/rate_star.png" alt="">
                            <img class="star" src="images/rate_star.png" alt="">
                            <img class="star" src="images/rate_star.png" alt="">
                            <br>
                            <font>التعليقات والمراجعات</font> (<font color="red">0</font>)<br><br>
                            <font>تم تنفيذ</font> (<font color="red">0</font>) مشروع<br><br>
                            <font>الرقم الضريبي :</font> <font color="green">7377236</font>
                        </div>
                    </div>
                </div>
                <br><br>
            </div>
            <!-- End Desktop View -->

            <!-- Mobile View -->
            <div class="mobile_view">
                <br><br><br>
                <img class="u_img" src="<?php echo 'uploads/' . htmlspecialchars($user_info_d['u_img']); ?>" alt=""><br><br>
                <div class="username"><?php echo htmlspecialchars($user_info_d['f_name'] . " " . $user_info_d['l_name']); ?></div>
                <div class="m_rate_and_views_2">
                    <img class="star" src="images/rate_star.png" alt="">
                    <img class="star" src="images/rate_star.png" alt="">
                    <img class="star" src="images/rate_star.png" alt="">
                    <img class="star" src="images/rate_star.png" alt="">
                    <img class="star" src="images/rate_star.png" alt=""><br>
                    <font>التعليقات والمراجعات</font> (<font color="red">0</font>)<br><br>
                    <font>تم تنفيذ</font> (<font color="red">0</font>) مشروع<br><br>
                    <font>الرقم الضريبي :</font> <font color="green">7377236</font>
                </div>
                <br><br>
            </div>
            <!-- End Mobile View -->

            <br><br><br>
            
                <div class="section-title">نبذة عني . . .</div>

                <div class="textarea_wrapper">
                    <textarea class="textarea_box1" id="about_me_box"><?php echo htmlspecialchars($user_info_d['about_me']); ?></textarea>
                </div>
                               
                <br><br>

                <div class="section-title">نماذج من اعمالي</div>
                
                <div class="my_works"><?php include 'inc/profile/last_my_works.php'; ?></div>
                <br><br>

                <div class="section-title">تعليمات قبل الطلب</div>
             
                <div class="textarea_wrapper">
                    <textarea class="textarea_box3" id="before_order_box"><?php echo htmlspecialchars($user_info_d['before_order']); ?></textarea>
                </div>
           
            <br><br><br><br>

            <a href="new_order.php?id=<?php echo $p_user_id."&srv=".$cat; ?>">
                <button class="order_from_provider">مراسلة وطلب الخدمة</button>
            </a>
            <br><br><br>
        </div>
    </center>
 </div>
    <script src="js/my_profile.js"></script>
    <script src="js/pr_profile_view.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    function autoResize(textarea) {
      textarea.style.height = 'auto';
      textarea.style.height = textarea.scrollHeight + 'px';
    }
    document.querySelectorAll('.textarea_wrapper textarea').forEach(function(textarea) {
      // أول تمدّد بناءً على المحتوى الأولي
      autoResize(textarea);
      // تمدّد أثناء الكتابة
      textarea.addEventListener('input', function() {
        autoResize(textarea);
      });
    });
  });
</script>


    <?php include "inc/footer.php"; ?>
</body>
</html>
