<?php
require_once('includes/Dao.php');

/* WARNING! This is really just a hack to show you the general concept.
 * To do this right, we would want to create a RESTful api, use objects
 * to represent our database tables, etc. */

function cleanData($data) {
	$cleanData = Array();
	if(is_array($data)) {
		foreach($data as $k => $v) {
			$cleanData[$k] = cleanData($v);
		}
	} else {
		$cleanData = trim(htmlspecialchars($data));
	}
	return $cleanData;
}

switch($_SERVER['REQUEST_METHOD']) {
	case 'POST':
		$input = cleanData($_POST);
		if(isset($input['task']) && is_array($input['task'])) {
			updateTaskOrder($input['task']);
		} else {
			addTask($input);
		}
		break;
	case 'GET':
		getOrderedTaskList();
		break;
}

function getOrderedTaskList() {
		try {
			$dao = new Dao();
			$tasks = $dao->getOrderedTasks();
			header('Content-Type: application/json');
			die(json_encode($tasks));
		} catch (Exception $e) {
			error_log($e->getMessage());
			sendError('Failed to retreive tasks from server.' . $e->getMessage());
		}

}

function updateTaskOrder($taskList) {
	try {
			$dao = new Dao();
			$updated = $dao->updateTaskOrder($taskList);
			header('Content-Type: application/json');
			die(json_encode(array('update_count' => $updated)));
		} catch (Exception $e) {
			error_log($e->getMessage());
			sendError('Failed to sync tasks with server.' . $e->getMessage());
		}
}
function addTask($task) {
		try {
			$dao = new Dao();
			$id = $dao->addTask($task);
			header('Content-Type: application/json');
			die(json_encode(array('id' => $id)));
		} catch (Exception $e) {
			error_log($e->getMessage());
			sendError('Failed to add task to server.' . $e->getMessage());
		}
}

function sendError($message)
{
	header('HTTP/1.1 500 Internal Server Error');
	header('Content-Type: application/json; charset=UTF-8');
	die(json_encode(array('message' => $message)));
}
?>
