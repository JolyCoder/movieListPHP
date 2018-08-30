<?php require_once 'logic/db.php'; ?>
<link href="logic/css/style.css" rel="stylesheet">
<nav>
<?php if(isset($_SESSION['user_login'])): ?>
  <ul class="css-menu-2">
    <li><a href="index.php">Главная</a></li>
    <li><a href="add_movie.php">Добавить фильм</a></li>
    <li><a href="allMovies.php">Список фильмов</a></li>
    <li><a href="logic/logout.php">Выход</a></li>
  </ul>
<?php else: ?>
  <ul class="css-menu-2">
    <li><a href="login.php">Авторизация</a></li>
    <li><a href="reg.php">Регистрация</a></li>
  </ul>
<?php endif; ?>
</nav>
