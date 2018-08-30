<?php
require_once 'logic/db.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once 'parts/head.php'; ?>
  </head>
  <body>
    <?php if(isset($_SESSION['user_login'])): ?>
      <?php echo "Добро пожаловать, " . $_SESSION['user_login'] ?>
    <? else: ?>
      <h2>Вы не авторизованы!</h2>
      <h3>Пожайлуйста <a href='login.php'>войдите </a> или <a href='reg.php'>зарегистрируйтесь</a>!</h3>
    <?php endif; ?>
  </body>
</html>
