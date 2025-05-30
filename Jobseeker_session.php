<?php
// Start the session
    session_start();
    $serverName = "localhost"; // or "localhost\\SQLEXPRESS"
    $connectionOptions = array(
        "Database" => "finalyearproject",
        "Uid" => "sql_jobseeker",          // use the login you just created
        "PWD" => "jobseeker",      // password for that login
        "CharacterSet" => "UTF-8"
    );

    $connect = sqlsrv_connect($serverName, $connectionOptions);

    if ($connect === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Check if the user is logged in and has the jobseeker role
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'JobSeeker') {
        session_unset();
        session_destroy();
        echo "<script>
            alert('Access denied. Please login as jobseeker.');
            window.location.href = 'JobSeekerLogin.php';
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
        echo "<script>alert('Session expired due to inactivity. Please login again.'); window.location.href = 'JobSeekerLogin.php';</script>";
        exit();
    }

    // Update last activity time
    $_SESSION['LAST_ACTIVITY'] = time();

    // You can now safely assume the user is logged in as user
    $username = $_SESSION["username"];
    $jobseekerid = $_SESSION["jobseekerid"];
?>