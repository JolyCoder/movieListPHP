<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once 'parts/head.php'; ?>
  </head>
  <body>
    <div class="modal">
      <form action="logic/auth.php" method="post">
        <input type="text" name="user_login" placeholder="Login">
        <br>
        <br>
        <input type="password" name="user_pwd" placeholder="Password">
        <br>
        <br>
        <button class="button" type="submit" name="subBtn">Войти</button>
      </form>
    </div>
  </body>
</html>
