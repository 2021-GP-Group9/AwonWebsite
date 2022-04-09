<?php
require('db_connecting.php');
// donor id
$id = $_GET['id'];
$sqli = "SELECT * FROM `donor` WHERE donorId = '$id'";
$result = $conn->query($sqli);
$row = $result->fetch_assoc();
$email = $row['donorEmail'];
$mes = $row['reason'];
if ($row['suspend'] == "unsuspend") {
$sql = "UPDATE donor SET suspend='suspend' WHERE donorId ='$id'";
} else {
$sql = "UPDATE donor SET suspend='unsuspend' WHERE donorId ='$id'";
}
$data = "";
$result = mysqli_query($conn, $sql);
if ($result) {
$to = $email;
$subject = "تم تغيير إمكانية الوصول إلى حسابك";
$message = "<p>" . $mes . "<p><br><p style='text-align: center;'> https://awoon.000webhostapp.com/index.php" . "</p>" . "<p style='text-align: center;'> فريق منصة عون </p>";
$headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to, $subject, $message, $headers);
exit();
} else {
header("Content-Type: text/html");
echo "added unsuccessfully ";

}
?> 