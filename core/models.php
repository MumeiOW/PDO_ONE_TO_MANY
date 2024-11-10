<?php  

function insertNetAdmn($pdo, $username, $first_name, $last_name, 
	$date_of_birth, $position) {

	$sql = "INSERT INTO network_admins (username, first_name, last_name, 
		date_of_birth, position) VALUES(?,?,?,?,?,)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$username, $first_name, $last_name, 
		$date_of_birth, $position]);

	if ($executeQuery) {
		return true;
	}
}



function updateNetAdmn($pdo, $first_name, $last_name, 
	$date_of_birth, $position, $admin_id) {

	$sql = "UPDATE network_admins
				SET first_name = ?,
					last_name = ?,
					date_of_birth = ?, 
					position = ?
				WHERE admin_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, 
		$date_of_birth, $position, $admin_id]);
	
	if ($executeQuery) {
		return true;
	}

}


function deleteNetAdmn($pdo, $admin_id) {
	$deleteNetAdmnTask = "DELETE FROM tasks WHERE admin_id = ?";
	$deleteStmt = $pdo->prepare($deleteNetAdmnTask);
	$executeDeleteQuery = $deleteStmt->execute([$admin_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM network_admins WHERE admin_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$admin_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}




function getAllNetAdmn($pdo) {
	$sql = "SELECT * FROM network_admins";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getNetAdmnByID($pdo, $admin_id) {
	$sql = "SELECT * FROM network_admins WHERE admin_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$admin_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}





function getTasksByNetAdmn($pdo, $admin_id) {
	
	$sql = "SELECT 
				tasks.task_id AS task_id,
				tasks.task_name AS task_name,
				tasks.technologies_used AS technologies_used,
				CONCAT(network_admins.first_name,' ',network_admins.last_name) AS task_holder
			FROM tasks
			JOIN network_admins ON tasks.admin_id = network_admins.admin_id
			WHERE tasks.admin_id = ? 
			GROUP BY tasks.task_name;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$admin_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function insertTask($pdo, $task_name, $technologies_used, $admin_id) {
	$sql = "INSERT INTO tasks (task_name, technologies_used, admin_id) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$task_name, $technologies_used, $admin_id]);
	if ($executeQuery) {
		return true;
	}

}

function getTaskByID($pdo, $task_id) {
	$sql = "SELECT 
				tasks.task_id AS task_id,
				tasks.task_name AS task_name,
				tasks.technologies_used AS technologies_used,
				CONCAT(network_admins.first_name,' ',network_admins.last_name) AS task_holder
			FROM tasks
			JOIN network_admins ON tasks.admin_id = network_admins.admin_id
			WHERE tasks.task_id  = ? 
			GROUP BY tasks.task_name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$task_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateTask($pdo, $task_name, $technologies_used, $task_id) {
	$sql = "UPDATE tasks
			SET task_name = ?,
				technologies_used = ?
			WHERE task_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$task_name, $technologies_used, $task_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteTask($pdo, $task_id) {
	$sql = "DELETE FROM tasks WHERE task_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$task_id]);
	if ($executeQuery) {
		return true;
	}
}




?>