<?php

require_once 'db.php';

function getNakInput($input) {
  return htmlentities($input);
}

$movie_title = $_POST['movie_title'];
$movie_duration = $_POST['movie_duration'];
$movie_genre = $_POST['movie_genre'];

if(empty($movie_title) || empty($movie_duration) || empty($movie_genre)) {
  die('Неверный ввод');
}
else{
  try {
    $sql = 'INSERT INTO films(title, duration, genre) VALUES (:title, :duration, :genre)';
    $stmt = $pdo->prepare($sql);
    $parms = [
      ':title' => $movie_title,
      ':duration' => $movie_duration,
      ':genre' => $movie_genre
    ];
    $stmt->execute($parms);
    echo "Вы успешно добавили фильм!";
  }
  catch(PDOException $e)
  {
    echo "Во время исполнения скрипта произошла ошибка: " . $e;
  }
}
?>
