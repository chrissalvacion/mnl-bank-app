
<?php

//SETUP THE CONNECTION TO MYSQL DATABASE

$servername = "localhost";
$username = "root";
$password = "";                 // password can be removed if not set in phpmyadmin
$dbname = "onlinebankdb";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

?>