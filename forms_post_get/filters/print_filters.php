<html>
<head>
<title>PHP Example: Print Filter Info</title>
</head>
<body>
<table>
<tr>
	<td>Filter Name</td>
	<td> Filter ID</td>
</tr>

<?php
	foreach (filter_list() as $id => $filter)
	{
		echo '<tr>';
		echo '<td>' . $filter . '</td>';
		echo '<td>' . filter_id($filter) . '</td>';
		echo '</tr>';
	}
?>

</table>


</body>
</html
