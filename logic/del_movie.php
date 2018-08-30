<?php
require_once 'db.php';
$movie_id = $_POST['del_id'];

$sql = "DELETE FROM films WHERE id = ?";
$stmt = $pdo->prepare($sql);

$stmt->execute([$movie_id]);

$cookie_name = "watched[$movie_id]";
if(isset($_COOKIE['watched']) && array_key_exists($movie_id, $_COOKIE['watched']))
{
  setcookie($cookie_name, '', time() - 3600, '/');
}

echo (bool) $stmt->rowCount();
?>
