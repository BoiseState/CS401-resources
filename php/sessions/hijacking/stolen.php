<style>
table, tr, th, td {
	border-collapse: collapse;
	border: 2px solid black;
}

th, td {
	padding: 1em;
}
</style>

<?php
$fp = fopen('stolen.csv', 'r');
?>
<table>
	<tr><th>Cookie</th><th>UserAgent</th></tr>
	<?php while(($line = fgetcsv($fp, ','))) { 
		list($cookie, $userAgent) = $line; ?>
		<tr><td><?= $cookie ?></td><td><?= $userAgent ?></td></tr>
	<?php } ?>
</table>
