<?php

$server = "localhost";
$username = "id17983305_awon";
$password = "4S7r%KQ6O6(uC|+&";
$dbname = "id17983305_awomdb";

//define DB
$conn = mysqli_connect($server, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
