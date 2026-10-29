<?php
$mysqli = new mysqli("localhost", "your_username", "your_password", "your_database");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
?>