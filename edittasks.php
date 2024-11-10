<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbconfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewtasks.php?admin_id=<?php echo $_GET['admin_id']; ?>">
	View The Tasks</a>
	<h1>Edit the task!</h1>
	<?php $getTaskByID = getTaskByID($pdo, $_GET['task_id']); ?>
	<form action="core/handleForms.php?task_id=<?php echo $_GET['task_id']; ?>
	&admin_id=<?php echo $_GET['admin_id']; ?>" method="POST">
		<p>
			<label for="taskName">Task Name</label> 
			<input type="text" name="taskName" 
			value="<?php echo $getTaskByID['task_name']; ?>">
		</p>
		<p>
			<label for="technologiesUsed">Technologies Used</label> 
			<input type="text" name="technologiesUsed" 
			value="<?php echo $getTaskByID['technologies_used']; ?>">
			<input type="submit" name="editTaskBtn">
		</p>
	</form>
</body>
</html>