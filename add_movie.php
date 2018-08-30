<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once 'parts/head.php'; ?>
    <link href="logic/css/styleAddMovie.css" rel="stylesheet">
  </head>
  <body>
    <?php include_once 'parts/header.php'; ?>
    <?php if(isset($_SESSION['user_login'])): ?>

      <div class="modal">
        <div class="hTeg">Добавить фильм</div>
        <hr>
        <form name="addFilm">
          <input type="text" name="movie_title" placeholder="Название фильма">
          <input type="number" name="movie_duration" placeholder="Длительность фильма">
          <input type="text" name="movie_genre" placeholder="Жанр фильма"> <br>
          <button name="buttonAdd" type="submit">Добавить</button>
        </form>
    </div>
    <?php else: ?>
      <script type="text/javascript">
            window.location.href = "login.php";
      </script>
    <?php endif; ?>
  </body>
</html>
