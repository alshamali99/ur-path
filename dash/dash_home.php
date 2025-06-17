<?php
session_start();

// تحقق من وجود جلسة دخول
if (!isset($_SESSION['email'])) {
    header("Location: dash_login.php");
    exit();
}

// مدة الجلسة: 5 دقائق = 300 ثانية
$inactive = 300;

// تحقق من وقت آخر نشاط
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $inactive) {
    session_unset();     // حذف بيانات الجلسة
    session_destroy();   // إنهاء الجلسة
    header("Location: dash_login.php?timeout=1");
    exit();
}

// تحديث وقت آخر نشاط
$_SESSION['last_activity'] = time();

?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>لوحة التحكم</title>

  <!-- ملفات CSS -->
  <link rel="stylesheet" href="assets/globals.css" />
  <link rel="stylesheet" href="assets/styleguide.css" />
  <link rel="stylesheet" href="assets/dash_home.css" />

  <!-- الخط -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<!-- الهيدر -->
<?php
 include "admin/db.php";
 include 'nav/header.php';
  

 ?>


<!-- الحاوية الرئيسية -->
<div class="main-container">
  <h2 class="welcome-message">مرحباً بك، <?php echo $_SESSION['email'] ?? 'زائر'; ?> 👋</h2>
  <p style="text-align: center;">أنت الآن في لوحة التحكم، اختر الإجراء الذي ترغب به من الخيارات التالية:</p>

  <!-- شبكة الأزرار -->
  <div class="button-grid">
    <button onclick="location.href='function/documents.php'">توثيق وثائق مقدمي الخدمات</button>
    <button onclick="toggleUserSection()">إدارة حسابات المستخدمين</button>
    <button onclick="location.href='function/tickets.php'">التذاكر و التبليغات</button>
    <button onclick="location.href='function/stats_my.php'">إحصائية أعمالي</button>
    <button onclick="location.href='function/deposit.php'">إدارة إيداع الأموال</button>
    <button onclick="location.href='function/refunds.php'">إدارة إعادة الأموال</button>
    <button onclick="location.href='function/broadcast.php'">إرسال رسائل عامة للمستخدمين</button>
    <button onclick="location.href='function/suspended.php'">الحسابات الموقوفة</button>
    <button onclick="location.href='function/stats_owner.php'">إحصائيات <span class="owner-label">(only admin)</span></button>
    <button onclick="location.href='function/support_accounts.php'">إدارة حسابات الدعم الفني</button>
    <button id="openSupportModal">إنشاء حسابات الدعم الفني <span class="owner-label">(only admin)</span></button>
    <button onclick="location.href='function/company_invoices.php'">فواتير الشركة <span class="owner-label">(only admin)</span></button>
  </div>

  <!-- إدارة حسابات المستخدمين -->
  <div class="user-management-section" id="userManagementSection" style="display: none;">
    <h3>إدارة حسابات المستخدمين</h3>
    <p>هنا ستظهر بيانات حسابات المستخدمين بعد ربطها بقاعدة البيانات.</p>
  </div>
</div>

<!-- المودال -->
<div id="supportModal" class="modal">
  <div class="modal-content">
    <span id="closeModal" class="modal-close">&times;</span>
    <h2>إنشاء حساب دعم فني</h2>
    <p>نموذج إدخال بيانات موظف الدعم الفني سيتم وضعه لاحقاً.</p>
  </div>
</div>

<!-- الفوتر -->
<?php include 'inc/footer.php'; ?>

<!-- ملفات JS -->
<script src="js/dash_home.js"></script>
<script>
  function toggleUserSection() {
    const section = document.getElementById('userManagementSection');
    section.style.display = section.style.display === 'none' ? 'block' : 'none';
  }
</script>
</body>
</html>
