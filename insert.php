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
        <?php
        // put your code here
        $connection = mysqli_connect("localhost", "root", "root", "awondb");
        
        $id = $_GET['ID'];

        $sqli = "UPDATE charity SET status='Accepted' WHERE ID ='".$id."' ";
        
        mysqli_query($connection, $sqli);
        if (mysqli_query($connection, $sqli)) {
            $email = $_GET['email'];
            $to = $email; 
            $subject= "Email Verification"; 
            $message = 'Congratulation! Your charity has been Added successfully';
            //need to use such an admin email here!
            $headers = "From: awongp35@gmail.com \r\n ";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
            
            mail($to, $subject, $message, $headers );
        
        } else {
            echo "Error inserting record: ".mysqli_error($connection);
//            echo 'aaaaaa';
        }
        
        
        ?>
           
                <?php
            }
        }
        ?>
