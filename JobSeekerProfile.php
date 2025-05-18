
<!DOCTYPE html>
<html>
  <head>
    <title>Job Seeker Profile Page</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <?php
include("Jobseeker_session.php");
require_once('connect.php');
$query=sqlsrv_query($connect,"SELECT * FROM finalyearproject.job_seekerinfo where Job_SeekerID='$jobseekerid' ")or die(sqlsrv_errors());
$row=sqlsrv_fetch_array($query);

?>
  <body>
  <div class="sidebar">
		<div class="logo-details">
      	  <i class='#' ></i>
		  <span class="logo_name">Job Seekeer</span>
		</div>
		  <ul class="nav-links">
			<li>
			  <a href="JobSeekerProfile.php" >
         	  <i class='bx bxs-user-detail' ></i>				
			  <span class="links_name">Profile</span>
			  </a>
			</li>
			<li>
			  <a href="JobSeekerAboutUs.php" >
        	  <i class='bx bxs-user-account' ></i>				
			  <span class="links_name">About Us</span>
			  </a>
			</li>
			<li>
			  <a href="JobSeekerJobListing.php">
        	  <i class='bx bx-list-ul' ></i>				  
			  <span class="links_name">Job Listing</span>
			  </a>
			</li>
			<li>
			  <a href="JobSeekerCompanyListing.php">
			  <i class='bx bx-list-ul' ></i>				  
			  <span class="links_name">Company Listing</span>
			  </a>
			</li>
			<li>
			  <a href="JobSeekerFavourite.php">
        	  <i class='bx bxs-bookmark' ></i>
          	  <span class="links_name">Favourite</span>
			  </a>
			</li>
			<li>
			  <a href="JobSeekerApplication.php">
              <i class='bx bxs-business'></i>
              <span class="links_name">Application</span>
			  </a>
			</li>
		   
			<li>
			  <a href="JobSeekerReportHistory.php">
          	  <i class='bx bxs-time'></i>
          	  <span class="links_name">History Report</span>
			  </a>
			</li>

      		<li>
			  <a href="JobSeekerMessage.php">
          	  <i class='bx bxs-chat' ></i>
			  <span class="links_name">Message</span>
			  </a>
			</li>
      		<li>
			  <a href="JobSeekerResume.php">
          	  <i class='bx bx-paperclip'></i>
			  <span class="links_name">Resume</span>
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
          <span class="dashboard">Profile</span>
        </div>
      
        
      
        <div class="profile-details">
          <span class="admin_name"><?php echo $row['Job_SeekerUsername'] ?></span>
          
          
        </div>
        </nav>

        <section class="home-section">
          <div class="home-content">
            <div class="all-boxes">
            <div class="title">JobSeeker Profile</div>
            <div class="applicant-boxes">
              <div class="recent-applicant">
                  <div class="company-detail-wrapper">
                  <form class="post-form-wrapper"  method="POST" autocomplete="off">
                
                      <div class="row gap-20">
                        <div class="clear"></div>
                        
                        <div class="col-sm-12 col-md-8">
                        
                          <div class="form-group">
                            <label>Full Name</label>
                            <input name="fullname" placeholder="Enter your name" type="text" class="form-control" value="<?php echo $row["Job_SeekerFullname"]; ?>" required>
                          </div>
                          
                        </div>
                        <div class="col-sm-12 col-md-8">
                        
                          <div class="form-group">
                            <label>Address</label>
                            <input name="address" placeholder="Enter your address" type="text" class="form-control" value="<?php echo $row["Job_SeekerAddress"]; ?>" required>
                          </div>
                          
                        </div>

                        <div class="clear"></div>

                        <div class="col-sm-6 col-md-4">
                        
                          <div class="form-group">
                            <label>Username</label>
                              <input name="username" placeholder="Enter Username" type="text" class="form-control" value="<?php echo $row["Job_SeekerUsername"]; ?>" required>
                          </div>
                          
                        </div>
                        
                        <div class="col-sm-6 col-md-4">
                        
                          <div class="form-group">
                            <label>Password</label>
                              <input class="form-control" placeholder="Enter Password" name="password" required type="password" value="<?php echo $row["Job_SeekerPassword"]; ?>" required> 
                          </div>
                          
                        </div>
                        
                        <div class="clear"></div>
        
                      
                        
                        <div class="col-sm-6 col-md-4">
                        
                          <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="phone" pattern="[0-9]{10,11}" required class="form-control"  placeholder="Enter Phone Number Exp:0176899754" value="<?php echo $row["Job_SeekerPhone"]; ?>">
                          </div>
                          
                        </div>
                        
                        <div class="col-sm-6 col-md-4">
                        
                          <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" required class="form-control"  placeholder="Enter your email" value="<?php echo $row["Job_SeekerEmail"]; ?>">
                          </div>
                          
                        </div>
                        
        
        
                        
                        
      
                        
      
        
                        <div class="col-sm-15 md-10">
                          <button type="submit" class="btn btn-primary" name="submit">Save</button>
                          
                        </div>
                      </div>
                      
                      
                  </form>
                  </div>
              </div>
            </div>
          </div>
          </div>
        </section>
      
    </div>
  </body>
</html>

<?php
	include("connect.php");
	
  $query=sqlsrv_query($connect,"SELECT * FROM finalyearproject.job_seekerinfo where Job_SeekerID='$jobseekerid'")or die(sqlsrv_errors());
  $row=sqlsrv_fetch_array($query);
	if(isset($_POST["submit"]))
	{
		$name = trim($_POST["fullname"]);
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
		$email = trim($_POST["email"]);
    $phonenumber = trim($_POST["phone"]);
    $address = trim($_POST["address"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			exit("Invalid email address.");
		}

    // Hash the password securely before storing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		
		$query = "UPDATE finalyearproject.job_seekerinfoSET Job_SeekerFullname = ?, Job_SeekerUsername = ?, Job_SeekerPassword = ?, Job_SeekerEmail = ?, Job_SeekerPhone = ?, Job_SeekerAddress = ? WHERE Job_SeekerID = ?";
		$params = [$name, $username, $password, $email, $phonenumber, $address, $jobseekerid];
    $result = sqlsrv_query($connect,$query, $params) or die(sqlsrv_errors($connect));
		
    if ($result === false) {
			error_log(print_r(sqlsrv_errors(), true)); // Log the error internally
			exit("Database error."); // Generic error to user
		}
	?>
	
	<script>
		alert("Update Jobseeker Profile Done!");
    window.location.href="JobSeekerProfile.php";
	</script>
	
	<?php
	}
  ?>