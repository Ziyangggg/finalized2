<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   
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
        <div class="signup-form">
          <div class="title">Company Sign Up</div>
          <form id="registrationForm" class="post-form-wrapper"  method="POST" autocomplete="off" enctype="multipart/form-data">
        
            <div class="row gap-20">
              <div class="clear"></div>
              
              <div class="col-sm-12 col-md-8">
              
                <div class="form-group">
                  <label>Company Name</label>
                  <!-- <input name="companyname" placeholder="Enter your company name" type="text" class="form-control" required> -->
                  <input name="companyname" placeholder="Enter your company name" type="text" class="form-control" value="<?php echo isset($name) ? htmlspecialchars($name, ENT_QUOTES, 'UTF-8'):''; ?>" required>
                </div>

                <div class="form-group">
                    <label>Company Username</label>
                    <!-- <input name="companyusername" placeholder="Enter your company username" type="text" class="form-control"  required> -->
                    <input name="companyusername" placeholder="Enter your company username" type="text" class="form-control" value="<?php echo isset($username) ? htmlspecialchars($username, ENT_QUOTES, 'UTF-8'):''; ?>" required>
                  </div>
              </div>

              <div class="form-group">
                    <label>Password</label>
                    <input name="password" placeholder="Enter your company password" class="form-control" required type="password" required>
                  </div>

              <div class="col-sm-12 col-md-8">
              
                <div class="form-group">
                  <label>Company Address</label>
                  <input name="address" placeholder="Enter your company address" type="text" class="form-control" value="<?php echo isset($address) ? htmlspecialchars($address, ENT_QUOTES, 'UTF-8'):''; ?>" required>
                </div>
                
              </div>
              <div class="clear"></div>
              
              <div class="col-sm-6 col-md-4">
              
                <div class="form-group">
                  <label>Registration Number</label>
                  <input name="registrationnumber" placeholder="Enter your registration number" type="text" class="form-control" value="<?php echo isset($registrationnumber) ? htmlspecialchars($registrationnumber, ENT_QUOTES, 'UTF-8'):''; ?>" required>
                </div>
                
              </div>
              
              <div class="col-sm-6 col-md-4">
              
                <div class="form-group">
                  <label>Industry</label>
                   <input class="form-control" placeholder="Eg: Booking, Travel" name="industry" required type="text" value="<?php echo isset($industry) ? htmlspecialchars($industry, ENT_QUOTES, 'UTF-8'):''; ?>" required> 
                </div>
                
              </div>
              
              <div class="clear"></div>

              <div class="form-group">
                
                <div class="col-sm-6 col-md-4">
                  <label>Size</label>
                  <input name="size" required class="selectpicker show-tick form-control mb-15" required type="number" placeholder="Enter your company size" required>
                </div>

                <div class="col-sm-6 col-md-4">
                  <label>Website</label>
                  <input type="text" class="form-control"  name="website" placeholder="Enter your company website" value="<?php echo isset($website) ? htmlspecialchars($website, ENT_QUOTES, 'UTF-8'):''; ?>" >
                </div>
                  
              </div>
              
              

              <div class="clear"></div>
              
              <div class="col-sm-6 col-md-4">
              
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="tel" name="phone" pattern="[0-9]{10,11}" placeholder="Enter Phone Number Exp:0176899754"  class="form-control"  placeholder="Enter your company phone" value="<?php echo isset($phone) ? htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'):''; ?>" required>
                </div>
                
              </div>
              
              <div class="col-sm-6 col-md-4">
              
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="email" name="email"  class="form-control"  placeholder="Enter your company email" value="<?php echo isset($email) ? htmlspecialchars($email, ENT_QUOTES, 'UTF-8'):''; ?>" required>
                </div>
                
              </div>
              


              <div class="clear"></div>
              


              <div class="clear"></div>
              
              <div class="col-sm-12 col-md-12">
              
                <div class="form-group bootstrap3-wysihtml5-wrapper">
                  <label>Company Description</label>
                  <textarea name="description" class="bootstrap3-wysihtml5 form-control" placeholder="Enter your company description ..." style="height: 200px;" require><?php echo isset($description) ? htmlspecialchars($description, ENT_QUOTES, 'UTF-8'):''; ?></textarea>
                </div>
                
              </div>
              
              <div class="clear"></div>
              
              <div class="col-sm-12 col-md-12">
              
                <div class="form-group bootstrap3-wysihtml5-wrapper">
                  <label>Company Our Team</label>
                  <textarea name="team" class="bootstrap3-wysihtml5 form-control" placeholder="Enter your company services ..." style="height: 200px;" required><?php echo isset($team) ? htmlspecialchars($team, ENT_QUOTES, 'UTF-8'):''; ?></textarea>
                </div>
                
              </div>
              
              <div class="clear"></div>
              
              <div class="col-sm-12 col-md-12">
              
                <div class="form-group bootstrap3-wysihtml5-wrapper">
                  <label>Company Our Mission</label>
                  <textarea name="mission" class="bootstrap3-wysihtml5 form-control" placeholder="Enter your company expertises ..." style="height: 200px;" required><?php echo isset($mission) ? htmlspecialchars($mission, ENT_QUOTES, 'UTF-8'):''; ?></textarea>
                </div>
                
              </div>

              <div class="col-sm-12 col-md-12">
              
                <div class="form-group bootstrap3-wysihtml5-wrapper">
                  <label>Company Our Vision</label>
                  <textarea name="vision" class="bootstrap3-wysihtml5 form-control" placeholder="Enter your company services ..." style="height: 200px;" required><?php echo isset($vision) ? htmlspecialchars($vision, ENT_QUOTES, 'UTF-8'):''; ?></textarea>
                </div>
                
              </div>
              
              <div class="clear"></div>

              <div class="col-sm-12 col-md-12">
                                              
                <div class="form-group bootstrap3-wysihtml5-wrapper">
                <label>Company Logo</label>
                <input accept="image/*" type="file" name="image" id="image" required >
                </div>
                      
                </div>
              
              <div class="clear"></div>



            </div>
            <div class="button input-box">
                <input type="submit" value="Submit" name="submit">
              </div>
              <div class="text sign-up-text">Already have an account? <a href="CompanyLogin.php">Login now</a></div>
            </div>
          </form>
            
     
    </div>
    </div>
    </div>
  </div>
