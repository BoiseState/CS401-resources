<?php
require_once('Dao.php');

// Start session so we can store user info.
session_start();
session_regenerate_id(true);

// Create database handle.
$dao = new Dao();

// Find out who is "logged in". WARNING!!! This is not the correct way to do this!! See
// the login example in php/sessions/login for an example of correct login. 
if(isset($_POST['loginButton'])) {
	$userName = htmlspecialchars($_POST['username']);
	$realName = htmlspecialchars($_POST['realname']);
	$_SESSION['userName'] = $userName;
	$_SESSION['realName'] = $realName;
	$_SESSION['userId'] = $dao->getUser($userName)['id'];
} else {
	$userName = isset($_SESSION['userName']) ? $_SESSION['userName'] : 'snoopy';
	$realName = isset($_SESSION['realName']) ? $_SESSION['realName'] : '';
}

try {
	# If the username param is set, then filter posts by given username,
	# else just retrieve all posts from the database.
	if(isset($_GET['username'])) {
		$username = htmlspecialchars($_GET['username']);
		$posts = $dao->filterPostsByKey("username", $username);
	} else {
		$posts = $dao->getPostsJoinUserName();
	}
} catch (PDOException $e) {
	echo "<p>Failed to retrieve posts.</p>";
	die;
}
?>
<html>
<head>
	<title>List Posts</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Welcome <?= $userName ?> (aka. <?= $realName ?>)!</h1>
	<form id="message-filter" action="handler.php" method="GET">
		<fieldset>
			<legend>Filter Posts</legend>
				<label for="username">Filter by (username):</label>
				<input type="text" id="username" name="username" />
				<input type="submit" name="filterButton" value="Filter" />
				<?php if(isset($_GET['username'])) { // only display clear if filter is set ?>
					<input type="submit" name="clearButton" value="Clear Filter" />
				<?php } ?>
				<?php if(isset($_GET['error'])) { ?>
					<span class="error"><?= $_GET['error'] ?></span>
				<?php } ?>
		</fieldset>
	</form>

	<!-- Message Result Table -->
	<table>
		<thead>
			<tr><th>User</th><th>Username</th><th>Message</th><th>Posted</th><th>Actions</th></tr>
		</thead>
		<tbody>
			<?php foreach($posts as $post) { ?>
			<tr>
				<td><?= $post['first_name'] . " " . $post['last_name']; ?></td>
				<td><?= $post['username'] ?></td>
				<td><?= $post['message']; ?></td>
				<td><?= $post['posted']; ?></td>
				<td>
				 <?php # only show options for current user.
				 if($userName == $post['username']) { ?>
					<form name="postForm" action="handler.php" method="POST">
						<input type="hidden" name="id" value="<?= $post['id']; ?>">
						<span>
							<input type="submit" name="deleteButton" value="Delete">
							<input type="submit" name="modifyButton" value="Modify">
						</span>
					</form>
				 <?php } ?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<form id="add-post" action="handler.php" method="POST">
		<fieldset>
			<legend>Add Post</legend>
				<!-- Instead of using hidden input, would want to use username
					stored in $_SESSION. People can still modify hidden inputs.-->
				<input type="hidden" name="username" value="<?= $userName ?>">
				<label for="message">Message:</label>
				<textarea name="message" id="message"></textarea>
				<input type="submit" name="postButton" value="Post" />
		</fieldset>
	</form>


</body>
</html>
