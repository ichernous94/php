<?php
$secret = "sk_live_A06memfnGFvmZ4BWBu_5d7uQPFZ4hbUyZCzWOqW74OM"; // твой ключ
$callbackData = file_get_contents('php://input'); // получаем тело запроса

// Проверяем, есть ли заголовок
$headerSignature = $_SERVER['HTTP_X_SIGNATURE'] ?? null;

if ($headerSignature === null) {
    http_response_code(400);
    echo "❌ Подпись не передана (нет заголовка HTTP_X_SIGNATURE)";
    exit;
}

// Формируем ожидаемую подпись
$expectedSignature = base64_encode(sha1($secret . $callbackData . $secret, true));

// Сравниваем безопасно
if (hash_equals($expectedSignature, $headerSignature)) {
    http_response_code(200);
    echo "✅ Подпись верна";
} else {
    http_response_code(403);
    echo "❌ Подпись НЕ верна";
}
