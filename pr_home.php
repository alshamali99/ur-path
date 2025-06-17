<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>صفحتي الرئيسية</title>

    <!-- ==============================================
         1) استدعاء ملفات CSS الأصلية (بدون تغيير)
    ============================================== -->
    <link rel="stylesheet" href="assets/globals.css" />
    <link rel="stylesheet" href="assets/styleguide.css" />
    <link rel="stylesheet" href="assets/pr_profile.css" />
    <link rel="stylesheet" href="assets/hf/hf_style.css" />
    <link rel="stylesheet" href="assets/hf/logged_nav.css" />

    <!-- ==============================================
         2) خطوط Google Font وأيقونات Font Awesome
    ============================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link 
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" 
      rel="stylesheet" 
    />
    <link 
      rel="stylesheet" 
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" 
    />

    <!-- ==============================================
         3) مكتبة jQuery
    ============================================== -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- ==============================================
         4) أنماط داخلية إضافية لتحسين المظهر
         – نُعيد تعريف بعض التنسيقات للأقسام غير المعدّلة
         – ونُدخل فقط تنسيق “بطاقة المستخدم” الجديد (دون زر تغيير الصورة)
    ============================================== -->
    <style>
        /* ====================================================
           A) إعدادات عامة (خط، لون خلفية، هوامش بسيطة)
        ==================================================== */
        body {
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
            font-family: 'Cairo', sans-serif;
            color: #161f0b;
        }
        a {
            color: #24759F;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }

        /* ====================================================
           B) عنوان “لوحة التحكم السريع”
        ==================================================== */
        .page-title {
            margin-top: 30px;
            margin-bottom: 20px;
            text-align: center;
            font-family: 'Wafeq', sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: #24759F;
        }

        /* ====================================================
           C) الحاوية الرئيسية (Main Container) – كما في القديم
        ==================================================== */
        .main_div {
            max-width: 1000px;
            margin: 0 auto 40px;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 20px 25px;
margin-top: 40px;
margin-top: 40px;
        }

.copy_btn {
      display: inline-block;               /* مهم: اجعل الزر inline-block لكي يغطي النص بالكامل */
      background: rgba(217, 217, 217, 0.5);
      border: 1px solid gray;
      border-radius: 8px;
      padding: 6px 14px;
      font-family: 'Wafeq', sans-serif;
      font-size: 14px;
      font-weight: 700;
      cursor: pointer;
      transition: background-color 0.2s ease;
      /* تأكد من أن الزر ليست له أي خصائص تُلغي pointer-events */
      pointer-events: auto;
    }
        /* ====================================================
           D) قسم رابط “لوحة التحكم السريع” (Input + Copy) – كما في القديم
        ==================================================== */
        .link-row {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }
        .link-row input {
            width: 300px; /* تم تقليل العرض */
            padding: 6px 10px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            direction: ltr;
        }

     
/* تأثير عند مرور الماوس */
.copy_btn:hover {
    background: rgba(217, 217, 217, 0.8);
}

/* 1) الأساسيات العامة للزر */
.deposit_btn {
  display: inline-block;    /* يجعل العنصر يأخذ أبعاد المحتوى مع إمكانية تحديد الطول */
  width: 118px;             
  height: 30px;            
  line-height: 26px;        /* نفس قيمة الارتفاع لضبط التوسيط العمودي */
  text-align: center;       /* توسيط النص أفقيًا */
  font-family: 'Wafeq', sans-serif;
  font-size: 16px;
  font-weight: 700;
  border: 2px solid #1C5979;
  border-radius: 6px;
  background-color: #ffffff;
  color: #1C5979;
  cursor: pointer;
  transition: background-color 0.2s ease, color 0.2s ease;
}

/* تأثير عند مرور الماوس */
.deposit_btn:hover {
  background-color: #1C5979;
  color: #ffffff;
}


/* 3) تأثير عند الضغط (active) */
.deposit_btn:active {
  background-color: #16526a; /* لون أغمق قليلًا لإحساس “الضغط” */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  transform: translateY(1px); /* انزياح خفيف عند الضغط */
}

/* 4) إذا أردت تعطيل الزرّ (disabled)، يمكن إضافة صورة باهتة */
.deposit_btn:disabled {
  background-color: #e0e0e0;
  border-color: #bbb;
  color: #888;
  cursor: not-allowed;
  box-shadow: none;
}


        @media (max-width: 668px) {
            .link-row {
                flex-direction: column;
            }
            .link-row input, .link-row .copy_btn {
                width: 100%;
                margin: 5px 0;
            }
        }

        /* ====================================================
           E) الإحصائيات (Quick Stats) – كما في القديم
        ==================================================== */
        .quick-dashboard {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 40px;
        }
        .quick-dashboard .stat-card {
            flex: 1;
            min-width: 140px;
            background-color: #e8f1f9;
            border: 1px solid #1C5979;
            border-radius: 6px;
            text-align: center;
            padding: 10px;
            font-family: 'Wafeq', sans-serif;
            font-size: 14px;
            color: #161f0b;
        }
        .quick-dashboard .stat-card .value {
            font-size: 18px;
            font-weight: 700;
            margin-top: 8px;
        }
        @media (max-width: 668px) {
            .quick-dashboard {
                flex-direction: column;
                align-items: center;
            }
            .quick-dashboard .stat-card {
                width: 100%;
            }
        }

        /* ================================================
           F) بطاقة المستخدم (User Card) – التصميم الجديد
           ================================================ */
        .user-card {
            display: flex;                  /* نفعل Flexbox */
            flex-direction: row;            /* رص العناصر في صف (صورة + معلومات) */
            justify-content: center;        /* يوضع المحتوى في مركز الحاوية أفقيًا */
            align-items: center;            /* يوضع المحتوى في مركز الحاوية عموديًا */
            gap: 20px;                      /* مسافة أفقية ثابتة بين الصورة والمعلومات */
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
            /* يمكنك تعديل الارتفاع إذا رغبت */
           height: 350px; 
        }

        /* 1) صورة المستخدم (على اليسار) */
        .user-card img.u_img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #24759F;
            margin-top: 0; /* أزلنا انزياح الأعلى لأننا سنعيد ترتيب العناصر في الموبايل */
        }

        /* 2) حاوية المعلومات (على يمين الصورة) */
        .user-card .user-info {
            display: flex;
            flex-direction: column;   /* رص العناصر (الاسم، النجوم، التفاصيل) عموديًا */
            justify-content: center;  /* توسيط عمودي داخل ارتفاع .user-info */
            align-items: center;      /* توسيط أفقي لكل عنصر داخل .user-info */
            gap: 8px;                 /* مسافة بسيطة بين الاسم والنجوم ونص التفاصيل */
        }

        /* شريط التقييم (النجوم) */
        .user-card .user-info .rating {
            display: flex;
            gap: 4px;
            justify-content: center; /* توسيط النجوم أفقيًا داخل الصف */
            align-items: center;     /* توسيط النجوم عموديًا داخل الصف */
        }
        .user-card .user-info .rating img.star {
            width: 18px;
            height: 18px;
        }

        /* تفاصيل أسفل التقييم */
        .user-card .user-info .details {
            font-size: 15px;
            color: #555;
            line-height: 1.5;
            text-align: center;      /* توسيط نص التفاصيل */
        }

        /* عند العرض على الشاشات الصغيرة (<668px)، نجعل الصورة فوق المعلومات */
        @media (max-width: 668px) {
            .user-card {
                flex-direction: column;  /* رصّ العناصر عموديًا بدل أفقي */
                align-items: center;     /* توسيط العناصر أفقيًا */
                text-align: center;      /* إذا وجد نص جانبي، يصبح في الوسط */
            }
            .user-card img.u_img {
                margin-bottom: 12px;     /* مسافة أسفل الصورة */
            }
        }

        /* ====================================================
           G) أقسام المحتوى (Content Sections) – بدون أيقونات “تعديل”
        ==================================================== */
        .section-wrapper {
            margin-bottom: 30px;
        }
        .section-header {
            display: inline-block;
            background-color: #24759F;
            color: #8DE0CD;
            border-radius: 6px;
            padding: 8px 14px;
            font-family: 'Wafeq', sans-serif;
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 12px;
        }
        .textarea_wrapper {
            position: relative;
            width: 100%;
            max-width: 760px;
            margin-top: 8px;
        }
        .textarea_wrapper textarea {
            width: 100%;
            min-height: 80px;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 10px 14px;
            font-family: 'Wafeq', sans-serif;
            font-size: 15px;
            background-color: #fafafa;
            pointer-events: none;
            resize: none;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }
        /* أزلنا أيقونات التحرير نهائيًا – فتحرير النص غير مطلُوب هنا */

        .edit_btns {
            margin-top: 10px;
            display: none;  /* مخفية دائماً */
            text-align: right;
            max-width: 760px;
        }
        .edit_btns button {
            font-family: 'Wafeq', sans-serif;
            font-size: 14px;
            font-weight: 700;
            border-radius: 6px;
            padding: 6px 14px;
            margin-left: 8px;
            cursor: pointer;
            border: none;
        }
        .edit_btns .save_btn {
            background-color: #24759F;
            color: #fff;
            border: 1px solid #24759F;
        }
        .edit_btns .cancle_btn {
            background-color: #fff;
            color: #BD1919;
            border: 1px solid #BD1919;
        }
        .edit_btns .save_btn:hover,
        .edit_btns .cancle_btn:hover {
            opacity: 0.9;
        }

        /* ====================================================
           H) جداول العناوين وجزء “نماذج الأعمال” – كما في القديم
        ==================================================== */
        #srv_menu_lst {
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #fafafa;
        }
        #srv_menu_lst table {
            width: 100%;
            border-collapse: collapse;
        }
        #srv_menu_lst td {
            padding: 8px 12px;
            border-bottom: 1px solid #eee;
            font-family: 'Wafeq', sans-serif;
            font-size: 15px;
            color: #161f0b;
        }
        #srv_menu_lst tr:last-child td {
            border-bottom: none;
        }
        .my_works {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 15px;
        }
        .my_works .work-card {
            background-color: #fff;
            border: 1px solid #8DE0CD;
            border-radius: 10px;
            padding: 12px;
            width: calc(33.333% - 10px);
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            font-family: 'Wafeq', sans-serif;
            font-size: 14px;
            color: #161f0b;
        }
        @media (max-width: 768px) {
            .my_works .work-card {
                width: 100%;
            }
        }

        /* ====================================================
           I) الهوامش النهائية
        ==================================================== */
        .main_div br {
            line-height: 0.5;
        }
    </style>
