<?php
session_start();
if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
    $_SESSION['last_attempt_time'] = time();
}

if (time() - $_SESSION['last_attempt_time'] < 60   && $_SESSION['attempts'] >= 5) {
    die("Too many login attempts. Please wait 5 minutes.");
}

// On failed login:
$_SESSION['attempts']++;
$_SESSION['last_attempt_time'] = time();
?>

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
include("connect.php"); // Must use sqlsrv_connect for SQL Server

if (isset($_POST["submit"])) {
    $username = $_POST["adminusername"];
    $password = $_POST["adminpassword"];

    // Get the hashed password from DB based on the username
    $sql = "SELECT * FROM finalyearproject.admin_info WHERE AdminUsername = ?";
    $params = array($username);
    $stmt = sqlsrv_query($connect, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Use password_verify to compare input password with stored hashed password
        if (password_verify($password, $row["AdminPassword"])) {
            unset($_SESSION['attempts']);
            unset($_SESSION['last_attempt_time']);
            session_regenerate_id(true);

            $_SESSION["adminusername"] = $row["AdminUsername"];
            $_SESSION["adminid"] = $row["AdminID"];
            $_SESSION["role"] = $row["Role"];
            $_SESSION["LAST_ACTIVITY"] = time();

            echo "<script>
                alert('Login successfully.');
                window.location.href = 'AdminDashboard.php';
            </script>";
        }else{
              // only record when login failed
            if (!isset($_SESSION['attempts'])) {
                  $_SESSION['attempts'] = 0;
              }

              $_SESSION['attempts']++;
              $_SESSION['last_attempt_time'] = time();

              echo "<script>
                  alert('Login failed.');
                  window.location.href = window.location.href;
              </script>";
        }
    } else {
        echo "<script>
            alert('Login failed');
            window.location.href = window.location.href;
        </script>";
    }

    sqlsrv_free_stmt($stmt);
}
sqlsrv_close($connect);
?>