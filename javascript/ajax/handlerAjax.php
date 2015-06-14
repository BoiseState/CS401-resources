<?php
  require_once "../../php/pdo/comments/Dao.php";

# NOTE: You would want to validate everything before
# adding to the database. We don't show this here.
# This is a simplified example.
  if(isset($_POST['age']) && $_POST['age'] < 18) {
    $data = array(
      'status' => 'error',
      'errorMessage' => 'You are under 18!',
      'age' => $_POST['age'],
      'comment' => $_POST['comment'],
      'email' => $_POST['email']
    );
  } else {
    try {
      $dao = new Dao();
      $dao->saveComment($_POST['comment'], $_POST['email']);
      $data = array(
        'status' => 'success',
        'message' => 'Your comment has been posted');
    } catch (PDOException $e) {
      $data = array(
        'status' => 'error',
        'message' => 'Please try again later. Something is not right.');
    }
  }
  header('Content-Type: application/json');
  echo json_encode($data);
?>