</head>

<body>
<?php
// ===================================================
// 5) تضمين السكربتات المطلوبة وجلب بيانات المستخدم
// ===================================================
include "admin/db.php";
include 'inc/header.php';
include 'inc/profile/update_user_image.php';
include 'inc/profile/user_srvs.php';
include "inc/profile/upload_work_files.php";

if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    // header("Location: login.php"); exit();
}
$p_user_id = intval($_SESSION['num']);
$u_q = mysqli_query($conn, "SELECT * FROM users WHERE id = $p_user_id") or die("Error");
$user_info_d = mysqli_fetch_array($u_q);
if (!$user_info_d) exit("المستخدم غير موجود.");
?>

<main dir="rtl">

<div class="overlay" id="overlay"></div>

<center>
    <div class="main_div">

        <!-- 1. العنوان الرئيسي لـ "لوحة التحكم السريع" -->
        <div class="page-title">لوحة التحكم السريع</div>

        <!-- 2. مربع النص الخاص بالرابط وزرّ النسخ (عرض مخفف) -->
        <div class="link-row">
            <input type="text" value="https://ur-path.com" readonly />
            <button class="copy_btn" onclick="navigator.clipboard.writeText('https://ur-path.com')">نسخ</button>
        </div>

        <!-- 3. الإحصائيات (Quick Stats) -->
        <div class="quick-dashboard">
            <div class="stat-card">
                <div>أعمال جديدة</div>
                <div class="value">0</div>
            </div>
            <div class="stat-card">
                <div>أعمال بانتظار الاستلام</div>
                <div class="value">0</div>
            </div>
            <div class="stat-card">
                <div>المبالغ الموجودة بالمحفظة</div>
                <div class="value">
                    0$
                    <button class="deposit_btn">إيداع في حسابي</button>
                </div>
            </div>
        </div>

        <!-- 4. بطاقة بيانات المستخدم (User Card) – الشكل الجديد بصورته الأفقية -->
        <div class="user-card">
            <!-- 1) صورة المستخدم -->
            <img class="u_img" src="<?= "uploads/" . htmlspecialchars($user_info_d['u_img']); ?>" alt="صورة المستخدم" />

            <!-- 2) حاوية المعلومات بجانب الصورة -->
            <div class="user-info">
                <div class="username">
                    <?= htmlspecialchars($user_info_d['f_name'] . " " . $user_info_d['l_name']); ?>
                </div>
                <div class="rating">
                    <img class="star" src="images/rate_star.png" alt="نجمة" />
                    <img class="star" src="images/rate_star.png" alt="نجمة" />
                    <img class="star" src="images/rate_star.png" alt="نجمة" />
                    <img class="star" src="images/rate_star.png" alt="نجمة" />
                    <img class="star" src="images/rate_star.png" alt="نجمة" />
                </div>
                <div class="details">
                    <div>التعليقات والمراجعات: <span style="color:red">0</span></div>
                    <div>تم تنفيذ: <span style="color:red">0</span> مشروع</div>
                    <div>الرقم الضريبي: <span style="color:green">7377236</span></div>
                </div>
            </div>
        </div>

        <!-- 5. نبذة عني (About Me) -->
        <div class="section-wrapper">
            <div class="section-header">نبذة عني</div>
            <div class="textarea_wrapper">
                <textarea 
                  class="textarea_box1" 
                  id="about_me_box" 
                  readonly
                ><?= htmlspecialchars($user_info_d['about_me']); ?></textarea>
            </div>
        </div>

        <!-- 6. العناوين الرئيسية (Main Services) -->
        <div class="section-wrapper">
            <div class="section-header">العناوين الرئيسية</div>
            <div id="srv_menu_lst">
                <?php
                echo "<table id='srvs_list_tbl'>";
                $srv_q = mysqli_query(
                    $conn,
                    "SELECT * FROM user_main_srvs WHERE `user_id` = " . $_SESSION['num']
                ) or die("E-89");
                while ($row_srvs = mysqli_fetch_array($srv_q)) {
                    echo "<tr><td style='padding:8px 12px;'>" 
                        . htmlspecialchars(srv_name($conn, $row_srvs['srv_id'])) 
                        . "</td></tr>";
                }
                echo "</table>";
                ?>
            </div>
        </div>

        <!-- 7. الخدمات المقدمة (Provided Services) -->
        <div class="section-wrapper">
            <div class="section-header">الخدمات المقدمة</div>
            <div class="textarea_wrapper">
                <textarea 
                  id="provide_services_box" 
                  class="textarea_box2" 
                  readonly
                ><?= htmlspecialchars($user_info_d['my_srv']); ?></textarea>
            </div>
        </div>

        <!-- 8. نماذج من أعمالي (My Works) -->
        <div class="section-wrapper">
            <div class="section-header">نماذج من أعمالي</div>
            <div class="my_works">
                <?php include 'inc/profile/last_my_works.php'; ?>
            </div>
        </div>

        <!-- 9. تعليمات للعملاء قبل الطلب (Before Order Instructions) -->
        <div class="section-wrapper">
            <div class="section-header">تعليمات للعملاء قبل الطلب</div>
            <div class="textarea_wrapper">
                <textarea 
                  class="textarea_box3" 
                  id="before_order_box" 
                  readonly
                ><?= htmlspecialchars($user_info_d['before_order']); ?></textarea>
            </div>
        </div>

        <!-- 10. الوسوم (Tags) -->
        <div class="section-wrapper">
            <div class="section-header">الوسوم</div>
            <div class="textarea_wrapper">
                <textarea 
                  class="textarea_box4" 
                  id="tags_box" 
                  readonly
                ><?= htmlspecialchars($user_info_d['my_tags']); ?></textarea>
            </div>
        </div>

    </div> <!-- نهاية main_div -->
