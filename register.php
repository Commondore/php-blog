<?php
    require_once __DIR__ . '/helpers/helpers.php';
    require_once __DIR__ . '/config/config.php';

    $conn = getConnect();

    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $confirmPassword = $_POST['confirmPassword'] ?? null;
    $errors = [];

    if(isSend()) {
        if(empty($name)) {
            $errors['name'] = "Имя обязательно";
        }
        if(empty($email)) {
            $errors['email'] = "Поле email обязательно";
        }
        if(empty($password)) {
            $errors['password'] = "Пароль обязательный";
        }
        if($password != $confirmPassword) {
            $errors['confirm'] = "Пароли не совпадают";
        }
        if(count($errors) == 0) {
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $conn->prepare($sql);
            $user = $stmt->execute([
                ":name" => $name,
                ":email" => $email,
                ":password" => password_hash($password, PASSWORD_DEFAULT)
            ]);
            if($user) {
                header('Location: index.php');
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
        <h1 class="title">Форма регистрации</h1>
        <form method="POST">
            <input type="hidden" name="action" value="send">
            <div class="form-group">
                <input type="text" placeholder="Имя пользователя" name="name">
                <?php getErrorMessage($errors, 'name'); ?>
            </div>
            <div class="form-group">
                <input type="email" placeholder="Ваше email" name="email" >
                <?php getErrorMessage($errors, 'email'); ?>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Введите пароль" name="password" >
                <?php getErrorMessage($errors, 'password'); ?>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Подтвердите пароль" name="confirmPassword" >
                <?php getErrorMessage($errors, 'confirm'); ?>
            </div>
            <div class="form-group">
                <button type="submit">Зарегистрировать</button>
            </div>
        </form>
    </div>

</body>
</html>
