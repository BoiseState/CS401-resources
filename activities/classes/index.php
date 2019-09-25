<?php
  // Import the Superhero class
  require_once('Superhero.php');

  // Page title
  $title = "Superhero of the Day";

  // Create new superhero object instance
  $hero = new Superhero("Peter", "Parker", "Spiderman");
  $hero->addAbility("spidey-sense");
  $hero->addAbility("web shooters");
  $hero->addAbility("super-human strength");
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
      <!-- Call methods on our hero instance to generate the super hero of the day -->
      <section>
        <h2>Stats</h2>
        <dl>
          <dt>Name:</dt><dd><?= $hero->getFullName(); ?></dd>
          <dt>Alias:</dt><dd><?= $hero->getAlias(); ?></dd>
          <dt>Abilities:</dt><dd>
          <ul>
          <?php foreach($hero->getAbilities() as $ability) { // print each ability as list item ?> 
            <li><?= $ability; ?></li>
          <?php } ?>
          </ul>
        </dl>
        <p>
          Our superhero is <?= $hero ?>. Abilities are <?= implode(", ", $hero->getAbilities()); ?>.
          Initials are <?= $hero->getInitials(); ?>
        </p>
      </section>

      <!-- Only print the following section if the super-hero of the day is The Hulk -->
      <!-- Why? Because we can. -->
      <?php if($hero->getAlias() == "The Hulk") { ?>
      <section>
        <h2>Visible if super-hero is "The Hulk"</h2>
        <p>Welcome new user. Now <strong>SMASH!</strong></p>
      </section>
      <!-- Only print the following section if the super-hero of the day is NOT The Hulk -->
      <?php } else { ?>
      <section>
        <h2>Welcome</h2>
        <p>Welcome new user. Hope you are having a lovely day!</p>
      </section>
      <?php } ?>
    </article>
  </main>
</body>
</html>
