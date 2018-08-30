<?php
$sql = "SELECT films.id, films.title, films.duration, films.genre FROM films GROUP BY  films.id, films.title, films.duration, films.genre";

$stmt = $pdo->query($sql);

while($result = $stmt->fetch(PDO::FETCH_OBJ)): ?>
<div class='movie_container' id=<?php echo 'movie_' . $result->id; ?> data-movie-id=<?php echo $result->id; ?>>
  <h3 class="movie_title">Название: <?php echo $result->title; ?></h3>
  <h3 class="movie_duration">Длительность: <?php echo $result->duration; ?></h3>
  <h3 class="movie_genre">Жанр: <?php echo $result->genre; ?></h3>
  <?php if(isset($_COOKIE['watched']) && array_key_exists($result->id, $_COOKIE['watched'])): ?>
    <button class="movie_watched movie_watched_active">(Смотрел)</button>
  <?php else: ?>
    <button class="movie_watched">(Не смотрел)</button>
  <?php endif; ?>
  <button type="button" class="movie_del">Удалить</button>
</div>
<hr>
<?php endwhile; ?>
