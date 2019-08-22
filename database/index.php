<?php
	require('config/config.php');
	require('config/dbconnection.php');
	$query = 'SELECT * FROM users';
	#fetch data
	$result = mysqli_query($conn, $query);
	#free result
	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
		<?php foreach($users as $user):?>
			<div class= "container" style="background-color: lightgreen;
			text-align: center;">
			<h3><?php echo $user['username']; ?></h3>
			<small>Created On<?php echo $user['created_at'];?></small><br>
			<a class="btn btn-primary" href="post.php?id=<?php echo $user['id'];?>">Read More</a>
			<hr class="my-4">
			</div>
		<?php endforeach; ?>
	</div>

</body>
</html>