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
        $connection = mysqli_connect("localhost", "root", "root", "awondb");
        $id=$_GET['id'];
        $sqli = "DELETE * FROM `charity_orgnization` WHERE ID= $id ";
        
        ?>
    </body>
</html>
<?php	
		}
		
	}
	
?>