<?php

$serverName = "mariadb-service.semestralka:3306";
$dbUsername = "root";
$dbPassword = "password-db";
$dbName = "Semestralka-db";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
