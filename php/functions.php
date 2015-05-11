<?php

  function student ($name, $major = "Computer Science") {
    echo "$name\n";
    echo "$major\n"; // will echo 'Computer Science'
  }

student("Buster Bronco");
student("Sally the Camel");
student("Zepher the Zebra", "Electrical Engineering");
?>
