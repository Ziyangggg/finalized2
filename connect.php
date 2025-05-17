<?php
$serverName = "localhost";

// You must store role in the session at login
$role = $_SESSION['role'] ?? null;

switch ($role) {
    case 'admin':
        $user = 'sql_admin';
        $pass = 'admin';
        break;
    case 'company':
        $user = 'sql_user';
        $pass = 'user';
        break;
    case 'jobseeker':
        $user = 'sql_jobseeker';
        $pass = 'jobseeker';
        break;
    case 'public':   // Add this if you have a 'public' role explicitly set
        $user = 'sql_public';
        $pass = 'public';  // replace with actual password
        break;
    default:
        // For users with no role, treat as public access
        $user = 'sql_public';
        $pass = 'public';  // replace with actual password
        break;
}

$connectionOptions = array(
    "Database" => "finalyearproject",
    "Uid" => $user,
    "PWD" => $pass,
    "CharacterSet" => "UTF-8"
);

$connect = sqlsrv_connect($serverName, $connectionOptions);

if ($connect === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
