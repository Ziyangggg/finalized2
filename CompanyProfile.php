<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Company Profile</title>
    <meta charset="UTF-8">
    <?php
    require_once('connect.php');
    include('company_session.php');

    $sql = "SELECT * FROM finalyearproject.Company_Info WHERE CompanyID = ? AND is_deleted = '0'";
    $params = array($companyid);
    $query = sqlsrv_query($connect, $sql, $params);

    if ($query === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
    ?>

    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-upwork'></i>
      <span class="logo_name">Company</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="CompanyDashboard.php" >
            <i class='bx bxs-dashboard'></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="CompanyJobPosting.php">
            <i class='bx bxs-briefcase-alt-2'></i>
            <span class="links_name">Jobs </span>
          </a>
        </li>
        <li>
          <a href="CompanyApplicant.php">
            <i class='bx bxs-group'></i>
            <span class="links_name">Application</span>
          </a>
        </li>
       
        <li>
          <a href="CompanyReview.php">
            <i class='bx bxs-star'></i>
            <span class="links_name">Review</span>
          </a>
        </li>
        <li>
            <a href="CompanyProfile.php" class="active">
                <i class='bx bxs-buildings' ></i>
              <span class="links_name">Company Profile</span>
            </a>
        </li>



        <li class="log_out">
        <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <nav>
    <div class="sidebar-button">
      <i class='bx bx-menu sidebarBtn'></i>
      <span class="dashboard">Company Profile</span>
    </div>
    
    <div class="profile-details">
        <span class="admin_name"><?php echo $row["CompanyUsername"] ?></span>
        
      </div>
  </nav>
  
  <section class="home-section">
   

    <div class="home-content">
			<div class="all-boxes">
        <div class="title">Company Profile</div>
        <div class="applicant-boxes">
          <div class="recent-applicant">
          <div class="company-detail-wrapper">
          <form class="post-form-wrapper"  method="POST" autocomplete="off" enctype="multipart/form-data" >
        
              <div class="row gap-20">

                  
             
                
                <div class="col-sm-12 col-md-8">
                
                  <div class="form-group">
                    <label>Company Name</label>
                    <input name="name" placeholder="Enter company name" type="text" class="form-control"  value="<?php echo htmlspecialchars (trim($row["CompanyName"]), ENT_QUOTES, 'UTF-8'); ?>"required>
                  </div>
                  
                </div>

                <div class="col-sm-12 col-md-8">
                
                  <div class="form-group">
                    <label>Company Username</label>
                    <input name="username" placeholder="Enter company name" type="text" class="form-control"  value="<?php echo htmlspecialchars (trim($row["CompanyUsername"]), ENT_QUOTES, 'UTF-8'); ?>"required>
                  </div>
                  
                </div>

                <div class="col-sm-12 col-md-8">
                
                  <div class="form-group">
                      <label>Password</label>
                      <input class="form-control" placeholder="Enter Password" name="password" required type="password" value="<?php echo $row["CompanyPassword"]; ?>" required> 
                  </div>
                  
                </div>

                <div class="col-sm-12 col-md-8">
                
                  <div class="form-group">
                    <label>Company Address</label>
                    <input name="address" placeholder="Enter Company Address" type="text" class="form-control"  value="<?php echo htmlspecialchars (trim($row["CompanyAddress"]), ENT_QUOTES, 'UTF-8'); ?>"required>
                  </div>
                  
                </div>
                <div class="clear"></div>
                
                <div class="col-sm-6 col-md-4">
                
                  <div class="form-group">
                    <label>Registration Number</label>
                    <input name="registrationnumber" placeholder="Enter registration number" type="text" class="form-control"  value="<?php echo htmlspecialchars (trim($row["CompanyRegistrationNo"]), ENT_QUOTES, 'UTF-8'); ?>"required>
                  </div>
                  
                </div>
                
                <div class="col-sm-6 col-md-4">
                
                  <div class="form-group">
                    <label>Industry</label>
                     <input class="form-control" placeholder="Eg: Booking, Travel" name="industry" required type="text"  value="<?php echo htmlspecialchars (trim($row["CompanyIndustry"]), ENT_QUOTES, 'UTF-8'); ?>"required> 
                  </div>
                  
                </div>
                
                <div class="clear"></div>

                <div class="form-group">
                  
                  <div class="col-sm-6 col-md-4">
                    <label>Size</label>
                    <input type="text" class="form-control"  name="size" placeholder="Enter your website" value="<?php echo $row["CompanySize"]; ?>">
                     
                    </select>
                  </div>

                  <div class="col-sm-6 col-md-4">
                    <label>Website</label>
                    <input type="text" class="form-control"  name="web" placeholder="Enter your website" value="<?php echo htmlspecialchars (trim($row["CompanyWebsite"]), ENT_QUOTES, 'UTF-8'); ?>">
                  </div>
                    
                </div>
                
                

                <div class="clear"></div>
                
                <div class="col-sm-6 col-md-4">
                
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" pattern="[0-9]{10,11}" required class="form-control"  placeholder="Enter Phone Number Exp:0176899754" value="<?php echo htmlspecialchars (trim($row["CompanyPhone"]), ENT_QUOTES, 'UTF-8'); ?>">
                  </div>
                  
                </div>
                
                <div class="col-sm-6 col-md-4">
                
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" required class="form-control"  placeholder="Enter your email" value="<?php echo htmlspecialchars (trim($row["CompanyEmail"]), ENT_QUOTES, 'UTF-8'); ?>">
                  </div>
                  
                </div>
                


                <div class="clear"></div>
                


                <div class="clear"></div>
                
                <div class="col-sm-12 col-md-12">
                
                  <div class="form-group bootstrap3-wysihtml5-wrapper">
                    <label>Company Description</label>
                    <textarea name="description" class="bootstrap3-wysihtml5 form-control" placeholder="Enter company description ..." style="height: 200px;"><?php echo htmlspecialchars(trim($row['CompanyDescription']), ENT_QUOTES, 'UTF-8'); ?></textarea>
                  </div>
                  
                </div>
                
                <div class="clear"></div>
                
                <div class="col-sm-12 col-md-12">
                
                  <div class="form-group bootstrap3-wysihtml5-wrapper">
                    <label>Company Our Team</label>
                    <textarea name="team" class="bootstrap3-wysihtml5 form-control" placeholder="Enter company services ..." style="height: 200px;"><?php echo htmlspecialchars(trim($row['CompanyOurTeam']), ENT_QUOTES, 'UTF-8'); ?></textarea>
                  </div>
                  
                </div>
                
                <div class="clear"></div>
                
                <div class="col-sm-12 col-md-12">
                
                  <div class="form-group bootstrap3-wysihtml5-wrapper">
                    <label>Company Our Mission</label>
                    <textarea name="mission" class="bootstrap3-wysihtml5 form-control" placeholder="Enter company expertise ..." style="height: 200px;"><?php echo htmlspecialchars(trim($row['CompanyOurMission']), ENT_QUOTES, 'UTF-8'); ?></textarea>
                  </div>
                  
                </div>

                <div class="col-sm-12 col-md-12">
                
                  <div class="form-group bootstrap3-wysihtml5-wrapper">
                    <label>Company Our Vision</label>
                    <textarea name="vision" class="bootstrap3-wysihtml5 form-control" placeholder="Enter company services ..." style="height: 200px;"><?php echo htmlspecialchars(trim($row['CompanyOurVision']), ENT_QUOTES, 'UTF-8'); ?></textarea>
                  </div>
                  
                </div>
                
                <div class="clear"></div>

                <div class="col-sm-12 col-md-12">
												
                  <div class="form-group bootstrap3-wysihtml5-wrapper" >
                  <label>Company Logo</label>
                  <label><img src="data:image/jpeg;base64,<?php echo base64_encode($row['CompanyLogo']);?>" style="max-width:200px;max-height:200px;object-fit: contain;"></label>
                  <input accept="image/*" type="file" name="image" id="image">

                  
                  
                  </div>
                        
                  </div>
                
                <div class="clear"></div>

                <div class="col-sm-12 mt-10"><br><br>
                  <button type="submit" class="btn btn-primary" name="submit" >Save</button>
                  
                </div>

              </div>
              
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>

  </section>
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

<script src="script.js"></script>

<?php
	include("connect.php");
	$sql = "SELECT * FROM finalyearproject.company_info WHERE CompanyID = ? AND is_deleted = '0'";
  $params = array($companyid);
  $query = sqlsrv_query($connect, $sql, $params);
  if ($query === false) {
      die(print_r(sqlsrv_errors(), true));
  }
  $row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);

	if(isset($_POST["submit"]))
	{
		$name = trim($_POST["name"]);
		$username = trim($_POST["username"]);
    $address = trim($_POST["address"]);
		$password = $_POST["password"];
    $registrationnumber = trim($_POST["registrationnumber"]);
    $industry = trim($_POST["industry"]);
    $size = (int)$_POST["size"];
    $website = trim($_POST["web"]);
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
    $checkUsername = "SELECT COUNT(*) as count FROM finalyearproject.company_info WHERE CompanyUsername = ? AND CompanyID != ?";
    $params = array($username, $companyid);
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
    } else{

    // If no errors, proceed with registration
    if (!$error) {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($imgContent !== null) {
        $sql_update = "UPDATE finalyearproject.company_info SET 
            CompanyUsername = ?, CompanyPassword = ?, CompanyName = ?, CompanyEmail = ?, CompanySize = ?, 
            CompanyIndustry = ?, CompanyRegistrationNo = ?, CompanyDescription = ?, CompanyWebsite = ?, 
            CompanyAddress = ?, CompanyPhone = ?, CompanyOurTeam = ?, CompanyOurMission = ?, CompanyOurVision = ?, 
            CompanyLogo = ?
            WHERE CompanyID = ?";
        $params_update = array($username, $hashed_password, $name, $email, $size, $industry, $registrationnumber, $description, $website, $address, $phone, $team, $mission, $vision, $imgContent, $companyid);
    } else {
        $sql_update = "UPDATE finalyearproject.company_info SET 
            CompanyUsername = ?, CompanyPassword = ?, CompanyName = ?, CompanyEmail = ?, CompanySize = ?, 
            CompanyIndustry = ?, CompanyRegistrationNo = ?, CompanyDescription = ?, CompanyWebsite = ?, 
            CompanyAddress = ?, CompanyPhone = ?, CompanyOurTeam = ?, CompanyOurMission = ?, CompanyOurVision = ?
            WHERE CompanyID = ?";
        $params_update = array($username, $hashed_password, $name, $email, $size, $industry, $registrationnumber, $description, $website, $address, $phone, $team, $mission, $vision, $companyid);
    }

    $result = sqlsrv_query($connect, $sql_update, $params_update);
    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }else {
        echo "<script>
            alert('Update Company Profile Done!');
            window.location.href='CompanyProfile.php';
        </script>";
        exit();
    }
  }
}
}
?>	