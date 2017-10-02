<?php
require_once('User.php');
require_once('Movie.php');

# Reads movies from given file and returns an array of movie objects.
function readMovies($filename)
{
  $movies = array();

  $lines = file("movies.txt", FILE_IGNORE_NEW_LINES);
  foreach($lines as $line) {
    list($title, $director, $releaseDate) = explode(", ", $line);
    $movies[] = new Movie($title, $director, $releaseDate);
  }

  return $movies;
}
?>
