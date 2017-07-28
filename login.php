<?php
$title = 'Login Page';
// require 'database/Connection.php';
include 'views/layout/header.php';
?>

<?php
if (isset($_POST['submit'])) {
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	

	$login_query = "SELECT * FROM users WHERE email=:user_email";
	$statement =$con->prepare($login_query);
	$statement->execute(array(':user_email' => $user_email));

	while ($row = $statement ->fetch()) {
		$us_id = $row['user_id'];
		$us_user = $row['username'];
		$us_password = $row['password'];
		$us_email = $row['email'];
		$us_role = $row['role'];
		if (password_verify($user_password, $us_password)) {
			$_SESSION['id'] = $us_id;
			$_SESSION['username'] = $us_user;
			$_SESSION['email'] = $us_email;
			$_SESSION['role'] = $us_role;
			header('Location: index.php');

		} else {
			echo "Invalid Entries";
			header('Location: login.php');
		}
	}

}
?> 

<div class="container">
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form class="form-group" role="form" method="POST" action="">
			    <label class="inputdefault" for="name">Email:</label>
                    <input name="user_email" type="text" class="form-control" placeholder="Enter Email"><br>
              	<label class="inputdefault" for="email">Password:</label>
                    <input name="user_password" type="password" class="form-control" placeholder="Enter Passsword"><br>
                    
                    <div id="search_buttons">
                    	<button name="submit" class="btn btn-primary" type="submit">Submit</button>
                    </div>
                       
                </div>
        </form>
        </div>

	</div>
</div>

                    

  <?php
include 'views/layout/footer.php';
?>