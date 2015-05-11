<html>
  <head>HTML table example</head>
  <body>
  <?php
    $data = file("data.txt"); // read file lines into an array ?>
    <table border="1"> <!-- add a border using a style sheet instead -->
    <?php
      foreach ($data as $student) { // loop over lines ?>
        <tr> <!-- begin table row -->
        <?php
          $line = explode("|", $student); // split line into array
          foreach ($line as $item) { // loop over items found in each line ?>
          <td><?php echo $item; ?></td> <!-- column containing data -->
        <?php } ?>
      </tr> <!-- end table row -->
    <?php } ?>
    </table>
  </body>
</html>
