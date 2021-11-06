<?php

session_start();
require('db_connecting.php');

$charityID = $_SESSION['ID'];
$appointment_id = $_POST['appointmentid'];

$sql = "DELETE FROM appointment  WHERE appointmentId ='$appointment_id' AND charityId = '$charityID' ";
$result = $conn->query($sql);
if ($result) {
    echo 'deleted successfully';
} else {
    echo 'error';
}
?>