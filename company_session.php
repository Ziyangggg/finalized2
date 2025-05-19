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


if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    ?>
    <script type='text/javascript'>
        alert('Please login first !');
        window.location.href = "CompanyLogin.php";
    </script>
    <?php
    exit();
} else {
    $username = $_SESSION["username"];
    $companyid = $_SESSION["companyid"];
}
?>