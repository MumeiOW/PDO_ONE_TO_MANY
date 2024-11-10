<?php require_once 'core/handleForms.php'; ?>
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
	<?php $getNetAdmnByID = getNetAdmnByID($pdo, $_GET['admin_id']); ?>
	<h1>Edit the user!</h1>
	<form action="core/handleForms.php?admin_id=<?php echo $_GET['admin_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getNetAdmnByID['first_name']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getNetAdmnByID['last_name']; ?>">
		</p>
		<p>
			<label for="dateOfBirth">Date of Birth</label> 
			<input type="date" name="dateOfBirth" value="<?php echo $getNetAdmnByID['date_of_birth']; ?>">
		</p>
		<p>
			<label for="position">Position</label> 
			<input type="text" name="position" value="<?php echo $getNetAdmnByID['position']; ?>">
			<input type="submit" name="editWebDevBtn">
		</p>
	</form>
</body>
</html>