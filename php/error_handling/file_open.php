
<html>
<head>
<title>PHP Example: Error Handling: File Open</title>
<style> .error { color:red; } </style>
</head>
<body>

<?php
$filename = "hello.txt";
$file = "";
$result = "";

/** Attempt to access the file and handle error */
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$filename =  $_POST['filename'];

	if(!file_exists($filename))
	{
		$result = "<span class=\"error\">File \"$filename\" not found!</span>";
		die($result);
	}
	else
	{
		$file = fopen($filename, "r");
		$result = "File \"$filename\" opened successfully!";
	}
}
?>

<!-- Show the form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
	Open file: <input type="text" name="filename" value="<?php echo $filename;?>"><br>
	<input type="submit">
</form>

<?php
/* Print the file access result */
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	echo "<br><br>Result: $result";
}
?>

</body>
</html
