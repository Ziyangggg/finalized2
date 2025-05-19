<?php
session_start();

$serverName = "localhost"; // or "localhost\\SQLEXPRESS"
$connectionOptions = array(
    "Database" => "finalyearproject",
    "Uid" => "sql_admin",          // use the login you just created
    "PWD" => "admin",      // password for that login
    "CharacterSet" => "UTF-8"
);

$connect = sqlsrv_connect($serverName, $connectionOptions);

if ($connect === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Check if the user is logged in and has the admin role
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    session_unset();
    session_destroy();
    echo "<script>
        alert('Access denied. Please login as admin.');
        window.location.href = 'AdminLogin.php';
    </script>";
    exit();
}

// Timeout setting
define('SESSION_TIMEOUT', 60); // 1 minute

// Check last activity time
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > SESSION_TIMEOUT)) {
    // Session expired
    session_unset();
    session_destroy();
    echo "<script>alert('Session expired due to inactivity. Please login again.'); window.location.href = 'AdminLogin.php';</script>";
    exit();
}

// Update last activity time
$_SESSION['LAST_ACTIVITY'] = time();

// You can now safely assume the user is logged in as admin
$username = $_SESSION['adminusername'];
$adminid = $_SESSION['adminid'];
?>
