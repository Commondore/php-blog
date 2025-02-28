<?php
require_once __DIR__ .'/config/config.php';
require_once __DIR__ .'/helpers/helpers.php';

$email = $_POST["email"] ?? null;
$password = $_POST["password"] ?? null;

if(isset($_POST['action']) && $_POST['action'] == 'send') {

}

$conn = getConnect();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Форма авторизации</h1>
        <form method="post">
            <input type="hidden" name="action" value="send">
            <div class="form-group">
                <input type="email" name="email" placeholder="Укажите email">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Укажите пароль">
            </div>
            <div class="form-group">
                <button type="submit">Войти</button>
            </div>
        </form>
    </div>
</body>
</html>
