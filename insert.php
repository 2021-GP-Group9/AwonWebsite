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
        <script>
            //this for alert 
        //Swal.fire({
        //  title: 'هل تريد الاستمرار؟',
        //  icon: 'question',
        //  iconHtml: '؟',
        //  confirmButtonText: 'نعم',
        //  cancelButtonText: 'لا',
        //  showCancelButton: true,
        //  showCloseButton: true
        //})
        //    
        </script>
        <?php
        // put your code here
        $connection = mysqli_connect("localhost", "root", "root", "awondb");
//        $error = mysqli_connect_error();
//        if ($error != null) {
//            echo "<p>Eror!! could not connect to DB may not connect </p>";
//        } else {
//            echo 'success connect ';
//        }


        $id = $_GET['id'];
//        echo $id;
        $sqli = "SELECT * FROM `charity` WHERE ID='$id' ";
//        $result = $connection->query($sqli);
//        while ($row = $result->fetch_assoc()) {
//            echo "<p>" . $row['email'] . "</p>";
//            echo "<p>" . $row['status'] . "</p>";
//        }
        $status = $_GET['status'];

        $sqli2 = "UPDATE charity SET status='Accepted' WHERE ID ='$id'";

//        $result = $connection->query($sqli2);
//        while ($row = $result->fetch_assoc()) {
//            echo "<p>" . $row['email'] . "</p>";
//            echo "<p>" . $row['status'] . "</p>";
//        }



        mysqli_query($connection, $sqli2);
        if (mysqli_query($connection, $sqli2)) {
            //echo 'check your email';
            $email = $_GET['email'];
            $to = $email;
            $subject = "Email Verification";
            $message = 'Congratulation! Your charity has been Added successfully';
            //need to use such an admin email here!
            $headers = "From: awongp35@gmail.com \r\n ";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

            mail($to, $subject, $message, $headers);
            //echo 'aaaaaaTRUE';
        } else {
            echo "Error inserting record: " . mysqli_error($connection);
            echo 'aaaaaa';
        }
        ?>

        <?php
    }
}
?>
