<?php
$serverName = "localhost";
$connectionOptions = array(
    "Database" => "finalyearproject",
    "Uid" => "sql_public",        // Your restricted SQL user
    "PWD" => "public",    // Replace with your actual password
    "CharacterSet" => "UTF-8"
);

$connect = sqlsrv_connect($serverName, $connectionOptions);

if ($connect === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
