<?php
	require('config/config.php');
	require('config/dbconnection.php');
	$query = 'SELECT * FROM users ORDER BY created_at DESC';
	#fetch data
	$result = mysqli_query($conn, $query);
	#free result
	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	mysqli_close($conn);
?>
		<?php include('inc/header.php'); ?>
	<div class="container col-lg-8" >
		<div class="jumbotron" style="text-align: center">
		<h1  style="font-family: 'Impact';text-align: center;">USERS</h1>
		<?php foreach($users as $user):?>
			<div class= "container" style="background-color: lightblue;
			text-align: center;">
			<h3><?php echo $user['username']; ?></h3>
			<small>Created On <?php echo $user['created_at'];?></small><br>
			<a class="btn btn-primary" href="post.php?id=<?php echo $user['id'];?>">Read More</a>
			<hr class="my-4">
			</div>
			
		<?php endforeach; ?>
	</div>
	</div>
<?php include('inc/footer.php'); ?>