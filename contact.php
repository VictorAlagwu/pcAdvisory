<?php
$title = 'Contact Page';
include 'views/layout/header.php';
?>
<?php
	

	if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["comment"]))
	{
		 $name=$_POST["name"];
		 $email=$_POST["email"];
		 $comment=$_POST["comment"];
		 		if (!empty($name) && !empty($email) && !empty($comment)) {
		 				# code...
		 	
		 	$to ="victoralagwu@gmail.com";
		 	$subject="Contact Form Submitted";
		 	$body =$comment;
		 	$headers="From: ".$email;
		 	if (@mail($to,$subject, $body,$headers)){
		 		echo "<h3 class='alert alert-info text-center'>Thanks for contacting us. We will be in touch soon.</h3>";
		 	}
		 	else{
		 		echo "<h3 class='alert alert-danger text-center'>Ohh,Sorry,an error occured with the network.Please try again later.</h3>";
		 	}
		 }else{
		 	echo "<h3 class='alert alert-warning text-center'>Please enter all the requested input</h3>";
		 }
	}
	
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form class="form-group" role="form" action="contact.php" method="POST">
 				<label class="inputdefault" for="name">Name:</label>
					<input  type="text" name="name" placeholder="Enter your Name" class="form-control" id="name" ></input><br>
 				<label class="inputdefault" for="email">Email:</label>
					<input type ="email" class ="form-control" name="email" placeholder="Enter your Email"></input><br>
				<label for="comment">Comment:</label>
					<textarea class="form-control" rows="5" id="comment" name="comment"></textarea> <br>
				<input type="submit" class="btn btn-default btn-sm " value="Submit"></input>
			</form>
		</div>
	</div>
</div>

<?php
include 'views/layout/footer.php'
?>