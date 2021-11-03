<?php

session_start();
require('db_connecting.php');

$charityID = $_SESSION['ID'];
$appointment_id = $_POST['appointment_id'];

$sql = "DELETE FROM appointment  WHERE id ='$appointment_id' ";
$result = $conn->query($sql);
if ($result) {
    echo 'deleted successfully';
} else {
    echo 'error';
}
?>