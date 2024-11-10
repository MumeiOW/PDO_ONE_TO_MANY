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
	<a href="index.php">Return to home</a>
	<?php $getAllNetAdmn = getAllNetAdmn($_GET['admin_id']); ?>
	<h1>Username: <?php echo $getAllNetAdmn['username']; ?></h1>
	<h1>Add New Project</h1>
	<form action="core/handleForms.php?admin_id=<?php echo $_GET['admin_id']; ?>" method="POST">
		<p>
			<label for="taskName">Task Name</label> 
			<input type="text" name="taskName">
		</p>
		<p>
			<label for="technologiesUsed">Technologies Used</label> 
			<input type="text" name="technologiesUsed">
			<input type="submit" name="insertNewTaskBtn">
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Task ID</th>
	    <th>Task Name</th>
	    <th>Technologies Used</th>
	    <th>Task Holder</th>
	    <th>Action</th>
	  </tr>
	  <?php $getTasksByNetAdmn = getTasksByNetAdmn($pdo, $_GET['admin_id']); ?>
	  <?php foreach ($getTasksByNetAdmn as $row) { ?>
	  <tr>
	  	<td><?php echo $row['task_id']; ?></td>	  	
	  	<td><?php echo $row['task_name']; ?></td>	  	
	  	<td><?php echo $row['technologies_used']; ?></td>	  	
	  	<td><?php echo $row['task_holder']; ?></td>
	  	<td>
	  		<a href="edittasks.php?task_id=<?php echo $row['task_id']; ?>&admin_id=<?php echo $_GET['admin_id']; ?>">Edit</a>

	  		<a href="deletetask.php?task_id=<?php echo $row['task_id']; ?>&admin_id=<?php echo $_GET['admin_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>