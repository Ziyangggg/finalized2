<?php
session_start();
include("connect.php");

// Check if the admin session variables are set
if (!isset($_SESSION['adminusername']) || !isset($_SESSION['adminid'])) {
    ?>
    <script type="text/javascript">
        alert('Please login first!');
        window.location.href = "AdminLogin.php";
    </script>
    <?php
    exit();  // Important to stop further execution
} else {
    $username = $_SESSION['adminusername'];
    $adminid = $_SESSION['adminid'];
    // Do not use or reference $_SESSION['adminpassword']
}
?>
