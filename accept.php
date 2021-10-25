<?php
$connection = mysqli_connect("localhost", "root", "root", "awondb");

        $charityID = $_POST['ID'];
        $sql= "UPDATE charity SET status='Accepted' WHERE ID ='$charityID'";
	$data="";
        $result = mysqli_query($connection, $sql);
        

if ($result) {
    header('Location:joiningRequests.php');
    echo 'added successfully';
    exit();
} else {
    header("Content-Type: text/html");
       echo "added unsuccessfully ";
 
}