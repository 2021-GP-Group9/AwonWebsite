<?php
require('db_connecting.php');

$charityID = $_POST['ID'];
$sql= "DELETE FROM charity WHERE ID ='$charityID'";
$data="";
$result = mysqli_query($conn, $sql);

$sqli = "SELECT * FROM `charity` WHERE ID = '$charityID'";
$result = $conn->query($sqli);
$row = $result->fetch_assoc();
$email=$row['email'];

if ($result) {
    header("Content-Type: text/html");
    echo 'added successfully';
	$to = $email;
	$subject = "Email Verification";
	$message = 'sorry :( Your charity has been rejected ';
	mail($to, $subject, $message);
    exit();
} else {
    header("Content-Type: text/html");
    echo "added unsuccessfully ";
 
}


?>