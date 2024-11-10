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
	<h1>Are you sure you want to delete this user?</h1>
	<?php $getNetAdmnByID = getNetAdmnByID($pdo, $_GET['admin_id']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Username: <?php echo $getNetAdmnByID['username']; ?></h2>
		<h2>FirstName: <?php echo $getNetAdmnByID['first_name']; ?></h2>
		<h2>LastName: <?php echo $getNetAdmnByID['last_name']; ?></h2>
		<h2>Date Of Birth: <?php echo $getNetAdmnByID['date_of_birth']; ?></h2>
		<h2>Position: <?php echo $getNetAdmnByID['position']; ?></h2>
		<h2>Date Added: <?php echo $getNetAdmnByIDD['date_added']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?admin_id=<?php echo $_GET['admin_id']; ?>" method="POST">
				<input type="submit" name="deleteNetAdmnBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>