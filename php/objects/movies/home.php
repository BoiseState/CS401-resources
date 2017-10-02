<?php require_once('MovieFileDAO.php'); ?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
# create a new user
$user1 = new User("HotDog42", "hotdog42@gmail.com");

# read the movies from the file.
$movies = readMovies("movies.txt");

$user1->addFavMovie($movies[0]);
$user1->addFavMovie($movies[count($movies) - 1]);
?>
<h1>All Movies</h1>
  <ul>
  <?php foreach($movies as $movie) { ?>
    <li><?= $movie; ?></li>
  <?php } ?>
  </ul>

<h1><?= $user1->getUsername() . "'s " ?> Favorite Movies</h1>
  <ul>
  <?php foreach($user1->getFavMovies() as $movie) { ?>
    <li><?= $movie; ?></li>
  <?php } ?>
  </ul>
</body>
</html>
