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
	<h1>Welcome To Network Admins Tasks Management System. Add new Admin!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">Username</label> 
			<input type="text" name="username">
		</p>
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName">
		</p>
		<p>
			<label for="dateOfBirth">Date of Birth</label> 
			<input type="date" name="dateOfBirth">
		</p>
		<p>
			<label for="position">Position</label> 
			<input type="text" name="position">
			<input type="submit" name="insertNetAdmnBtn">
		</p>
	</form>
	<?php $getAllNetAdmn = getAllNetAdmn($pdo); ?>
	<?php foreach ($getAllNetAdmn as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>Username: <?php echo $row['username']; ?></h3>
		<h3>FirstName: <?php echo $row['first_name']; ?></h3>
		<h3>LastName: <?php echo $row['last_name']; ?></h3>
		<h3>Date Of Birth: <?php echo $row['date_of_birth']; ?></h3>
		<h3>Position: <?php echo $row['position']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>


		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewtasks.php?admin_id=<?php echo $row['admin_id']; ?>">View Projects</a>
			<a href="editnetadmn.php?admin_id=<?php echo $row['admin_id']; ?>">Edit</a>
			<a href="deletenetadmn.php?admin_id=<?php echo $row['admin_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>