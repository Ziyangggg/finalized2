<?php
session_start();

if (!isset($_SESSION["userid"]) || $_SESSION["role"] !== "admin") {
    echo "<script>alert('Unauthorized access. Redirecting to login.');window.location.href='LoginPage.php';</script>";
    exit;
}
?>
