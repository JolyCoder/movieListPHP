<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php require_once 'parts/head.php'; ?>
  </head>
  <body>
    <?php include_once 'parts/header.php' ?>
    <?php if(!isset($_SESSION['user_login'])): ?>
      <div class="modal">
        <form action="logic/regs.php" method="post">
          <input type="text" name="user_login" placeholder="Login">
          <br>
          <br>
          <input type="password" name="user_pwd" placeholder="Password">
          <br>
          <br>
          <button class="button" type="submit" name="subBtn">Зарегистрироваться</button>
        </form>
      </div>
    <?php else: ?>
      <script type="text/javascript">
          window.location.href = "login.php"
      </script>
    <?php endif; ?>
  </body>
</html>
