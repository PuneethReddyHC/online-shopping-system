<?php
// OneMobile Shop Kosovo - Configuration File
session_start();

// Database Configuration
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'onemobile_user');
define('DB_PASSWORD', 'secure_password_ks2024');
define('DB_DATABASE', 'onemobile_shop_ks');
define('SITE_URL', 'https://onemobile-ks.com');

// Site Configuration
define('SITE_NAME', 'OneMobile Shop');
define('SITE_CURRENCY', '€');
define('SITE_PHONE', '+383 44 111 111');
define('SITE_EMAIL', 'support@onemobile-ks.com');
define('SITE_ADDRESS', 'Pristina, Kosovo');

// Initialize error array
$errors = array();

// Connect to database
function getDBConnection() {
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8mb4");
    return $conn;
}
?>