<?php

$hex = "#0000000";
$match = preg_match("/^#[0-9A-Fa-f]{7}/", $hex);

if($match) {
  echo "match!\n";
} else {
  echo "no match!\n";
}


?>
