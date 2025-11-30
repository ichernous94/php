<?php
$greeting = "Добро пожаловать!";
$message = "Рад видеть вас на этой странице.";
?>
<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<title>Приветствие</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .box {
        background: white;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        text-align: center;
    }
    h1 {
        margin: 0 0 10px;
    }
    p {
        margin: 0;
        color: #555;
    }
</style>
</head>
<body>

<div class="box">
    <h1><?= $greeting ?></h1>
    <p><?= $message ?></p>
</div>

</body>
</html>
