<?php
$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'awondb';
$conn=new mysqli($servername ,$username ,$password ,$dbname );
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
