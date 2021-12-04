
<?php
require('db_connecting.php');
        $charityID = $_POST['charityId'];
        $sqli = "SELECT * FROM `charity` WHERE charityId = '$charityID'";
        $result = $conn->query($sqli);
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $sql= "DELETE FROM `charity` WHERE charityId ='$charityID'";

 if ($conn->query($sql) === TRUE) {
    $to = $email;
    $subject = "تأكيد رفض الجمعية";
    
     $message = "<h1 style='text-align: center;'>نأسف فقد تم رفض الجمعية الخيرية بإسم ".$row['name']."</h1>"."<br>"."<p style='text-align: center;'> يمكنك التقدم بطلب إنضمام مرة آخرى مع الحرص على إدخال معلومات صحيحة لتفادي الرفض </p>"."<br>"."<p style='text-align: center;'> https://awoon.000webhostapp.com/index.php"."</p>"."<p style='text-align: center;'> فريق منصة عون </p>";
    
     $headers = "Content-type:text/html;charset=UTF-8"."\r\n";

    mail($to, $subject, $message, $headers);
    exit();

 } else {
    header("Content-Type: text/html");
       echo "added unsuccessfully ";
 
}