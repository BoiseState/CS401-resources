<?php
require_once('users.php');

$user = "Snoopy";
$supername = "Natalia Romanova";
$superalias = "Black Widow";
$superage = 33;

$equal = ($superage == "33 eggs"); // true
$equal = ($superage === "33"); // false
?>
<html>
<head>
  <title>PHP Basics and Syntax</title>
</head>
<body>
  <header>
    <!-- Current page title. Make this dynamic -->
    <h1>PHP Basics and Syntax</h1>
  </header>
  <main>
    <span id="intro">We will  PHP-ize this in class.</span>
    <article>
      <section>
        <h2>Supehero of the day</h2>
        <dl>
        <dt>Name:</dt><dd><?= $supername; ?></dd>
        <dt>Alias:</dt><dd><?= $superalias; ?></dd>
        <dt>Age:</dt><dd><?= $superage; ?></dd>
        </dl>
        <p>
          Our superhero is Natalia Romanova (aka. Black Widow). She is 33 years old.
          Her initials are N.R.
        </p>
      </section>
      <section>
        <h2>Math</h2>
        <p>
        2 turtle doves + 3 French hens =
        <?php
          $result = "2 turtle doves" + "3 French hens";
          echo $result;
        ?>
        </p>
        <ul>
          <?php for($i=0; $i < 19; $i++) { ?>
          <li>
          <?php echo "$i squared is " . $i*$i . "."; ?>
          </li>
          <?php } ?>
        </ul>
      </section>
      <?php if ($user == "TheHulk") { ?>
      <!-- Can we see you? -->
      <section>
        <h2>Visible if user is "TheHulk"</h2>
        <p>Welcome Hulk. Now <strong>SMASH!</strong></p>
      </section>
      <?php } else { ?>
      <section>
        <h2>Otherwise, this is visible</h2>
        <p>Welcome new user. Hope you are having a lovely day!</p>
      </section>
      <?php } ?>
      <section>
        <h2>PHP, It's Dynamite</h2>
        <?php $fruits = "Apple, Banana, Peach, Pear, Grape"; ?>
        <p><?= $fruits; ?></p>
        <h3>Watch it explode!</h3>
        <pre>
        <?php
        $fruit_array = explode(",", $fruits);
        var_dump($fruit_array);
        ?>
        <h3>and implode</h3>
        <?php
        $fruits = implode(":", $fruit_array);
        var_dump($fruits);
        ?>
        </pre>
      </section>
      <section>
        <h2>Arrays</h2>
        <p>Go look at <a href="https://github.com/BoiseState/CS401-lab/blob/master/php/basics/arrays.php">arrays.php</a>.
      </section>
      <section>
        <h2>A Lovely Table</h2>
        <table>
          <tr><th>User</th><th>Alias</th></tr>
          <tr><td>Natalia Romanova</td><td>Black Widow</td></tr>
          <tr><td>Bruce Banner</td><td>Hulk</td></tr>
          <tr><td>Clark Kent</td><td>Superman</td></tr>
          <tr></tr>
        </table>
        <h3>Printed using PHP file i/o</h3>
        <p>We can open a file and store each line as an element of an array using the
           PHP's <a href="http://php.net/manual/en/function.file.php">file</a> function.
           For example, we can say
          <pre>
            $lines = file("users.txt");
          </pre>
          If we want to ignore new line characters and skip empty lines, then we can use
          the following flags
          <pre>
            $lines = file("users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
          </pre>
          The resulting array would have the following contents:
          <pre>

          <?php
            $filename = "users.txt";
            $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            var_dump($lines);
          ?>
          </pre>
        </p>
        <p>Now we can get the first line of the file to use as headers for our table using the
           <a href="http://php.net/manual/en/function.array-shift.php">array_shift()</a> function
            (which removes the first element of the array and shifts the other elements). Or, if
            we have a really big array and speed matters, we could use array_reverse followed by
            array_pop. But we don't care about speed right now.
            <pre>
              $header = array_shift($lines);
            </pre>
            So, $header will have the following contents.
            <pre>
            <?php
              $header = array_shift($lines);
              var_dump($header);
            ?>
            </pre>
            which we can split on the "|" character and add the data to a table.
            To split the lines, we can use either of the following:
            <pre>
              $data = explode("|", $row);

              list($user, $alias) = explode("|", $row);
            </pre>
            Finally, we will use a foreach loop to parse the remaining elements in the array of
            lines. Here is the full table using this method.
            <?php
            $values = explode("|", $header);
            ?>
            <table>
              <tr><th><?= $values[0] ?></th><th><?= $values[1] ?></th></tr>
              <?php foreach($lines as $line) {
                list($user, $alias) = explode("|", $line);
              ?>
              <tr><td><?= $user ?></td><td><?= $alias ?></td></tr>
              <?php } ?>
            </table>
          </p>
        <h3>Printed using custom function</h3>
          <p>Now, let's clean this up a bit and move the table printing into a function.</p>
          <p>First, let's look at this <a href="https://github.com/BoiseState/CS401-lab/blob/master/php/basics/functions.php">
            handy functions example</a>.
          </p>
<?php
// First, define the funciton.
// A function that prints the contents of a users file in a table.
function print_user_table($filename = "users.txt") {
      $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      $header = array_shift($lines);
      $values = explode("|", $header); ?>
      <table>
        <tr><th><?= $values[0] ?></th><th><?= $values[1] ?></th></tr>
        <?php foreach($lines as $line) {
          list($user, $alias) = explode("|", $line); ?>
          <tr><td><?= $user ?></td><td><?= $alias ?></td></tr>
        <?php } ?>
      </table>
<?php } ?>
        <?php
        // Then call the function (this will print the table).
        print_user_table();
        ?>
        <h3>Printed using custom function included from separate file</h3>
          <p>We can include php code from other files using the <a href="http://php.net/manual/en/function.include.php">include
            </a> or <a href="http://php.net/manual/en/function.require.php">require</a> functions.
            <pre>
              include("users.php");
              include_once("users.php"); #recommended
              require("users.php");
              require_once("users.php"); #recommended
            </pre>
          </p>
<?php
          // Include file containg function. Probably would include at top of this file, but
          // doing it here to keep example together.
          include_once("users.php");
          // Call function defined in included file.
          print_user_table_included();
?>

      </section>
    </article>
  </main>
</body>
</html>

