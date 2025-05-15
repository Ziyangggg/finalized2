<?php
$serverName = "localhost"; // or "localhost\\SQLEXPRESS"
$connectionOptions = array(
    "Database" => "finalyearproject",
    "Uid" => "superadmin",          // use the login you just created
    "PWD" => "1234",      // password for that login
    "CharacterSet" => "UTF-8"
);

$connect = sqlsrv_connect($serverName, $connectionOptions);

if ($connect === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
