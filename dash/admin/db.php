<?php
$host = "127.0.0.1";  
$dbname = "ur_path_dashboard";  
$username = "root"; 
$password = "";  

// إنشاء الاتصال
$conn = mysqli_connect($host, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if (!$conn) {
    die("❌ No Connection ... ");
}


?> 
