<?php
// Start the session
    session_start();
    include("connect.php");
    if(!isset($_SESSION['username'])&&!isset($_SESSION['password'])) // The exact conditional depends on your login-system implementation
    {
        ?>
            <script type='text/javascript'>
                alert('Please login first !');
                window.location.href="JobSeekerLogin.php";
            </script>
        <?php
    }
    else 
    {
        $username = $_SESSION["username"];
        $password = $_SESSION["password"];
        $jobseekerid = $_SESSION["jobseekerid"];
    }
?>