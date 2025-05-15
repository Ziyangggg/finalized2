<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
   
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
        <div class="signup-form">
          <div class="title">Job Seeker Sign Up</div>
        <form method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Enter your username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="fullname" placeholder="Enter your fullname" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="tel" name="phone" pattern="[0-9]{10,11}" placeholder="Enter Phone Number Exp:0176899754" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="address" placeholder="Enter your address" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sign Up" name="submit">
              </div>
              <div class="text sign-up-text">Already have an account? <a href="JobSeekerLogin.php">Login now</a></div>
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
	
	if(isset($_POST["submit"]))
	{
		$name = $_POST["fullname"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$email = $_POST["email"];
    $phonenumber = $_POST["phone"];
    $address = $_POST["address"];
		
		$query = "INSERT INTO job_seekerinfo(Job_SeekerFullname,Job_SeekerUsername,Job_SeekerPassword,Job_SeekerEmail,Job_SeekerPhone,Job_SeekerAddress,is_deleted)
		VALUES('$name','$username','$password','$email','$phonenumber','$address','0')";
		$result = mysqli_query($connect,$query);
		

	mysqli_close($connect);
	
	?>
	
	<script>
		alert("Sign Up Done!");
    window.location.href="JobSeekerLogin.php";
	</script>
	
	<?php
	}