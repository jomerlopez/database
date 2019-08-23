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
	

	#check submit
	 if(isset($_POST['submit'])){
	 	#get form data
	 	$id = $user['id'];
	 	$username= mysqli_real_escape_string($conn,$_POST['username']);
	 	$firstname= mysqli_real_escape_string($conn,$_POST['firstname']);
	 	$lastname= mysqli_real_escape_string($conn,$_POST['lastname']);
	 	$age= mysqli_real_escape_string($conn,$_POST['age']);
	 	$email= mysqli_real_escape_string($conn,$_POST['email']);
	 	$password= mysqli_real_escape_string($conn,$_POST['password']);
	 	
	 	$query = "UPDATE users SET username='$username', firstname='$firstname', lastname='$lastname', age={$age}, email='$email', password='$password' WHERE id= {$id}"; 	

	 if(mysqli_query($conn, $query)){
	 	header('location:'.ROOT_URL.'');
	 } else {echo 'ERROR:'.mysqli_error($conn);
	 }
	 }
	
	
	
?>
		<?php include('inc/header.php'); ?>
	<div class="container col-lg-8" >
		<div class="jumbotron" style="text-align: center">
		<h1  style="font-family: 'Roboto';text-align: center;">Edit User</h1>
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div>
				<label>Username</label>
				<input type="name" name="username" class="form-control" value="<?php echo $user['username']; ?>">
			</div>
			<div>
				<label>First Name</label>
				<input type="name" name="firstname" class="form-control" value="<?php echo $user['firstname']; ?>">
			</div>
			<div>
				<label>Last Name</label>
				<input type="name" name="lastname" class="form-control" value="<?php echo $user['lastname']; ?>">
			</div>
			<div>
				<label>Age</label>
				<input type="name" name="age" class="form-control" value="<?php echo $user['age']; ?>">
			</div>
			<div>
				<label>Email</label>
				<input type="name" name="email" class="form-control" value="<?php echo $user['email']; ?>">
			</div>
			<div>
				<label>Password</label>
				<input type="name" name="password" class="form-control" value="<?php echo $user['password']; ?>">
			</div>
			<<input type="hidden" name="update_id" value="<?php echo $user['id']; ?>">
			<br>
			<input type="submit" name="submit" class="btn btn-primary">
		</form>
	</div>
	</div>
<?php include('inc/footer.php'); ?>