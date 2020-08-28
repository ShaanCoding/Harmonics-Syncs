<html>hello</html>

<?php

require_once("include/genres.php");

$genre_db = new Genres;
echo var_dump($genre_db->GetAllGenres());

?>

