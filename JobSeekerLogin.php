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
              <div class="forget">
                Forget <a href="JobSeekerForgetPassword.php">Password</a>
              </div>
              
              <div class="button input-box">
                <input type="submit" value="Sumbit" name="submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <a href="JobSeekerRegister.php">Signup now</a></div>
              <div class="text sign-up-text">Login as <a href="CompanyLogin.php">Company?</a></div>
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
  session_start();
	include("connect.php");
	
	if(isset($_POST["submit"]))
	{
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	//$username = stripcslashes($username);
	//$password = stripcslashes($password);
	//$username = mysqli_real_escape_string($connect,$username);
	//$password = mysqli_real_escape_string($connect,$password);
	
	$query = "SELECT * FROM job_seekerinfo where Job_SeekerUsername = '$username' and Job_SeekerPassword = '$password' and is_deleted = '0'";
	$result = mysqli_query($connect,$query);
	$row = mysqli_fetch_array($result);
	//$count = mysqli_num_rows($result);
	
	if(is_array($row))
  {
    $_SESSION["username"] = $row["Job_SeekerUsername"];
		$_SESSION["password"] = $row["Job_SeekerPassword"];
    $_SESSION["jobseekerid"] = $row["Job_SeekerID"];
    $jobseekerid= $row["Job_SeekerID"];
    
    $sql66 = "SELECT * FROM resume_jobseeker WHERE Job_SeekerID = '$jobseekerid'";
		$result666 = mysqli_query($connect, $sql66);
		$row6 = mysqli_fetch_assoc($result666);
		if(!is_array($row6)){ 
      echo"<script>
      alert('Pls create your resume in order to apply jobs :)');
      window.location.replace('JobSeekerResume.php');
      </script>";
    }else{
      echo"<script>
		alert('Login successfully.');
		window.location.replace('JobSeekerJobListing.php');
    </script>";
    }

	}
  else
  {
    echo"<script>
    alert('Login unsuccessfully.');
    </script>";
	}
}
mysqli_close($connect);
?>



