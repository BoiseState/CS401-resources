<?php

// PHP arrays can contain almost any data type
$stuff = array("Hello world!", 'C', new Thing(), array(1, 2, 3), 3.14);

// can be numerically indexed or associative (indexed with strings)
$fruit = array("red" => array("cherry", "strawberry", "raspberry"),
               "purple" => array("grape", "eggplant"),
               "yellow" => array("banana", "lemon", "pineapple"));

// can be treated like an array, hashmap, linked list, stack, etc
array_pop($fruit); // removes and returns the "yellow" element

// There are like a bajillion built-in array functions.
// For example: sorts an array, maintaining key association.
asort($fruit);

// Prints the contents of the array.
print_r($fruit);

// checks if the given key or index exists
array_key_exists("blue", $fruit);

// Shorthand for adding an element onto the end of an array.
// I use this ALL THE TIME, especially in loops.
$stuff[] = "more stuff";


// Used on line 4.
class Thing {
  public function __construct() {
  }
}

?>
