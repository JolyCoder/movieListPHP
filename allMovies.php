<?php
  require_once 'logic/db.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once 'parts/head.php'; ?>
  </head>
  <body>
    <?php include_once 'parts/header.php'; ?>
    <?php if(isset($_SESSION['user_login'])): ?>
    <h3>Всего просмотрено фильмов: <span id="watched_count"><?php if(isset($_COOKIE['watched'])):
              echo count($_COOKIE['watched']);
            else:
              echo 0;
            endif;
      ?></span></h3>
      <section id="movie-sec">
          <?php require_once 'logic/allMovies.php'; ?>
      </section>
    <?php else: ?>
      <script type="text/javascript">
          window.location.href = "login.php";
      </script>
    <?php endif; ?>
  </body>
</html>
