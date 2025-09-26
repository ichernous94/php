<?php
$secret = "sk_live_A06memfnGFvmZ4BWBu_5d7uQPFZ4hbUyZCzWOqW74OM"; // твой ключ
$callbackData = file_get_contents('php://input'); // получаем тело запроса (RAW JSON)

// Формируем свою подпись (на основе секрета и тела запроса)
$mySignature = base64_encode(sha1($secret . $callbackData . $secret, true));

// Выводим её (для отладки)
echo "👉 Сформированная подпись: {$mySignature}\n";

// Проверяем, есть ли заголовок от клиента
$headerSignature = $_SERVER['HTTP_X_SIGNATURE'] ?? null;

if ($headerSignature === null) {
    http_response_code(400);
    echo "❌ Подпись не передана в заголовке (HTTP_X_SIGNATURE)\n";
    exit;
}

// Сравниваем подписи
if (hash_equals($mySignature, $headerSignature)) {
    http_response_code(200);
    echo "✅ Подпись совпала\n";
} else {
    http_response_code(403);
    echo "❌ Подпись НЕ совпала\n";
    echo "📩 Полученный X-Signature: {$headerSignature}\n";
}
