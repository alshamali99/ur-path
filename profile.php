<?php
// =================================================================================
// profile.php
// =================================================================================

session_start();

// 1) التحقق من تسجيل الدخول
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// 2) تضمين ملف الاتصال بقاعدة البيانات
include __DIR__ . '/admin/db.php';

// 3) جلب بيانات المستخدم (الاسم الأول، الاسم الأخير، واسم ملف الصورة)
$user_id = intval($_SESSION['user_id']);
$stmt = $conn->prepare("SELECT f_name, l_name, u_img FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user_l = $result->fetch_assoc();
$stmt->close();

// 4) إذا لم توجد بيانات للمستخدم، نعرض رسالة خطأ بسيطة
if (!$user_l) {
    echo "<p>خطأ: لا توجد بيانات لهذا المستخدم.</p>";
    exit;
}

// 5) اختيار الصورة الفعلية أو الافتراضية
if (empty($user_l['u_img']) || !file_exists(__DIR__ . '/uploads/' . $user_l['u_img'])) {
    // صورة افتراضية محفوظة في uploads/
    $avatarFilename = 'default-avatar.png';
} else {
    $avatarFilename = $user_l['u_img'];
}
$avatarPath = 'uploads/' . $avatarFilename;

?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ملفي الشخصي</title>

    <!-- 6) ربط ملف CSS الخاص بصفحة البروفايل -->
    <link rel="stylesheet" href="assets/profile.css">

    <!-- استيراد خط Cairo من Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;500;700&amp;display=swap" rel="stylesheet">
</head>
<body>

    <!-- 7) تضمين الهيدر (inc/header.php) كما هو دون تعديل -->
    <?php include __DIR__ . '/inc/header.php'; ?>

    <!-- 8) تضمين ناف بار الجوال (inc/nav.php) كما هو دون تعديل -->
    <?php include __DIR__ . '/inc/nav.php'; ?>

    <!-- 9) الحاوية الرئيسية لكل محتوى صفحة البروفايل -->
    <div class="main-container">

        <!-- 10) بطاقة المستخدم -->
        <div class="user-card">
            <!-- صف يحتوي الصورة والاسم أفقيًا -->
            <div class="user-info-row">
                <!-- الغلاف الدائري حول الصورة -->
                <div class="avatar-wrapper">
                    <img src="<?php echo htmlspecialchars($avatarPath); ?>" alt="صورة المستخدم" class="profile-image">
                </div>
                <!-- اسم المستخدم بجانبه -->
                <div class="user-name">
                    <?php echo htmlspecialchars($user_l['f_name'] . ' ' . $user_l['l_name']); ?>
                </div>
            </div>

            <!-- زر تغيير الصورة أسفل صف الصورة والاسم -->
            <button id="change-image-btn" class="btn-change-image">تغيير الصورة</button>

            <!-- نموذج رفع الصورة (مخفي) -->
            <form id="image-upload-form" action="profile/update_image.php" method="post" enctype="multipart/form-data" style="display: none;">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="file" name="new_image" id="image-upload-input" accept="image/*">
            </form>
        </div>
        <!-- نهاية بطاقة المستخدم -->

        <!-- 11) هنا بإمكانك إضافة بقية أجزاء الصفحة مستقبلاً تحت نفس الحاوية main-container 
             (مثل: نبذة عني، المستندات، الخدمات، إلخ.) 

             مثال توضيحي لعنصر إضافي (لن يتم تضمينه الآن، لكن يمكنك لاحقًا): 
             
             <div class="about-me-section">
                <h3>نبذة عني</h3>
                <p>هذا نصّ توضيحي للنبذة...</p>
             </div>
        -->
    </div>
    <!-- نهاية الحاوية الرئيسية -->

    <!-- 12) تضمين الفوتر (inc/footer.php) كما هو دون تعديل -->
    <?php include __DIR__ . '/inc/footer.php'; ?>

    <!-- 13) ربط ملف JavaScript الخاص بتغيير الصورة -->
    <script src="js/profile.js"></script>
</body>
</html>
