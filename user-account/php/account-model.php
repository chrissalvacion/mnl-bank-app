<!--
    
-->
<?php

include('config.php');
$userid = $_GET['user'];

if(isset($_GET['user'])){

    $sql_query = "SELECT * FROM users WHERE userid='$userid' LIMIT 1";
    $result = $conn->query($sql_query);
    $row = $result->fetch_assoc();

    $accountno = $row['accountno'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $birthday = $row['birthday'];
    $address = $row['address'];
    $contact = $row['contactno'];
    $email = $row['email'];

    $conn->close();
    
}
?>