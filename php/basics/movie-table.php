<?php
function printTable()
{
	$contents = file_get_contents("movies.txt");
	$movies = explode("\n", $contents);
?>
<table>
  <thead>
    <tr>
		<th>Title</th><th>Actor</th><th>Director</th>
    </tr>
  </thead>
<?php
	// php explode turns string into array using delim
	foreach ($movies as $movie) {
		if(empty($movie)) {
			continue;
		}
		list($title, $actor, $director) = explode(", ", $movie);
		# THIS IS UGLY. BETTER TO OPEN/CLOSE PHP TAGS
		echo "<tr>";
		echo "<td>$title</td>";
		echo "<td>$actor</td>";
		echo "<td>$director</td>";
		echo "</tr>";
	}
?>
</table>
<?php
}
?>
