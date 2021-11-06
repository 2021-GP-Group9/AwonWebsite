<?php

require('db_connecting.php');

$charityID = $_POST['ID'];
$sql = "DELETE FROM charity WHERE charityId ='$charityID'";
$data = "";
$result = mysqli_query($conn, $sql);

$sqli = "SELECT * FROM `charity` WHERE charityId = '$charityID'";
$result = $conn->query($sqli);
$row = $result->fetch_assoc();
$email = $row['email'];

if ($result) {
    header("Content-Type: text/html");
    $to = $email;
    $subject = "رفض الجمعية الخيرية";
    $message = 'نأسف فقد تم رفض الجمعية الخيرية بإمكانك المحاولة مرة آخرى';
    mail($to, $subject, $message);
    exit();
} else {
    header("Content-Type: text/html");
    echo "added unsuccessfully ";
}
?>