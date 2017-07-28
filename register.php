<?php 
error_reporting(0);
$title = 'Registration Page';
include_once 'database/Connection.php';


include 'views/layout/header.php';
?>

 <div class="container">
 <div class="row">

 </div>
 	<div class="row">
 		<div class="col-xs-4"></div>
 		<div class="col-xs-4">
 <?php
		if (isset($_POST['register'])) {

			$username = $_POST['user_name'];
			$email = $_POST['user_email'];
			$password = $_POST['user_password'];
			$user_role = 'User';
			$u_password = password_hash($password, PASSWORD_DEFAULT);
			
			try {
				$userQuery = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :u_password, :user_role)";

				$statement = $con->prepare($userQuery);

				$statement->execute(array(':username' => $username, ':email' => $email, ':u_password' => $u_password , ':user_role' => $user_role));

				if ($statement->rowCount() == 1) {
					echo "Registration Successful";
					header('Location:login.php');
				}
					
			} catch (PDOException $e) {
				die($e->getMessage());
			}
			
			

		}

?>
 			<form method="POST" action="">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="user_name" class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="user_email" class="form-control">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="user_password" class="form-control">
				</div>

<button type="submit" class="btn btn-primary" name="register">Register</button>
 			</form>

 		</div>
 		<div class="col-xs-4"></div>
 	</div>

 </div>
<?php
include 'views/layout/footer.php';
?>