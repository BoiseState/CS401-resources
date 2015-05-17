<?php

# PHP arrays can contain almost any data type
$stuff = array("Hello world!", 'C', new Thing(), array(1, 2, 3), 3.14);

# Prints the contents of the array.
print_r($stuff);

# can be numerically indexed or associative (indexed with strings)
$fruit = array("red" => array("cherry", "strawberry", "raspberry"),
               "purple" => array("grape", "eggplant"),
               "yellow" => array("banana", "lemon", "pineapple"));

# Prints the contents of the array.
print_r($fruit);

# can be treated like an array, hashmap, linked list, stack, etc
array_pop($fruit); // removes and returns the "yellow" element
print_r($fruit);

# There are like a bajillion built-in array functions.
# For example: sorts an array, maintaining key association.
asort($fruit);
print_r($fruit);

# checks if the given key or index exists
$exists = array_key_exists("blue", $fruit);
var_dump($exists);

# Shorthand for adding an element onto the end of an array.
# I use this ALL THE TIME, especially in loops.
$stuff[] = "more stuff";
print_r($stuff);

# Can use count to iterate through each element using
# a for-loop (works if elements are indexed from 0-n).
# This doesn't work on the fruit array because elements
# are index by color. Use for-each loop (below).
echo "Elements in stuff\n";
for($i=0; $i < count($stuff); $i++)
{
  var_dump($stuff[$i]);
}

# Iterate over all elements in fruit array.
echo "Elements in fruit\n";
foreach($fruit as $f) {
  print_r($f);
}


# Just a small class so the first example compiles.
class Thing {
  public function __construct() {
  }
}

?>
