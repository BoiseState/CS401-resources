<?php
$names = file("first-names.txt");

// get the q parameter from URL
if(isset($_GET["q"])) {
	$q = $_GET["q"];

	$hints = array("hints" => array());

	# lookup all hints from array if $q is different from ""
	if ($q !== "") {
		$q = strtolower($q);
		$len=strlen($q);
		foreach($names as $name) {
		  if (stristr($q, substr($name, 0, $len))) {
			  $hints["hints"][] = $name;
			}
		}
	}
	// Output "no suggestion" if no hint was found or output correct values
	//$return = array( "hint" => $hint === "" ? "no suggestion" : $hint);
	echo json_encode($hints);
}
?>
