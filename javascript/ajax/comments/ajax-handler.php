<?php
	require_once "../../../php/pdo/comments/Dao.php";

	$data = array(); # What we will pass back.

	# Validate (and sanitize) arguments before trying to save.
	# NOTE: You would want to validate and sanitize everything before
	# adding to the database. We don't show this here.
	# This is a simplified example and does not demonstrate good
	# data handling..
	if(!isset($_POST['age']) || isset($_POST['age']) && $_POST['age'] < 18) {
			$data['status'] = 'error';
			$data['errorMessage'] = 'You are under 18!';
	}
	else
	{
		// if data is validated, add comment to the database and to the data
		// array so we can display it on the page without refreshing.
		try
		{
			$dao = new Dao();
			$dao->saveComment($_POST['comment'], $_POST['email']);
			$data['status'] = 'success';
			$data['message'] = 'Your comment has been posted';
		}
		catch (PDOException $e) {
			$data['status'] = 'error';
			$data['message'] = 'Please try again later. Something is not right.';
		}
	}
	// specify that we are returning JSON
	header('Content-Type: application/json');
	echo json_encode($data);

?>
