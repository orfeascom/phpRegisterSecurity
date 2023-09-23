<?php

// Parameters to connect to a database
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "php_project_login";

//$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName, 33306);
$str = "mysql:host=$dbHost;port=33306;dbname=$dbName";
if (!$conn = new PDO($str, $dbUser, $dbPass))
{
    die("Databae connection failed!");
}