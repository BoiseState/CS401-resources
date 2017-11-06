<?php
###################################################################
# NOTE: You would want to validate and sanitize everything before
#       adding to the database. We don't show this here.
#       This is a simplified example and does not demonstrate good
#       data handling.
###################################################################
require_once "../../../../php/pdo/comments/Dao.php";

ini_set('display_errors', 'Off');
ini_set('error_log', 'api.log');

$dao = new Dao();
$data = array(); 
$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
	case "GET":
		error_log("Handling GET request");
		$comments = $dao->getComments();
		$data['status'] = 'OK';
		$data['comments'] = $comments;
		break;
	case "POST":
		error_log("Handling POST request");
		$age = htmlspecialchars($_POST['age']);
		$comment = htmlspecialchars($_POST['comment']);
		$email = htmlspecialchars($_POST['email']);
		
		if(!isset($age) || !is_numeric($age) || $age < 18) {
				$data['status'] = 'REQUEST_DENIED';
				$data['errorMessage'] = 'You must be 18 or older!';
		}
		else
		{
			// if data is validated, add comment to the database and to the data
			// array so we can display it on the page without refreshing.
			try
			{
				$dao = new Dao();
				$saved = $dao->saveComment($comment, $email);
				if($saved) {
					$data['status'] = 'OK';
					$data['message'] = 'Your comment has been posted';
				} else {
					$data['status'] = 'ERROR';
					$data['message'] = 'Your comment has not been posted';
				}
			}
			catch (PDOException $e) {
				$data['status'] = 'ERROR';
				$data['message'] = 'Please try again later. Something is not right.';
			}
		}
		break;
	default:
		$data['status'] = 'UNAVAILABLE';
		$data['message'] = 'This is not implemented.';
	}
	
// specify that we are returning JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