</div>
<script>
  // File size validation before form submission
  document.getElementById('registrationForm').addEventListener('submit', function(event) {
    const fileInput = document.getElementById('image');
    const maxSize = 2 * 1024 * 1024; // 2MB in bytes
    
    if (fileInput.files.length > 0) {
      const fileSize = fileInput.files[0].size;
      
      if (fileSize > maxSize) {
        event.preventDefault(); // Prevent form submission
        alert('Error: File size exceeds 2MB. Please choose a smaller file.');
        return false;
      }
    }
  });

  // Real-time validation when file is selected
  document.getElementById('image').addEventListener('change', function() {
    const fileInput = this;
    const maxSize = 2 * 1024 * 1024; // 2MB in bytes
    
    if (fileInput.files.length > 0) {
      const fileSize = fileInput.files[0].size;
      
      if (fileSize > maxSize) {
        alert('Error: File size exceeds 2MB. Please choose a smaller file.');
        fileInput.value = ''; // Clear the input
      }
    }
  });
</script>
</body>
</html>

<?php
	include("connect.php");
	
	if(isset($_POST["submit"]))
	{
		$name = trim($_POST["companyname"]);
		$username = trim($_POST["companyusername"]);
    $address = trim($_POST["address"]);
		$password = $_POST["password"];
    $registrationnumber = trim($_POST["registrationnumber"]);
    $industry = trim($_POST["industry"]);
    $size = (int)$_POST["size"];
    $website = trim($_POST["website"]);
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $description = trim($_POST["description"]);
    $team = trim($_POST["team"]);
    $mission = trim($_POST["mission"]);
    $vision = trim($_POST["vision"]);
    $imgContent = null;
    $error = false;
    $errorMsg = "";

    // check phone number format
    if (!preg_match("/^[0-9]{8,15}$/", $phone)) {
    $error = true;
    $errorMsg = "Invalid phone number.";
    }

    // check email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $errorMsg = "Invalid email format.";
    }

    // Check if username already exists
    $checkUsername = "SELECT COUNT(*) as count FROM finalyearproject.company_info WHERE CompanyUsername = ?";
    $params = array($username);
    $stmt = sqlsrv_query($connect, $checkUsername, $params);
    
    if ($stmt === false) {
        $_SESSION['error'] = "Database error: " . print_r(sqlsrv_errors(), true);
        $error = true;
    } else {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if ($row['count'] > 0) {
            $_SESSION['error'] = "Username already exists. Please choose another one.";
            $errorMsg = "Username already exists. Please choose another one.";
            $error = true;
        }
    }

    // Handle image upload
    if (!$error && isset($_FILES["image"]) && !empty($_FILES["image"]['tmp_name'])) {
        $fileName = basename($_FILES["image"]['name']);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileSize = $_FILES["image"]['size'];
        $maxFileSize = 2 * 1024 * 1024; // 2MB limit
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        
        // Validate file size
        if ($fileSize > $maxFileSize) {
            $errorMsg = "Error: File size exceeds 2MB. Please choose a smaller file.";
            $error = true;
        }
        // Validate file type
        else if (!in_array(strtolower($fileType), $allowTypes)) {

            $errorMsg = "Error: Only JPG, PNG & GIF files are allowed.";
            $error = true;
        }
        else {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = file_get_contents($image);
        }
    }

    // If there are errors, show error message and stop processing
    if ($error) {
        echo "<script>alert('$errorMsg');</script>";
    } else {

    // If no errors, proceed with registration
    if (!$error) {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($imgContent !== null) {
        $sql = "INSERT INTO finalyearproject.company_info 
            (CompanyUsername, CompanyPassword, CompanyName, CompanyEmail, CompanySize, CompanyIndustry, 
             CompanyRegistrationNo, CompanyDescription, CompanyWebsite, CompanyAddress, CompanyPhone, 
             CompanyOurTeam, CompanyOurMission, CompanyOurVision, CompanyLogo, is_deleted, role)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '0', 'company')";

        $params = array(
                array($username, SQLSRV_PARAM_IN),
                array($hashed_password, SQLSRV_PARAM_IN), // Store hashed password
                array($name, SQLSRV_PARAM_IN),
                array($email, SQLSRV_PARAM_IN),
                array($size, SQLSRV_PARAM_IN),
                array($industry, SQLSRV_PARAM_IN),
                array($registrationnumber, SQLSRV_PARAM_IN),
                array($description, SQLSRV_PARAM_IN),
                array($website, SQLSRV_PARAM_IN),
                array($address, SQLSRV_PARAM_IN),
                array($phone, SQLSRV_PARAM_IN),
                array($team, SQLSRV_PARAM_IN),
                array($mission, SQLSRV_PARAM_IN),
                array($vision, SQLSRV_PARAM_IN),
                array($imgContent, SQLSRV_PARAM_IN, SQLSRV_PHPTYPE_STREAM(SQLSRV_ENC_BINARY), SQLSRV_SQLTYPE_VARBINARY('max'))
            );

    } else {
        $sql = "INSERT INTO finalyearproject.company_info 
            (CompanyUsername, CompanyPassword, CompanyName, CompanyEmail, CompanySize, CompanyIndustry, 
             CompanyRegistrationNo, CompanyDescription, CompanyWebsite, CompanyAddress, CompanyPhone, 
             CompanyOurTeam, CompanyOurMission, CompanyOurVision, is_deleted, role)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '0', 'company')";

        $params = array($username, $hashed_password, $name, $email, $size, $industry, $registrationnumber,
                        $description, $website, $address, $phone, $team, $mission, $vision);
    }

    $stmt = sqlsrv_query($connect, $sql, $params);

    if ($stmt === false) {
        echo "<script>alert('Registration failed: " . str_replace("'", "\'", print_r(sqlsrv_errors(), true)) . "');</script>";
    } else {
            echo "<script>
                alert('Registration successful!');
                window.location.href = 'CompanyLogin.php';
            </script>";
        }
    }
    
    sqlsrv_close($connect);
  }
}
?>