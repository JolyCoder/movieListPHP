<?php
require_once 'db.php';

$user_login = trim($_POST['user_login']);
$user_pwd = trim($_POST['user_pwd']);

if(!empty($user_login) && !empty($user_pwd))
{
  $sql_check = 'SELECT EXISTS(SELECT login, password FROM users WHERE login = :login)';
  $stmt_check = $pdo->prepare($sql_check);
  $stmt_check->execute([
    ':login' => $user_login
  ]);
  if($stmt_check->fetchColumn())
  {
    echo 'Пользователь уже существует!';
  }
  else {
      $sql = 'INSERT INTO users(login, password) VALUES (:login, :password)';
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        ':login' => $user_login,
        ':password' => password_hash($user_pwd, PASSWORD_DEFAULT)
      ]);
      echo "Вы успешно зарегестрировались! <br>";
      header("Location: ../login.php");
  }
}
else {
  echo "Неверный ввод";
}
?>
