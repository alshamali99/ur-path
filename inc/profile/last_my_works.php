<?php
if (!isset($conn)) { include_once "admin/db.php"; }

$p_user_id = isset($_GET['id']) ? intval($_GET['id']) : (isset($_SESSION['num']) ? $_SESSION['num'] : 0);

function convertYoutubeToEmbed($url) {
    if (preg_match('/(youtu\.be\/|youtube\.com\/watch\?v=)([^\&\?\/]+)/', $url, $matches)) {
        return "https://www.youtube.com/embed/" . $matches[2];
    }
    return false;
}
?>
<link rel="stylesheet" href="assets/last_my_works.css">

<div class="slider-wrapper">
  <div id="slides">
    <?php
    $q = mysqli_query($conn, "SELECT * FROM pr_my_works WHERE u_id=$p_user_id") or die("Error loading slides.");
    $count = 0;
    while($row = mysqli_fetch_array($q)) {
        $name = $row['file_link'];
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $class = $count === 0 ? 'slide active' : 'slide';
        echo "<div class='$class'>";
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "<img src='uploads/$name' alt='صورة' data-type='image'>";
        } elseif ($ext === 'pdf') {
            echo "<div class='pdf-slide'>
                    <a href='uploads/$name' download>
                      <img src='images/download-pdf.png' alt='PDF'><p>تحميل الملف</p>
                    </a>
                  </div>";
        } elseif (preg_match('/(youtube\.com|youtu\.be)/i', $name)) {
            $embed = convertYoutubeToEmbed($name);
            if ($embed) {
                echo "<iframe src='$embed' frameborder='0' allowfullscreen data-type='video' data-src='$embed'></iframe>";
            }
        }
        echo "</div>";
        $count++;
    }

 if ($count === 0) {
      echo "<div class='no-slides-msg'>.... لا يوجد شيء حتى الآن</div>";
  }
    ?>
  </div>
  <div class="controls">
    <button id="prev">&#10094;</button>
    <button id="next">&#10095;</button>
  </div>
  <div id="dots" class="dots"></div>
</div>

<!-- نافذة منبثقة -->
<div id="modal-viewer">
  <div id="modal-close">&times;</div>
  <div id="modal-content"></div>
</div>

<script src="js/last_my_works.js"></script>
