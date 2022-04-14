<?php

require('db_connecting.php');
// donor id
$id = $_POST['ID'];
$sqli = "SELECT * FROM `donor` WHERE donorId = '$id'";
$result = $conn->query($sqli);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row['donorEmail'];
    if ($row['suspend'] == "unsuspend") {
        $sql = "UPDATE donor SET suspend='suspend' WHERE donorId ='$id'";
        $data = "";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $to = $email;
            $subject = "تم تغيير إمكانية الوصول إلى حسابك";
            $message = "<p style='text-align: center;'>تم إيقاف حسابك في تطبيق عون</p><br>" . "<p style='text-align: center;'>لمزيد من المعلومات تواصل عبر البريد الإلكتروني أدناه" . "</p><a href='mailto:Awongp35@gmail.com' style='text-align: center;'>اضغط هنا</a>" . "<p style='text-align: center;'> فريق منصة عون </p>";
            $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($to, $subject, $message, $headers);
            header('Location:joiningRequests.php');
            exit();
        } else {
            header("Content-Type: text/html");
            echo "Faild try agin";
        }
    } else {
        $sql = "UPDATE donor SET suspend='unsuspend' WHERE donorId ='$id'";
        $data = "";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $to = $email;
            $subject = "تم تغيير إمكانية الوصول إلى حسابك";
            $message = "<p style='text-align: center;'>تم تفعيل حسابك في تطبيق عون</p><br>" . "<p style='text-align: center;'>لمزيد من المعلومات تواصل عبر البريد الإلكتروني أدناه" . "</p><a href='mailto:Awongp35@gmail.com' style='text-align: center;'>اضغط هنا</a>" . "<p style='text-align: center;'> فريق منصة عون </p>";
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