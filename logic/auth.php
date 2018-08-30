<?php
require_once 'db.php';

$usr_log = trim($_POST['user_login']);
$usr_pwd = trim($_POST['user_pwd']);

if(empty($usr_log) || empty($usr_pwd)) {
  echo "Неверный ввод";
}
else {
  $sql = 'SELECT login, password FROM users WHERE login = :usr_log';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':usr_log' => $usr_log]);
  $usr = $stmt->fetch(PDO::FETCH_OBJ);
  if($usr) {
    if(password_verify($usr_pwd, $usr->password))
    {
      $_SESSION['user_login'] = $usr->login;
      header("Location: ../index.php");
    }
    else {
      echo "Неверный логин или пароль";
    }
  }
  else {
    echo 'Пользователь не существует!';
    ?> <h3>Пожайлуйста <a href='../reg.php'>зарегистрируйтесь</a>!</h3> <?php
  }
}
?>
