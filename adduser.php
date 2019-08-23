<?php
	require('config/config.php');
	require('config/dbconnection.php');

	#check submit
	 if(isset($_POST['submit'])){
	 	#get form data
	 	$username= mysqli_real_escape_string($conn,$_POST['username']);
	 	$firstname= mysqli_real_escape_string($conn,$_POST['firstname']);
	 	$lastname= mysqli_real_escape_string($conn,$_POST['lastname']);
	 	$age= mysqli_real_escape_string($conn,$_POST['age']);
	 	$email= mysqli_real_escape_string($conn,$_POST['email']);
	 	$password= mysqli_real_escape_string($conn,$_POST['password']);
	 	 
	 	 $query = "INSERT INTO users(username, firstname, lastname, age, email, password) VALUES ('$username','$firstname', '$lastname', '$age', '$email', '$password')"; 	

	 if(mysqli_query($conn, $query)){
	 	header('location:'.ROOT_URL.'');
	 } else {echo 'ERROR:'.mysqli_error($conn);
	}
	 }
	
	
?>
		<?php include('inc/header.php'); ?>
	<div class="container col-lg-8" >
		<div class="jumbotron" style="text-align: center">
		<h1  style="font-family: 'Roboto';text-align: center;">Add User</h1>
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div>
				<label>Username</label>
				<input type="name" name="username" class="form-control">
			</div>
			<div>
				<label>First Name</label>
				<input type="name" name="firstname" class="form-control">
			</div>
			<div>
				<label>Last Name</label>
				<input type="name" name="lastname" class="form-control">
			</div>
			<div>
				<label>Age</label>
				<input type="name" name="age" class="form-control">
			</div>
			<div>
				<label>Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div>
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<br>
			<input type="submit" name="submit" class="btn btn-primary">
		</form>
	</div>
	</div>
<?php include('inc/footer.php'); ?>