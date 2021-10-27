<?php
require('db_connecting.php');

$charityID = $_POST['ID'];
$sql= "UPDATE charity SET status='Accepted' WHERE ID ='$charityID'";

$sqli = "SELECT * FROM `charity` WHERE ID = '$charityID'";
$result = $conn->query($sqli);
$row = $result->fetch_assoc();
$email=$row['email'];

$data="";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo 'added successfully';
	$to = $email;
	$subject = "Email Verification";
	$message = 'Your charity has been accepted ';
	mail($to, $subject, $message);
    exit();
} else {
    header("Content-Type: text/html");
       echo "added unsuccessfully ";
 
}



?>