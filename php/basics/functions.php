<html>
<head>
  <title>Functions</title>
</head>
<body>
<?php
  // This is a global variable.
  $user = "Buster Bronco";

  /*
   * This function accepts two parameters. If only one parameter is passed in,
   * the major will be the default value.
   */
  function student ($name = "Name", $major = "Computer Science") {
    echo "Name: $name, Major: $major";
    // return 0;
  }


  student('Bob', 'EE');
  student('Mary');

  /*
   * This function uses the global variable, $user. You must let the function
   * know that user is defined globally.
   */
  function sayHello() {
    global $user; # This will not work if you comment this out. Also doesn't work
                  # if the global user variable is not defined. Try it.
    $greeting = "Hello";

    echo "$greeting $user!";
  }

  /*
   * It is usually better to just use parameters than depend of the existence of
   * global variables.
   */
  function sayHi($user) {
    $greeting = "Hi there";
    echo "$greeting, $user!";
  }
?>

<!-- Call the functions and display output. -->
<p><?= student($user); # uses default major ?></p>
<p><?= student("Sally the Camel", "Electrical Engineering"); ?></p>
<p><?= student() # doesn't work! ?></p>
<p><?= student(8, 10, 12); # Still works! ?>

<p><?= sayHello(); ?></p>

<p><?= sayHi("Grandpa Jo"); ?></p>

</body>
</html>
