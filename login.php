<?php
require_once __DIR__ .'/config/config.php';
require_once __DIR__ .'/helpers/helpers.php';

$email = $_POST["email"] ?? null;
$password = $_POST["password"] ?? null;
$errors = [];

if(isSend()) {
    if(empty($email)) {
        $errors['email'] = 'Поле email не должно быть пустым';
    }
    if(empty($password)) {
        $errors['password'] = 'Поле password не должно быть пустым';
    }

    $conn = getConnect();
    $sql = 'SELECT * FROM users WHERE email = :email';
    $stmt = $conn->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$user) {
        $errors['email'] = 'Такого email не существует';
    } else {
        if(password_verify($password, $user['password'])) {
            session_set_cookie_params(3600);
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['name'];
            header('Location: index.php');
        } else {
            $errors['password'] = 'Неверный пароль';
        }

    }
}


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
                <?php getErrorMessage($errors, 'email'); ?>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Укажите пароль">
                <?php getErrorMessage($errors, 'password'); ?>
            </div>
            <div class="form-group">
                <button type="submit">Войти</button>
            </div>
        </form>
    </div>
</body>
</html>
