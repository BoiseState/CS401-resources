<?php
	$thisPage = "PHP Arrays Demo"; 

	// 1d integer indexed
	$fruit = array( 'cherry' , 'strawberry', 'grape', 'eggplant' );
	//$fruit = [ 'cherry', 'strawberry' ];
	//$fruit[0];

	// 1d associative
	$links = array( 'Home'    => 'index.php',
			'About'   => 'about.php',
			'Contact' => 'contact.php',
			'Search'  => 'http://www.google.com' );
	//$links['Home'];

	// String to array
	$animals = "Ant, Bear, Cat, Dog, Elephant"; 
    	$animalArray = explode(",", $animals);  // php, it's dynamite.
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?= $thisPage ?></title>
	</head>
	<body>
		<header>
		<h1><?= $thisPage ?></h1>
		</header>
		<section>
			<h2>Printing for Debugging</h2>

			<h3>Fruit</h3>
			<pre><?php var_dump($fruit); print_r($fruit); ?></pre>

			<h3>Links</h3>
			<pre><?php var_dump($links); print_r($links); ?></pre>
			
			<h3>Animals</h3>
			<pre><?php var_dump($animalArray); print_r($animals); ?></pre>

			<h2>Printing Using Loops</h2>
			<h3>For loop</h3>
			<?php for($i = 0; $i < count($fruit); $i++ ) { ?>
				<p><?= $fruit[$i] ?></p>
			<?php } ?>
			<?php for($i = 0; $i < count($links); $i++ ) { ?>
				<p><?= $links[$i] ?></p>
			<?php } ?>

			<h3>For-each loop</h3>
			<?php foreach ($links as $name => $location) { ?>
				<a href="<?= $location?>"><?= $name ?></a>
			<?php } ?>

		</section>
	</body>
</html>
