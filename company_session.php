<?php
session_start();

$serverName = "localhost"; // or "localhost\\SQLEXPRESS"
$connectionOptions = array(
    "Database" => "finalyearproject",
    "Uid" => "sql_company",          // use the login you just created
    "PWD" => "company",      // password for that login
    "CharacterSet" => "UTF-8"
);

$connect = sqlsrv_connect($serverName, $connectionOptions);
if (!$connect) {
    // Connection failed, print the error and stop execution
    die(print_r(sqlsrv_errors(), true));
}


$serverName = "localhost"; // or "localhost\\SQLEXPRESS"
$connectionOptions = array(
    "Database" => "finalyearproject",
    "Uid" => "sql_company",
    "PWD" => "company",
    "CharacterSet" => "UTF-8"
);

$connect = sqlsrv_connect($serverName, $connectionOptions);

if ($connect === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'company') {
    session_unset();
    session_destroy();
    echo "<script>
        alert('Access denied. Please login as company.');
        window.location.href = 'CompanyLogin.php';
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
    echo "<script>alert('Session expired due to inactivity. Please login again.'); window.location.href = 'CompanyLogin.php';</script>";
    exit();
}

// Update last activity time
$_SESSION['LAST_ACTIVITY'] = time();

$username = $_SESSION["username"];
$companyid = $_SESSION["companyid"];
?>