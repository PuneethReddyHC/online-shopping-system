<?php
// OneMobile Shop Database Connection
$servername = "localhost";
$username = "onemobile_user";
$password = "secure_password_ks2024";
$dbname = "onemobile_shop_ks";

// Create connection with improved security
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    error_log("Database connection failed: " . $con->connect_error);
    die("Connection failed. Please try again later.");
}

// Set charset to UTF-8
$con->set_charset("utf8mb4");

// Timezone for Kosovo
date_default_timezone_set('Europe/Pristina');
?>