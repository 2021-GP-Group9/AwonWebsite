<?php
$connection = mysqli_connect("localhost", "root", "root", "awondb");

        $charityID = $_POST['ID'];
        $sql= "DELETE FROM charity WHERE ID ='$charityID'";
	$data="";
        $result = mysqli_query($connection, $sql);

if ($result) {
    header("Content-Type: text/html");
    echo 'added successfully';
    exit();
} else {
    header("Content-Type: text/html");
       echo "added unsuccessfully ";
 
}