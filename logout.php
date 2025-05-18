<?php 

session_start();

session_unset();

session_destroy();

echo "<SCRIPT> 
        alert('Logged Out !!')
        window.location.replace('LoginPage.php');
    </SCRIPT>";
?>