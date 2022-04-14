<?php

session_start();
require('db_connecting.php');

$charityID = $_SESSION['ID'];
$appointment_id = $_POST['appointmentid'];
$sqliedit = "SELECT
             donor.donorId,
             donor.donorEmail,
             appointment.donorId,
                                            appointment.appointmentId,
                                            appointment.charityId,
                                            appointment.appointmentDate,
                                            appointment.appointmentTime,
                                            appointment.charityId,
                                            charity.charityId
                                        FROM
                                            donor
                                        JOIN appointment JOIN charity ON
                                            (
                                                donor.donorId = appointment.donorId AND charity.charityId = appointment.charityId
                                            )
                                        WHERE
                                            appointment.charityId = '$charityID' AND appointment.appointmentId = '$appointment_id'
                                        ";
                                                $resultRemove = $conn->query($sqliedit);
                                                $rowRemove = $resultRemove->fetch_assoc();
                                                $removedDate = $rowRemove['appointmentDate'];
                                                $email = $rowRemove['donorEmail'];
                                                $data = "";
                                                $resultRemove = mysqli_query($conn, $sqliedit);
                                                if ($resultRemove) {
                                                    $to = $email;
                                                    $subject = "إلغاء موعد الاستلام";
                                                    $message = "<h1 style='text-align: center;'> بناء على رغبة الجمعية الخيرية تم إلغاء موعدك بتاريخ".$removedDate."</h1>" . "<br>" . "<p style='text-align: center;'>يمكنك حجز موعد آخر يناسبك من خلال الدخول على حسابك في التطبيق والحجز</p>" . "<br>" . "<p style='text-align: center;'> فريق منصة عون </p>";
                                                    $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
                                                    mail($to, $subject, $message, $headers);
                                                    $sql = "DELETE FROM appointment  WHERE appointmentId ='$appointment_id' AND charityId = '$charityID' ";
$result = $conn->query($sql);
if ($result) {
    echo 'deleted successfully';
} else {
    echo 'error';
}
                                                    
                                                    
                                                    
                                                    exit();
                                                } else {
                                                    header("Content-Type: text/html");
                                                    echo "added unsuccessfully ";
                                                }
                                                exit();
                                                
$sql = "DELETE FROM appointment  WHERE appointmentId ='$appointment_id' AND charityId = '$charityID' ";
$result = $conn->query($sql);
if ($result) {
    echo 'deleted successfully';
} else {
    echo 'error';
}
?>