<?php
require_once('NameAutoComplete.php');

if(isset($_GET["q"]))
{
	$query = htmlspecialchars($_GET["q"]);

	$autocomplete = new NameAutoComplete();

	header('Content-Type: application/json');
	echo $autocomplete->getHintsJson($query);
}
