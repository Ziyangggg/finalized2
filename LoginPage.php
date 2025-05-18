<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login and Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
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
          <span class="text-1">Lets get your Job Now</span>

        </div>
      </div>

    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Job Seekers Login</div>
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
                    <div class="button input-box">
                    <input type="submit" name="submit" value="Login">
                    </div>
                    <div class="text sign-up-text">Don't have an account? <a href="CompanyRegister.php">Company?</a> <a href="JobSeekerRegister.php">JobSeeker?</a></div>
                </div>
            </form>
        </div   v>

    </div>
    </div>
  </div>
</div>
</body>
</html>

<?php
session_start();
include("connect.php");

function loginUser($user) {
    global $connect; // allow access to DB connection

    session_regenerate_id(true);

    $_SESSION["userid"] = $user["UserID"];
    $_SESSION["username"] = $user["Username"];
    $_SESSION["role"] = $user["Role"];
    $_SESSION["fullname"] = $user["FullName"];

    $userid = $user["UserID"];
    $role = $user["Role"];

    // Redirect based on role
    switch ($role) {
        case "admin":
            echo "<script>window.location.replace('AdminDashboard.php');</script>";
            break;
        case "company":
            echo "<script>window.location.replace('CompanyDashboard.php');</script>";
            break;
        case "jobseeker":
            echo "<script>window.location.replace('JobSeekerDashboard.php');</script>";
            break;
        default:
            echo "<script>alert('Unknown user role.');</script>";
    }

    exit;
}


if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM finalyearproject.users WHERE Username = ? AND is_deleted = 0";
    $params = array($username);
    $stmt = sqlsrv_query($connect, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($user) {
        $storedPassword = $user["UserPassword"]; // this is hashed
        $userid = $user["UserID"];
        $role = $user["Role"];

        // Secure password verification
        if (password_verify($password, $storedPassword)) {
            // Successful login
            loginUser($user); // You must define this function based on your session or redirect logic
        } else {
            echo "<script>alert('Login failed. Invalid credentials.');</script>";
        }
    } else {
        echo "<script>alert('Login failed. Invalid credentials.');</script>";
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($connect);
}
?>
