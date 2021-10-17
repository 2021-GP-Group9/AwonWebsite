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
        $id = $_GET['id'];
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

        $sqli = "INSERT INTO `charity_orgnization`(`ID`, `name`, `username`, `email`, `phone_number`, `license_Number`, `location`, `pickup_servise`, `type_of_donation`, `photo`, `password`, `description`) "
                . "VALUES (`$id`, `$name`, `$username`, `$email`, `$phone_number`, `$license_Number`, `$location`, `$pickup_servise`, `$type_of_donation`, `$photo`, `$password`, `$description`])";
        ?>
            </body>
        </html>
                <?php
            }
        }
        ?>