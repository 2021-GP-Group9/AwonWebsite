<?php

session_start();
require('db_connecting.php');

$charityID = $_SESSION['ID'];
$donation_id = $_POST['donationid'];

$sql = "DELETE FROM donation WHERE donationId ='$donation_id' AND charity_id = '$charityID' ";
$result = $conn->query($sql);
if ($result) {
    echo 'deleted successfully';
} else {
    echo 'error';
}
?>