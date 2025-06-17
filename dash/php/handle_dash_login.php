<?php
session_start();
include '../admin/db.php';

// التحقق من إرسال البيانات
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    echo "يرجى إدخال جميع البيانات";
    exit;
}

$email = trim($_POST['email']);
$password = trim($_POST['password']);

// منع حقن SQL بسيط
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// الاستعلام عن المستخدم ودوره
$query = "
SELECT u.*, r.role_name 
FROM users u 
LEFT JOIN roles r ON u.role_id = r.id 
WHERE u.email = '$email' AND u.password = '$password'
LIMIT 1
";

$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "❌ بيانات الدخول غير صحيحة";
    exit;
}

$user = mysqli_fetch_assoc($result);

// تخزين بيانات المستخدم في الجلسة
$_SESSION['user_id'] = $user['id'];
$_SESSION['email']   = $user['email'];
$_SESSION['role']    = $user['role_name']; // لتحديد الصلاحيات لاحقاً في الصفحة
$_SESSION['num']     = $user['id'];        // نفس القيمة التي تستخدمها مسبقًا
$_SESSION['password'] = $user['password']; // لدعم ملف user_in_header.php
$_SESSION['user_t']  = $user['role_name']; // لتوحيد التنسيق مع المتغير المستخدم في header.php

// توجيه واحد للجميع
echo "success";
?>
