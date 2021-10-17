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
        $connection = mysqli_connect("localhost", "root", "root", "awondb");
        
        $id = $_GET['ID'];
        $name = $_GET['name'];
        $username = $_GET['username'];
        $email = $_GET['email'];
        $phone_number = $_GET['phone_number'];
        $license_Number = $_GET['license_Number'];
        $location = $_GET['location'];
        $pickup_servise = $_GET['pickup_servise'];
        $type_of_donation = $_GET['type_of_donation'];
        $photo = $_GET['photo'];
        $password = $_GET['password'];
        $description = $_GET['description'];

        $sqli = "INSERT INTO charity (`ID`, `name`, `username`, `email`, `phone_number`, `license_Number`, `location`, `pickup_servise`, `type_of_donation`, `photo`, `password`, `description`) VALUES (`$id`, `$name`, `$username`, `$email`, `$phone_number`, `$license_Number`, `$location`, `$pickup_servise`, `$type_of_donation`, `$photo`, `$password`, `$description`)";
        
       
        mysqli_query($connection, $sqli);
        if (mysqli_query($connection, $sqli)) {
//            $to= $email ; 
//            $subject = 'سيتم ارسال رسالة تحقق للايميل';
//            // link to go to register page
//            $message = "<a href='htpp;//localhost/registration/verfy.php?id=$id'></a>";
//            // email to send the messages from ? need to be setup 
//            $headers ="From: email \r\n" ;
//            // he bring the next statement from old project! should we use it ?? 
//            $headers .="MIME-Version: 1.0"."\r\n" ;
//             $headers .="Content-type:text/html;charset:=UTF-8"."\r\n" ;
//             mail($to, $subject, $message, $headers); 
//             // we need to create thankyou page 
//             header('location:thankyou.php');
        } else {
            echo "Error inserting record: ".mysqli_error($connection);
            echo 'aaaaaa';
        }
        
        
        
        ?>
            </body>
        </html>
                <?php
            }
        }
        ?>