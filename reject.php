
<?php
$connection = mysqli_connect("localhost", "root", "root", "awondb");

        $charityID = $_POST['charityId'];
        $sql= "DELETE FROM `charity` WHERE charityId ='$charityID'";
        $result = mysqli_query($connection, $sql);
      


 if ($result) {
     header("Content-Type: text/html");
     echo 'added successfully';
     exit();
 } else {
    header("Content-Type: text/html");
       echo "added unsuccessfully ";
 
}