<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Job Seeker Reset Password</title>
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
          <span class="text-1">Set New Password</span>

        </div>
      </div>

    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Job Seekers Reset Password</div>
          <form method="post">
            <div class="input-boxes">
              
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your new password" required>
              </div>
              
              <div class="button input-box">
                <input type="submit" value="Sumbit" name="submit">
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
  session_start();
	include("connect.php");
	
  $b4email=$_GET['secret'];
  
	if(isset($_POST["submit"]))
	{
    $aftemail=base64_decode($b4email);
	  $newpassword = $_POST["password"];
	
	//$username = stripcslashes($username);
	//$password = stripcslashes($password);
	//$username = mysqli_real_escape_string($connect,$username);
	//$password = mysqli_real_escape_string($connect,$password);
	
	$query = "UPDATE job_seekerinfo SET Job_SeekerPassword = '$newpassword' WHERE Job_SeekerEmail='$aftemail'";
	$result = mysqli_query($connect,$query);
?>
<script>
		alert("New Password Is Set");
    window.location.href="JobSeekerLogin.php";
</script>

<?php
}
mysqli_close($connect);
?>



