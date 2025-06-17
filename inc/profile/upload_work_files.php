<?php


if(!$_SESSION['num'] || !$_SESSION['email'] || !$_SESSION['password']){
    exit();
}



$uploadDirectory = 'uploads/';
 

$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
$maxFileSize = 20 * 1024 * 1024; // 20MB

if (isset($_FILES['work_file'])) {
    $file = $_FILES['work_file'];
    $fileName = basename($file['name']);
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    if ($fileError !== UPLOAD_ERR_OK) {
        echo "<p>ط­ط¯ط« ط®ط·ط£ ط£ط«ظ†ط§ط، ط±ظپط¹ ط§ظ„ظ…ظ„ظپ.</p>";
        exit;
    }

    if ($fileSize > $maxFileSize) {
        echo "<p>ط§ظ„ظ…ظ„ظپ ظƒط¨ظٹط± ط¬ط¯ظ‹ط§. ط§ظ„ط­ط¯ ط§ظ„ط£ظ‚طµظ‰ ظ„ط­ط¬ظ… ط§ظ„ظ…ظ„ظپ ظ‡ظˆ 20 ظ…ظٹط¬ط§ط¨ط§ظٹطھ.</p>";
        exit;
    }

    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "<p>ط§ظ„ط§ظ…طھط¯ط§ط¯ ط؛ظٹط± ظ…ط³ظ…ظˆط­ ط¨ظ‡. ط§ظ„ط±ط¬ط§ط، ط±ظپط¹ ظ…ظ„ظپ ط¨طµظٹط؛ط©: jpg, jpeg, png, gif, pdf, ط£ظˆ docx.</p>";
        exit;
    }

    // ظپط­طµ ظ†ظˆط¹ MIME ط¨ط§ط³طھط®ط¯ط§ظ… finfo
    $fileInfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $fileInfo->file($fileTmpName);

    if (!in_array($mimeType, ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'])) {
        echo "<p>ظ†ظˆط¹ ط§ظ„ظ…ظ„ظپ ط؛ظٹط± ظ…ط³ظ…ظˆط­ ط¨ظ‡.</p>";
        exit;
    }

    //    Chick images   imagecreatefromjpeg ط£ظˆ getimagesize
    if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
        $imageInfo = getimagesize($fileTmpName);  //Chicking is real pic or not
        if ($imageInfo === false) {
            echo "<p>ط§ظ„ظ…ظ„ظپ ظ„ظٹط³ طµظˆط±ط© طµط­ظٹط­ط©.</p>";
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
    // ظ†ظ‚ظ„ ط§ظ„ظ…ظ„ظپ ط¥ظ„ظ‰ ط§ظ„ظ…ط¬ظ„ط¯ ط§ظ„ظ…ط­ط¯ط¯
    if (move_uploaded_file($fileTmpName, $fileDestination)) {
        $work_file=strip_tags($_POST['work_file']);
        $upload_work_file=$conn->prepare("INSERT INTO pr_my_works(file_link,`u_id`,file_type) values(?,?,?) ") or die("Err -854");
        $f_type='file';
        $upload_work_file->bind_param("sis",$uniqueFileName,$user_l['id'],$f_type);
        $upload_work_file->execute();
    } else {
        echo "<p>ظپط´ظ„ ط±ظپط¹ ط§ظ„ظ…ظ„ظپ. ط­ط§ظˆظ„ ظ…ط±ط© ط£ط®ط±ظ‰ ظ„ط§ط­ظ‚ظ‹ط§.</p>";
    }
} else {
    
}
?>
