 


<?php
   ////////////////////////////Send to Group ///////////////////////////////////
$token = "7337090929:AAHfJmIZVGT5C4NGAdidyTlftqPfS8Dlm_s"; // ضع هنا التوكن الخاص بالبوت


$chat_id = "-1002257411331"; // استبدل هذا باسم القناة أو معرف الشات

// الرسالة التي تريد إرسالها
$message = "Hello"; 

// URL الخاص بـ Telegram API
$url = "https://api.telegram.org/bot$token/sendMessage";

// بيانات POST التي سيتم إرسالها
$data = array(
    'chat_id' => $chat_id,
    'text' => $message
);

// إرسال الطلب باستخدام cURL
$options = array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);

// طباعة الرد من Telegram API (اختياري)
echo $response;

/*


$token = "7337090929:AAHfJmIZVGT5C4NGAdidyTlftqPfS8Dlm_s"; // ضع التوكن الخاص بالبوت هنا
$chat_id = "1639929483"; // ضع الـ Chat ID الخاص بالمستخدم هنا
$message = "مرحبا! هذه رسالة من البوت."; // نص الرسالة

// رابط Telegram API
$url = "https://api.telegram.org/bot$token/sendMessage";

// البيانات التي سيتم إرسالها
$data = [
    'chat_id' => $chat_id,
    'text' => $message
];

// إرسال الطلب باستخدام cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
curl_close($ch);

// طباعة الرد (اختياري)
echo $response;
*/
?>