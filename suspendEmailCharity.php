<?php

require('db_connecting.php');
// donor id
$id = $_POST['ID'];
$sqli = "SELECT * FROM `charity` WHERE charityId = '$id'";
$result = $conn->query($sqli);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row['email'];
    if ($row['suspend'] == "unsuspend") {
        $sql = "UPDATE charity SET suspend='suspend' WHERE charityId ='$id'";
        $data = "";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $to = $email;
            $subject = "تم تغيير إمكانية الوصول إلى حسابك";
            $message = "<p style='text-align: center;'>تم إيقاف حسابك في تطبيق عون</p><br>" . "<p style='text-align: center;'>يمكنك الاستفسار من خلال الرسائل الخاصة" . "</p><a href='mailto:Awongp35@gmail.com' style='text-align: center;'>اضغط هنا للتواصل عبر البريد الإلكتروني</a>" . "<p style='text-align: center;'> فريق منصة عون </p>";
            $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($to, $subject, $message, $headers);
            header('Location:joiningRequests.php');
            exit();
        } else {
            header("Content-Type: text/html");
            echo "Faild try agin";
        }
    } else {
        $sql = "UPDATE charity SET suspend='unsuspend' WHERE charityId ='$id'";
        $data = "";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $to = $email;
            $subject = "تم تغيير إمكانية الوصول إلى حسابك";
            $message = "<p style='text-align: center;'>تم تفعيل حسابك في تطبيق عون</p><br>" . "<p style='text-align: center;'>يمكنك الاستفسار من خلال الرسائل الخاصة" . "</p><a href='mailto:Awongp35@gmail.com' style='text-align: center;'>اضغط هنا للتواصل عبر البريد الإلكتروني</a>" . "<p style='text-align: center;'> فريق منصة عون </p>";
            $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($to, $subject, $message, $headers);
            header('Location:joiningRequests.php');
            exit();
        } else {
            header("Content-Type: text/html");
            echo "Faild try agin";
        }
    }
} 
?> 