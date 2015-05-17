<html>
  <head>
    <title>HTML table example</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
  </head>
  <body>
  <?php $data = file("data.txt"); ?>
  <table>
    <!-- Table Header -->
    <tr>
    <?php
      $headers = trim(array_shift($data)); # get first line of file.
      $values = explode("|", $headers); # separate by '|' character.
      foreach($values as $header) { # print each value as header ?>
        <th><?= $header ?></th>
    <?php } ?>
    </tr>

    <!-- Table Data (Rows) -->
    <?php foreach($data as $row) { # iterate through rest of lines of file. ?>
      <tr>
      <?php
        $values = explode("|", $row); # separate by '|' character
        foreach($values as $value) { # print each value as data ?>
          <td><?= $value ?></td>
      <?php } ?>
      </tr>
    <?php } ?>
  </table>
  </body>
</html>
