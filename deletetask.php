<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getTaskByID = getTaskByID($pdo, $_GET['task_id']); ?>
	<h1>Are you sure you want to delete this task?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Project Name: <?php echo $$getTaskByID['task_name'] ?></h2>
		<h2>Technologies Used: <?php echo $$getTaskByID['technologies_used'] ?></h2>
		<h2>Task Holder: <?php echo $$getTaskByID['task_holder'] ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">

			<form action="core/handleForms.php?task_id=<?php echo $_GET['task_id']; ?>&admin_id=<?php echo $_GET['admin_id']; ?>" method="POST">
				<input type="submit" name="deleteTaskBtn" value="Delete">
			</form>			
			
		</div>	

	</div>
</body>
</html>