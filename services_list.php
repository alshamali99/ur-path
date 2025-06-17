<?php 
session_start();
include "admin/db.php";
include 'inc/header.php';

// دالّة جلب معلومة المستخدم
function get_user_info($conn, $id, $val){
    $q = mysqli_query(
      $conn,
      "SELECT `$val` 
       FROM `users` 
       WHERE `id` = ".intval($id)
    ) or die("Err -5222");
    $row = mysqli_fetch_array($q);
    return $row[$val] ?? '';
}

// جلب فئة الخدمات من الـ URL
$cat = intval($_GET['cat']);

// استعلام المستخدمين
$q = mysqli_query(
  $conn,
  "SELECT DISTINCT `user_id` 
   FROM `user_main_srvs` 
   WHERE `srv_id` = $cat"
) or die("Error -eef");
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>قائمة الخدمات</title>
  <link rel="stylesheet" href="assets/globals.css" />
  <link rel="stylesheet" href="assets/styleguide.css" />
  <link rel="stylesheet" href="assets/services_list.css" />
  <link rel="stylesheet" href="assets/hf/hf_style.css" />
  <link rel="stylesheet" href="assets/hf/logged_nav.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    @font-face {
      font-family: 'Wafeq';
      src: url('assets/fonts/Wafeq-Medium.otf') format('opentype');
    }
  </style>
</head>
<body>

<br><br><br>
<center>

<?php while ($row = mysqli_fetch_array($q)) { ?>

  <div class="main_class">
    <table id="u_tb">
      <tr>
        <td class="img_td">
          <img class="u_img" 
               src="uploads/<?php 
                   echo get_user_info($conn, $row['user_id'], "u_img");
               ?>" 
               alt="صورة المستخدم">
        </td>
        <td class="user_info">
          <div class="full_name">
            <?php 
              echo get_user_info($conn, $row['user_id'], "f_name")
                   . " " .
                   get_user_info($conn, $row['user_id'], "l_name");
            ?>
          </div>
          <div class="stars">⭐⭐⭐⭐⭐</div>
          <div class="reviews">
            المراجعات والتعليقات 
            (<span class="count">0</span>)
          </div>
        </td>
      </tr>
    </table>
<br>

 <div class="desc-services">
  <div class="srv_title">الخدمات التي أقدمها</div>
  <div class="srvs_list">
    <?php echo get_user_info($conn, $row['user_id'], "my_srv"); ?>
  </div>
</div>


    <center>
      <a href="pr_profile_view.php?id=<?php 
            echo $row['user_id'] ."&srv=". $cat; 
        ?>">
        <button class="msg_btn">
          استعراض وطلب الخدمة
        </button>
      </a>
    </center>
  </div>
  <br>

<?php } // نهاية الWhile ?>

</center>

<?php include 'inc/footer.php'; ?>
</body>
</html>
