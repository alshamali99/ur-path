<?php


if(!$_SESSION['num'] || !$_SESSION['email'] || !$_SESSION['password']){
    exit();
}



$uploadDirectory = 'uploads/';
 

$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx'];
$maxFileSize = 20 * 1024 * 1024; // 20MB

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $fileName = basename($file['name']);
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    if ($fileError !== UPLOAD_ERR_OK) {
        echo "<p>حدث خطأ أثناء رفع الملف.</p>";
        exit;
    }

    if ($fileSize > $maxFileSize) {
        echo "<p>الملف كبير جدًا. الحد الأقصى لحجم الملف هو 20 ميجابايت.</p>";
        exit;
    }

    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "<p>الامتداد غير مسموح به. الرجاء رفع ملف بصيغة: jpg, jpeg, png, gif, pdf, أو docx.</p>";
        exit;
    }

    // فحص نوع MIME باستخدام finfo
    $fileInfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $fileInfo->file($fileTmpName);

    if (!in_array($mimeType, ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'])) {
        echo "<p>نوع الملف غير مسموح به.</p>";
        exit;
    }

    //    Chick images   imagecreatefromjpeg أو getimagesize
    if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
        $imageInfo = getimagesize($fileTmpName);  //Chicking is real pic or not
        if ($imageInfo === false) {
            echo "<p>الملف ليس صورة صحيحة.</p>";
            exit;
        }
    }

    // Create FileName
    $uniqueFileName = uniqid('', true) . '.' . $fileExtension;
    $fileDestination = $uploadDirectory . $uniqueFileName;

     /*   for .htaccess file  
      php_flag engine off
      AddType text/plain .php .phtml .php3 .php4 .php5
    */
    // نقل الملف إلى المجلد المحدد
    if (move_uploaded_file($fileTmpName, $fileDestination)) {
        echo "<p>تم رفع الملف بنجاح!</p>";
        $update_u_img=$conn->prepare("UPDATE users SET u_img=? where id=?") or die("Err -611");
        $update_u_img->bind_param("si",$uniqueFileName,$_SESSION['num']);
        $update_u_img->execute();
    } else {
        echo "<p>فشل رفع الملف. حاول مرة أخرى لاحقًا.</p>";
    }
} else {
    
}
?>
