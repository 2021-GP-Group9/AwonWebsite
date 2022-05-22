<?php

require('db_connecting.php');

$charityID = $_POST['ID'];
$sql = "UPDATE 'charity' SET status='Accepted' WHERE charityId ='$charityID'";

$sqli = "SELECT * FROM `charity` WHERE charityId = '$charityID'";
$result = $conn->query($sqli);
$row = $result->fetch_assoc();

$email = $row['email'];
$data = "";
$result = mysqli_query($conn, $sql);
if ($result) {
    $to = $email;
    $subject = "تأكيد قبول الجمعية";
    $message = "<h1 style='text-align: center;'> تم قبول الجمعية الخيرية بإسم " . $row['name'] . "</h1>" . "<br>" . "<p style='text-align: center;'> يمكنك الدخول إلى المنصة عن طريق الرابط التالي باستخدام اسم المستخدم وكلمة المرور المدخلة سابقًا </p>" . "<br>" . "<p style='text-align: center;'> https://awoon.000webhostapp.com/index.php" . "</p>" . "<p style='text-align: center;'> فريق منصة عون </p>";
    $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
    mail($to, $subject, $message, $headers);
    $query1 = "INSERT INTO `users`(userId, role) VALUES ($charityID,'charity') ";
    $run1 = mysqli_query($conn, $query1);
    exit();
} else {
    header("Content-Type: text/html");
    echo "added unsuccessfully ";
}
?>