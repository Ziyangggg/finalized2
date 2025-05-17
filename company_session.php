<?php
session_start();
include("connect.php");

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