<?php 

require_once 'dbconfig.php'; 
require_once 'models.php';

if (isset($_POST['insertNetAdmnBtn'])) {

	$query = insertNetAdmn($pdo, $_POST['username'], $_POST['firstName'], 
		$_POST['lastName'], $_POST['dateOfBirth'], $_POST['position']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editNetAdmnBtn'])) {
	$query = updateNetAdmn($pdo, $_POST['username'], $_POST['firstName'], 
    $_POST['lastName'], $_POST['dateOfBirth'], $_POST['position'], $_GET['admin_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}




if (isset($_POST['deleteNetAdmnBtn'])) {
	$query = deleteNetAdmn($pdo, $_GET['admin_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}




if (isset($_POST['insertNewTaskBtn'])) {
	$query = insertTask($pdo, $_POST['taskName'], $_POST['technologiesUsed'], $_GET['admin_id']);

	if ($query) {
		header("Location: ../viewtasks.php?admin_id=" .$_GET['admin_id']);
	}
	else {
		echo "Insertion failed";
	}
}




if (isset($_POST['editTaskBtn'])) {
	$query = updateTask($pdo, $_POST['taskName'], $_POST['technologiesUsed'], $_GET['task_id']);

	if ($query) {
		header("Location: ../viewtasks.php?admin_id=" .$_GET['admin_id']);
	}
	else {
		echo "Update failed";
	}

}




if (isset($_POST['deleteTaskBtn'])) {
	$query = deleteTask($pdo, $_GET['task_id']);

	if ($query) {
		header("Location: ../viewtasks.php?admin_id=" .$_GET['admin_id']);
	}
	else {
		echo "Deletion failed";
	}
}




?>