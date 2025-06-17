<?php


if(!$_SESSION['num'] || !$_SESSION['email'] || !$_SESSION['password']){
    exit();
}



$uploadDirectory = 'uploads/';
$doc_num=strip_tags($_POST['tax_num']);

$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
$maxFileSize = 20 * 1024 * 1024; // 20MB

if (isset($_FILES['upload_tax'])) {
    $file = $_FILES['upload_tax'];
    $fileName = basename($file['name']);
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    if ($fileError !== UPLOAD_ERR_OK) {
        echo "<p>ط·آ­ط·آ¯ط·آ« ط·آ®ط·آ·ط·آ£ ط·آ£ط·آ«ط¸â€ ط·آ§ط·طŒ ط·آ±ط¸ظ¾ط·آ¹ ط·آ§ط¸â€‍ط¸â€¦ط¸â€‍ط¸ظ¾.</p>";
        exit;
    }

    if ($fileSize > $maxFileSize) {
        echo "<p>ط·آ§ط¸â€‍ط¸â€¦ط¸â€‍ط¸ظ¾ ط¸ئ’ط·آ¨ط¸ظ¹ط·آ± ط·آ¬ط·آ¯ط¸â€¹ط·آ§. ط·آ§ط¸â€‍ط·آ­ط·آ¯ ط·آ§ط¸â€‍ط·آ£ط¸â€ڑط·آµط¸â€° ط¸â€‍ط·آ­ط·آ¬ط¸â€¦ ط·آ§ط¸â€‍ط¸â€¦ط¸â€‍ط¸ظ¾ ط¸â€،ط¸ث† 20 ط¸â€¦ط¸ظ¹ط·آ¬ط·آ§ط·آ¨ط·آ§ط¸ظ¹ط·ع¾.</p>";
        exit;
    }

    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "<p>ط·آ§ط¸â€‍ط·آ§ط¸â€¦ط·ع¾ط·آ¯ط·آ§ط·آ¯ ط·ط›ط¸ظ¹ط·آ± ط¸â€¦ط·آ³ط¸â€¦ط¸ث†ط·آ­ ط·آ¨ط¸â€،. ط·آ§ط¸â€‍ط·آ±ط·آ¬ط·آ§ط·طŒ ط·آ±ط¸ظ¾ط·آ¹ ط¸â€¦ط¸â€‍ط¸ظ¾ ط·آ¨ط·آµط¸ظ¹ط·ط›ط·آ©: jpg, jpeg, png, gif, pdf, ط·آ£ط¸ث† docx.</p>";
        exit;
    }

    // ط¸ظ¾ط·آ­ط·آµ ط¸â€ ط¸ث†ط·آ¹ MIME ط·آ¨ط·آ§ط·آ³ط·ع¾ط·آ®ط·آ¯ط·آ§ط¸â€¦ finfo
    $fileInfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $fileInfo->file($fileTmpName);

    if (!in_array($mimeType, ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'])) {
        echo "<p>ط¸â€ ط¸ث†ط·آ¹ ط·آ§ط¸â€‍ط¸â€¦ط¸â€‍ط¸ظ¾ ط·ط›ط¸ظ¹ط·آ± ط¸â€¦ط·آ³ط¸â€¦ط¸ث†ط·آ­ ط·آ¨ط¸â€،.</p>";
        exit;
    }

    //    Chick images   imagecreatefromjpeg ط·آ£ط¸ث† getimagesize
    if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
        $imageInfo = getimagesize($fileTmpName);  //Chicking is real pic or not
        if ($imageInfo === false) {
            echo "<p>ط·آ§ط¸â€‍ط¸â€¦ط¸â€‍ط¸ظ¾ ط¸â€‍ط¸ظ¹ط·آ³ ط·آµط¸ث†ط·آ±ط·آ© ط·آµط·آ­ط¸ظ¹ط·آ­ط·آ©.</p>";
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
    if (move_uploaded_file($fileTmpName, $fileDestination)) {
       
        mysqli_query($conn,"DELETE from org_docs where u_id=".$user_l['id']." AND doc_type='tax' ") or die("Er-doc-del");
        $work_file=strip_tags($_POST['upload_tax']);
        $f_type="tax";

        $org_doc_file_upload=$conn->prepare("INSERT INTO org_docs(doc_num,doc_name,`u_id`,doc_type) values(?,?,?,?) ") or die("Err -854");
        $org_doc_file_upload->bind_param("ssis",$doc_num,$uniqueFileName,$user_l['id'],$f_type);
        $org_doc_file_upload->execute();
    } else {
        echo "<p>ط¸ظ¾ط·آ´ط¸â€‍ ط·آ±ط¸ظ¾ط·آ¹ ط·آ§ط¸â€‍ط¸â€¦ط¸â€‍ط¸ظ¾. ط·آ­ط·آ§ط¸ث†ط¸â€‍ ط¸â€¦ط·آ±ط·آ© ط·آ£ط·آ®ط·آ±ط¸â€° ط¸â€‍ط·آ§ط·آ­ط¸â€ڑط¸â€¹ط·آ§.</p>";
    }
} else {
    
}

/////////////////////////////////////////
function doc_cat($doc){

    switch ($doc) {
        case 1:
          $doc_type="sjl";
          break;
          case 2:
            $doc_type="free_lancer";
            break;
            case 3:
                $doc_type="tax";
                break;
      

          default:
          $doc_type=1;
  
        }

return $doc_type;    }

?>
