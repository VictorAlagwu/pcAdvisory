<?php
    require $_SERVER['DOCUMENT_ROOT'].'/pcadvisory/database/connection.php';
   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title><?php echo $title; ?></title>
	<!-- <link rel="icon" type="image/png" href="img/vimeo.png"> -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
	<link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="assets/css/twitter.css">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
 <header id="header">
        <nav id="main-menu" class="navbar navbar-inverse navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img width="113" height="27" src='assets/images/pcadvisory.png'/></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                      <?php
if (isset($_SESSION['username'])){?>
                    <ul class="nav navbar-nav">
                        <li class="scroll"><a href="index.php">Home</a></li>
                        <li class="scroll"><a href="dashboard">Admin</a></li>
                        <li class="scroll"><a href="logout.php">Logout</a></li>
                        <li class="scroll"><a href="categories.php">Category</a></li> 
                        <li class="scroll"><a href="contact.php">Contact</a></li>                        
                    </ul>
  <?php }else{ ?>
 					<ul class="nav navbar-nav">
                        <li class="scroll"><a href="index.php">Home</a></li>        
                        <li class="scroll"><a href="register.php">Register</a></li>
                        <li class="scroll"><a href="login.php">Login</a></li>
                        <li class="scroll"><a href="categories.php">Category</a></li> 
                        <li class="scroll"><a href="contact.php">Contact</a></li>                        
                    </ul>
  <?php } ?>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->

