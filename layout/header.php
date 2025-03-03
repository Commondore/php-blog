<?php
  $userId = $_SESSION['user_id'];
?>

<header class="header">
  <div class="container header__container">
    <a class="header__logo" href="/blog/">Blog</a>
    <nav class="nav-auth">
      <?php if(!isset($userId)) : ?>
        <a href="/blog/register.php" class="nav-auth__link">Регистрация</a> /
        <a href="/blog/login.php" class="nav-auth__link">Войти</a>
      <?php endif; ?>
    </nav>
  </div>
</header>