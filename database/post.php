<?php
	require('config/config.php');
	require('config/dbconnection.php');
	$id = mysqli_real_escape_string ($conn, $_GET['id']);
	$query = 'SELECT * FROM users WHERE id='.$id;
	#fetch data
	$result = mysqli_query($conn, $query);
	#free result
	$user = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>USERS</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="jumbotron">
		<h1  style="font-family: 'Impact';text-align: center;">USERS</h1>
		
			<div class= "container" style="background-color: lightgreen;
			text-align: center;">
			<h3><?php echo $user['username']; ?></h3>
			<h4>User Details <?php echo $user['firstname'];?> <?php echo $user['lastname'];?></h4>
			<small>Created On<?php echo $user['created_at'];?></small><br>
			<a class="btn btn-success" href="index.php">Back</a>
			<hr class="my-4">
			</div>
		
	</div>

</body>
</html>