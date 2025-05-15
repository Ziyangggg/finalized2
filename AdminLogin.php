<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="login">
    <div class="container">
      <div class="cover">
        <div class="front">
          <img src="wallhaven-4y3370.jpg" alt="">
        </div>
      </div>
      <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Admin Login</div>
            <form method="post" action="">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" name="adminusername" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="adminpassword" placeholder="Enter your password" required>
                </div>
                <div class="forget">
                  Forget <a href="AdminForgetPassword.php">Password</a>
                </div>
                <div class="button input-box">
                  <input type="submit" value="Submit" name="submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php
// Show PHP errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("connect.php"); // Must use sqlsrv_connect for SQL Server

if (isset($_POST["submit"])) {
    $username = $_POST["adminusername"];
    $password = $_POST["adminpassword"];

    // Parameterized query to prevent SQL injection
    $sql = "SELECT * FROM finalyearproject.admin_info WHERE AdminUsername = ? AND AdminPassword = ?";
    $params = array($username, $password);

    $stmt = sqlsrv_query($connect, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true)); // Show SQL error if any
    }

    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $_SESSION["adminusername"] = $row["AdminUsername"];
        $_SESSION["adminid"] = $row["AdminID"];

        echo "<script>
            alert('Login successfully.');
            window.location.href = 'AdminDashboard.php';
        </script>";
    } else {
        echo "<script>
            alert('Login failed. Please check your username or password.');
            window.location.href = window.location.href; // Refresh
        </script>";
    }

    sqlsrv_free_stmt($stmt);
}
sqlsrv_close($connect);
?>