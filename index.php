<?php
$secret = "sk_live_A06memfnGFvmZ4BWBu_5d7uQPFZ4hbUyZCzWOqW74OM"; // твой ключ
$callbackData = file_get_contents('php://input'); // получаем тело запроса
$signature = base64_encode(sha1($secret . $callbackData . $secret, true));

if (hash_equals($_SERVER['HTTP_X_SIGNATURE'], $signature)) {
    http_response_code(200);
    echo "Подпись верна ✅";
} else {
    http_response_code(400);
    echo "Подпись НЕ верна ❌";
}