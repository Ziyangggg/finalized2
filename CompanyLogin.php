<?php
session_start();
if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
    $_SESSION['last_attempt_time'] = time();
}

if (time() - $_SESSION['last_attempt_time'] < 300 && $_SESSION['attempts'] >= 5) {
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
    <title> Login and Registration</title>
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
        <div class="text">
          <span class="text-1">Lets get your Team Now</span>

        </div>
      </div>

    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Company Login</div>
          <form method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="username" placeholder="Enter your username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="forget">
                Forget <a href="CompanyForgetPassword.php">Password</a>
              </div>
              <div class="button input-box">
                <input type="submit" name="submit" value="Sumbit">
              </div>
              <div class="text sign-up-text">Don't have an account? <a href="CompanyRegister.php">Sign up now</a></div>
              <div class="text sign-up-text">Login as <a href="JobSeekerLogin.php">Job seekers?</a></div>
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
include("connect.php");

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM finalyearproject.company_info WHERE CompanyUsername = ? AND is_deleted = '0'";
    $params = array($username);
    $stmt = sqlsrv_query($connect, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Use password_verify to compare input password with stored hashed password
        if (password_verify($password, $row["CompanyPassword"])) {

            unset($_SESSION['attempts']);
            unset($_SESSION['last_attempt_time']);
            session_regenerate_id(true);

            $_SESSION["username"] = $row["CompanyUsername"];
            $_SESSION["companyid"] = $row["CompanyID"];
            $_SESSION["role"] = $row["role"];
            $_SESSION["LAST_ACTIVITY"] = time();

            echo "<script>
                alert('Login successfully.');
                window.location.replace('CompanyDashboard.php');
            </script>";
        } else {
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

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($connect);
      }
}
?>