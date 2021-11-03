<?php

session_start();
require('db_connecting.php');

$charityID = $_SESSION['ID'];
$appointment_id = $_POST['appointmentid'];

$sql = "DELETE FROM appointment  WHERE id ='$appointment_id' AND charity_id = '$charityID' ";
$result = $conn->query($sql);
if ($result) {
    echo 'deleted successfully';
} else {
    echo 'error';
}
?>