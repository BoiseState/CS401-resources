<!DOCTYPE html>
<html>
<head>
	<title>jQuery Example: TODO list</title>
	<link href="css/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<ul id="task-list" class="ui-widget-content">
	</ul>
	<form id="form" action="" method="POST">
		<p>
			<label for="description"></label>
			<input id="description" type="text" name="description" placeholder="Add a task...">
		</p>
		<p>
			<label for="details"></label>
			<textarea id="details" name="details" placeholder="Add some details.."></textarea>
		</p>
		<p>
			<label for="priority"></label>
			<input type="text" id="priority" name="priority" value="high">
		</p>
		<input type="submit" value="Add">
	</form>

	<!-- To use JQuery, one option is to include it from Google's content delivery network (CND). -->
	<!-- There are other CND possibilities. Another option is to download and install it manually. -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<!-- This is our script file. Must include after since it depends on jquery. -->
	<script src="js/script.js"></script>
</body>
</html>
