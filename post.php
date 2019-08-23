<?php
	require('config/config.php');
	require('config/dbconnection.php');

	 if(isset($_POST['delete'])){
	 	#get form data
	 	$delete_id= mysqli_real_escape_string($conn,$_POST['delete_id']);
	 	
	 	$query = "DELETE FROM users WHERE id = {$delete_id}"; 	

	 if(mysqli_query($conn, $query)){
	 	header('location:'.ROOT_URL.'');
	 } else {echo 'ERROR:'.mysqli_error($conn);
	 }
	 }

	$id = mysqli_real_escape_string ($conn, $_GET['id']);
	$query = 'SELECT * FROM users WHERE id='.$id;
	#fetch data
	$result = mysqli_query($conn, $query);
	#free result
	$user = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	mysqli_close($conn);
?>
<?php include('inc/header.php'); ?>
	<div class="container col-lg-8" >
	<div class="jumbotron">
		<h1  style="font-family: 'Impact';text-align: center;">USERS</h1>
		
			<div class= "container" style="background-color: lightgreen;
			text-align: center;">
			<h3><?php echo $user['username']; ?></h3>
			<h4>User Details: <?php echo $user['firstname'];?></h4> 
			<h4><?php echo $user['lastname'];?></h4> 
			<h4><?php echo $user['age'];?><h4>
			<h4><?php echo $user['email'];?></h4> 
			<h4><?php echo $user['password'];?></h4>
			<small>Created On <?php echo $user['created_at'];?></small><br>
			
			<form class="pull-right" method="POST" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
					<input type="hidden" name="delete_id" value="<?php echo $user['id']; ?>">
					<input type="submit" name="delete" value="delete" class="btn btn-danger">
			
			<a href="<?php echo ROOT_URL; ?>edituser.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Edit</a>
			<a class="btn btn-success" href="index.php">Back</a>
			<hr class="my-4">
			</form>
			</div>
	</div>
	</div>

<?php include('inc/footer.php'); ?>