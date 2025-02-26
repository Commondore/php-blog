<?php
require_once __DIR__ . "/config/config.php";
$conn = getConnect();
$sql = "SELECT * FROM users";
$stmt = $conn->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php foreach ($users as $user): ?>
  <article>
    <h3>Имя: <?= $user["name"]; ?></h3>
    <p>Email: <?= $user["email"]; ?></p>
  </article>
<?php endforeach; ?>
</body>
</html>
