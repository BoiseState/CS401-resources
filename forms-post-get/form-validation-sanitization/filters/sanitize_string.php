<html>
<head>
<title>PHP Example: Filter: Sanitize a String</title>
<style>
.error { color:red; }
</style>
</head>
<body>
<h1>String #1 (<?= htmlspecialchars("has <h3> tags"); ?>)</h2>
  <p>
  <?php
    $messy_string = "<h3>I'm the first messy string!</h3>";
    echo "Messy string: $messy_string";
  ?>
  </p>
  <p>
  <?php
    /* Use filter_var() to remove all HTML tags from the messy string */
    $clean_string = filter_var($messy_string, FILTER_SANITIZE_STRING);
    echo "Clean string: $clean_string";
  ?>
  </p>
<h1>String #2 (<?= htmlspecialchars("has <span> tags"); ?>)</h2>
  <p>
  <?php
    $messy_string2 = "<span class=\"error\">I'm the second messy string!</span>";
    echo "Messy string: $messy_string2";
  ?>
  </p>
  <p>
  <?php
    /* Use filter_var() to remove all HTML tags from the messy string */
    $clean_string2 = filter_var($messy_string2, FILTER_SANITIZE_STRING);
    echo "Clean string: $clean_string2";
  ?>
  </p>
</body>
</html
