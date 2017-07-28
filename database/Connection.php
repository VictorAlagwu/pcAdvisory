<?php

$username = 'root';
$dsn = 'mysql:host=localhost; dbname=expert_system';
$password = '';

try{
    //create an instance of the PDO class with the required parameters
    $con = new PDO($dsn, $username, $password);

    //set pdo error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ob_start();
	session_start();

}catch (PDOException $ex){
    //display error message
    echo "Connection failed ".$ex->getMessage();
}