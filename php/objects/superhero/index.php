<?php
	require_once('Superhero.php');

	$title = "Superhero of the Day";

	$hero = new Superhero("Peter", "Parker", "Spiderman", "Spidey-sense");
?>

<html>
<head>
	<title><?= $title ?></title>
</head>
<body>
  <header>
    <!-- Current page title. Make this dynamic using variable. -->
	<h1><?= $title ?></h1>
  </header>
  <main>
    <article>
      <section>
        <!-- We want to be able to easily swap out the super hero of the day -->
        <h2>Stats</h2>
        <dl>
		  <dt>Name:</dt><dd><?= $hero->getFullName(); ?></dd>
          <dt>Alias:</dt><dd><?= $hero->getAlias(); ?></dd>
		  <dt>Abilities:</dt><dd><?= $hero->getAbilities(); ?></dd>
        </dl>
        <p>
		Our superhero is <?= $hero ?>. Abilities are <?= $hero->getAbilities(); ?>.
        Initials are <?= $hero->getInitials(); ?>
        </p>
      </section>
      <?php if($hero->getAlias() == "The Hulk") { ?>
	  <section>
        <!-- Only print this section if the super-hero of the day is The Hulk -->
        <h2>Visible if super-hero is "The Hulk"</h2>
        <p>Welcome Hulk. Now <strong>SMASH!</strong></p>
	  </section>
      <?php } else { ?>
      <section>
        <!-- Print this section if the super-hero of the day is NOT The Hulk -->
        <h2>Welcome</h2>
        <p>Welcome new user. Hope you are having a lovely day!</p>
      </section>
      <?php } ?>
    </article>
  </main>
</body>
</html>
