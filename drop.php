<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
//var_dump(password_hash("12345", PASSWORD_DEFAULT));

session_start();

	if(isset($_SESSION['role']))
	{
		if($_SESSION['role'] == 'admin') 
		{
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
        $id=$_GET['id'];
        $sqli = "DELETE FROM charity_orgnization where ID = '$id' ";
        mysqli_query($connection, $sqli);
        if (mysqli_query($connection, $sqli)) {
            echo "Record deleted successfully";
                //header( "Location:traineePage.php" );
        } else {
            echo "Error deleting record: ".mysqli_error($connection);
        }
        ?>
    </body>
</html>
<?php	
		}
		
	}
	
?>