</center>
 </main>

<?php
// ===================================================
// 6) تعريف الدوال كما كانت سابقًا
// ===================================================
function user_docs($conn, $uid, $val, $col) {
    $doc_q = mysqli_query($conn,"SELECT * FROM org_docs WHERE u_id=$uid AND doc_type='$val'") 
             or die("er -541");
    $row   = mysqli_fetch_array($doc_q);
    return $row[$col];
}

function doc_status($conn, $uid, $val, $col) {
    $doc_q = mysqli_query($conn,"SELECT * FROM org_docs WHERE u_id=$uid AND doc_type='$val'") 
             or die("er -541");
    $row   = mysqli_fetch_array($doc_q);
    $data  = $row[$col];
    switch($data) {
        case 'waitting':
            echo "<font color='blue'>جاري عملية التحقق</font>";
            break;
        case 'accepted':
            echo "<font color='green'>تم التحقق</font>";
            break;
        case 'rejected':
            echo "<font color='red'>مرفوض</font>";
            break;
        default:
            break;
    }
}

function srv_name($conn, $s_id) {
    $q   = mysqli_query($conn,"SELECT * FROM main_srvs WHERE id=$s_id") or die("Er-124");
    $row = mysqli_fetch_array($q);
    return $row['srv_name'];
}
?>

<!-- ==============================================
     7) ربط ملفات الجافاسكربت كما كانت سابقًا
=============================================== -->
<script src="js/my_profile.js"></script>
<script src="js/pr_profile_view.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script src="js/pr_profile.js"></script>
<script>
      document.addEventListener('DOMContentLoaded', function() {
        // دالة تضبط ارتفاع textarea تلقائياً
        function autoResize(textarea) {
          textarea.style.height = 'auto';
          textarea.style.height = textarea.scrollHeight + 'px';
        }

        // اختر جميع حقول <textarea> داخل العناصر التي تحمل الصنف .textarea_wrapper
        document.querySelectorAll('.textarea_wrapper textarea').forEach(function(textarea) {
          // 1- ضبط الارتفاع بناءً على المحتوى المُحمَّل من قاعدة البيانات
          autoResize(textarea);
          // 2- ربط حدث "input" لإعادة الضبط أثناء الكتابة
          textarea.addEventListener('input', function() {
            autoResize(textarea);
          });
        });
      });
    </script>

<?php include "inc/footer.php"; ?>
</body>
</html>
