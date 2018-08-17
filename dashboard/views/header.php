<?php 
    // include '../database/session.php';
    define('DATABASE', 'database/' .'../database/');

    require DATABASE.'connection.php';
   
?>

<?php
if ($_SESSION['role'] == 'Admin') {
  
 } else {
  header('Location:../error.php');
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- TinyMCE Script -->
    <script src="js/tinymce/tinymce.min.js"></script>
    <script src="js/tinymce/script.js"></script>
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/twitter.css">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>