<?php
# This is a php comment
// So is this.
/* and this. */

# variables are always preceded with '$' and are loosely typed.
$first_name = "Bob";
$last_name = "Smith";
$age = 43;
$favorite_color = "red";

# concatenate strings with a '.', not a '+'
$full_name = $first_name . " " . $last_name;

# addition operator will try to extract number from string.
$result = $age + "2 turtle doves"; # result is 45 (43 + 2).

# type checking.
if(is_string($full_name))
{
   echo "true";
}

# integer division can produce a float.
$value = 3/2;
echo "3/2 =" . $value;

# printing type/value of variable can be useful for debugging.
var_dump($value);
?>

<!-- Expression Blocks are useful for printing values -->
<?= "<p>Hello $full_name!</p>"; ?>

<!-- Embedding PHP in HTML (preferred way)-->
<ul>
<li><?= $full_name ?></li>
<li><?= $age ?></li>
<li><?= $favorite_color ?></li>
</ul>

<table>
<tr><th>i</th><th>i*2</th></tr>
<?php
for($i=0; $i < 10; $i++) {
  if($i % 2 == 0) { ?>
    <tr><td><?= $i ?></td><td><?= $i * 2 ?></td></tr>
<?php
  }
}
?>
</table>


