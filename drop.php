<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//var_dump(password_hash("12345", PASSWORD_DEFAULT));

session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        ?>

        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title></title>
            </head>
            <body>
        <?php
        // put your code here
        echo 'aaaaaa';
        $connection = mysqli_connect("localhost", "root", "root", "awondb");
        $id = $_GET['id'];
        $state = $_GET['state'];
        $sql = "UPDATE charity SET status='Rejected' WHERE ID ='" . $id . "' ";
        mysql_query($connection, $sql);
        $sqli = "DELETE FROM charity_orgnization where ID = '$id' AND state='Rejected' ";
        mysqli_query($connection, $sqli);
        if (mysqli_query($connection, $sqli)) {

            //echo "Record deleted successfully";
            //email Verification  
            $email = $_GET['email'];
            $to = $email;
            $subject = "Email Verification";
            $message = 'We are Sorry! Your charity has been Rejected';
            //need to use such an admin email here!
            $headers = "From:  \r\n ";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
            
            mail($to, $subject, $message, $headers );
            
        } else {
            echo "Error deleting record: " . mysqli_error($connection);
        }
        ?>
            </body>
        </html>
        <?php
    }
}
?>
