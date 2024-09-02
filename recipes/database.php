<?php

$host = "localhost";
$dbname = "recipekeeper";
$username = "admin";
$password = "password";

$mysqli = new mysqli($host, $username, $password, $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

?>