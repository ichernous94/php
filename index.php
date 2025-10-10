<?php
// Данные запроса
$data = [
    "amount" => "250.00",
    "amountcurr" => "EGP",
    "paysys" => "EXT",
    "number" => "Invoice20251015",
    "description" => "Payment20251014",
    "validity" => "2025-10-15T23:59:59+02:00",
    "first_name" => "Ahmed",
    "last_name" => "Hassan",
    "email" => "ahmed.hassan@example.com",
    "notify_email" => "0",
    "phone" => "79991111111",
    "notify_phone" => "0",
    "backURL" => "https://merchant-website.com/payment/return",
    "account" => "ACC1117383",
    "user_id" => "987654321",
    "cf1" => "userid:987654321",
    "cf2" => "first_name:Ahmed",
    "cf3" => "last_name:Hassan"
];

// Секретные ключи (замени своими)
$secret_key_1 = "a8cb398c-e49e-ac00-fe96-3ff992a347b8";
$secret_key_2 = "fmQkYPNGh#EeJ&qLFbcV";

// Формируем строку для подписи — порядок должен строго соответствовать требованиям API
$signature_string = implode(":", [
    $data["amount"],
    $data["amountcurr"],
    $data["paysys"],
    $data["number"],
    $data["description"],
    $data["validity"],
    $data["first_name"],
    $data["last_name"],
    $data["email"],
    $data["notify_email"],
    $data["phone"],
    $data["notify_phone"],
    $data["backURL"],
    $data["account"],
    $data["user_id"],
    $data["cf1"],
    $data["cf2"],
    $data["cf3"],
    $secret_key_1,
    $secret_key_2
]);

// Вычисляем MD5-хэш
$signature = md5($signature_string);

// Для проверки
echo "Signature string: " . $signature_string . PHP_EOL;
echo "MD5 signature: " . $signature . PHP_EOL;
?>
